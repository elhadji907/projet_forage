<?php

namespace App\Http\Controllers;

use App\Gestionnaire;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class GestionnaireController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* roles */
         $this->middleware('auth');
         $this->middleware('roles:Gestionnaire|Administrateur'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestionnaires.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('gestionnaires.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
                'matricule'     =>  'required|string|max:50',
                'prenom'        =>  'required|string|max:50',
                'nom'           =>  'required|string|max:50',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255|unique:users,email',
                'password'      =>  'required|confirmed|string|min:8|max:50',
            ],
            [
                'password.min'  =>  'Pour des raisons de sécurité, votre mot de passe doit faire au moins :min caractères.'
            ],
            [
                'password.max'  =>  'Pour des raisons de sécurité, votre mot de passe ne doit pas dépasser :max caractères.'
            ]
        );
        //return view('gestionnaires.index');
       $roles_id = Role::where('name','Gestionnaire')->first()->id;
        $utilisateur = new User([            
            'firstname'      =>      $request->input('prenom'),
            'name'           =>      $request->input('nom'),
            'email'          =>      $request->input('email'),
            'telephone'      =>      $request->input('telephone'),
            'password'       =>      Hash::make($request->input('password')),
            'roles_id'       =>      $roles_id

        ]);
        
        $utilisateur->save();
        
        $gestionnaire = new Gestionnaire([
            'matricule'     =>     $request->input('matricule'),
            'users_id'      =>     $utilisateur->id
        ]);

        $gestionnaire->save();
        return redirect()->route('gestionnaires.index')->with('success','gestionnaire ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Gestionnaire $gestionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gestionnaire = Gestionnaire::find($id);
        $utilisateur=$gestionnaire->user;        
        $roles = Role::get();
        $role_actuels    =   $utilisateur->roles_id;
        //return $utilisateur;
        return view('gestionnaires.update', compact('gestionnaire','utilisateur','id','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'matricule'     => 'required|string|max:50',
                'prenom'        => 'required|string|max:100',
                'nom'           => 'required|string|max:50',
                'telephone'     => 'required|string|max:50',
                'choixrole'     => 'required|string',
            ]);

        $gestionnaire = Gestionnaire::find($id);
        $utilisateur=$gestionnaire->user;

       /*  $roles_id = Role::where('name','gestionnaire')->first()->id; */


        $utilisateur->firstname      =      $request->input('prenom');
        $utilisateur->name           =      $request->input('nom');
        $utilisateur->telephone      =      $request->input('telephone');
       /*  $utilisateur->roles_id       =      $roles_id; */
       $utilisateur->roles_id        =      $request->input('choixrole');

        $utilisateur->save();

        $gestionnaire->matricule   =     $request->input('matricule');
        $gestionnaire->users_id    =     $utilisateur->id;

        $gestionnaire->save();
        
        return redirect()->route('gestionnaires.index')->with('success','gestionnaire modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gestionnaire $gestionnaire)
    {
        $gestionnaire->delete();
        $message = $gestionnaire->user->firstname.' '.$gestionnaire->user->name.' a été supprimé(e)';
        return redirect()->route('gestionnaires.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $gestionnaires=Gestionnaire::with('user')->get();
        return Datatables::of($gestionnaires)->make(true);
    }
}
