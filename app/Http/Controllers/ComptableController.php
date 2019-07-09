<?php

namespace App\Http\Controllers;

use App\Role;
use App\Comptable;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;


class ComptableController extends Controller
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
         $this->middleware('roles:Comptable|Administrateur'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comptables.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('comptables.create',compact('roles'));
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
        //return view('comptables.index');
       $roles_id = Role::where('name','Comptable')->first()->id;
        $utilisateur = new User([            
            'firstname'      =>      $request->input('prenom'),
            'name'           =>      $request->input('nom'),
            'email'          =>      $request->input('email'),
            'telephone'      =>      $request->input('telephone'),
            'password'       =>      Hash::make($request->input('password')),
            'roles_id'       =>      $roles_id

        ]);
        
        $utilisateur->save();
        
        $comptable = new Comptable([
            'matricule'     =>     $request->input('matricule'),
            'users_id'      =>     $utilisateur->id
        ]);

        $comptable->save();
        return redirect()->route('comptables.index')->with('success','comptable ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function show(Comptable $comptable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comptable = Comptable::find($id);
        $utilisateur=$comptable->user;        
        $roles = Role::get();
        $role_actuels    =   $utilisateur->roles_id;
        //return $utilisateur;
        return view('comptables.update', compact('comptable','utilisateur','id','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comptable  $comptable
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

        $comptable = Comptable::find($id);
        $utilisateur=$comptable->user;

       /*  $roles_id = Role::where('name','comptable')->first()->id; */


        $utilisateur->firstname      =      $request->input('prenom');
        $utilisateur->name           =      $request->input('nom');
        $utilisateur->telephone      =      $request->input('telephone');
       /*  $utilisateur->roles_id       =      $roles_id; */
       $utilisateur->roles_id        =      $request->input('choixrole');

        $utilisateur->save();

        $comptable->matricule   =     $request->input('matricule');
        $comptable->users_id    =     $utilisateur->id;

        $comptable->save();
        
        return redirect()->route('comptables.index')->with('success','comptable modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comptable $comptable)
    {
        $comptable->delete();
        $message = $comptable->user->firstname.' '.$comptable->user->name.' a été supprimé(e)';
        return redirect()->route('comptables.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $comptables=Comptable::with('user')->get();
        return Datatables::of($comptables)->make(true);
    }
}
