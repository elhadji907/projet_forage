<?php

namespace App\Http\Controllers;

use App\Administrateur;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class administrateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrateurs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('administrateurs.create',compact('roles'));
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
                'matricule'     => 'required|string|max:50',
                'nom'           => 'required|string|max:50',
                'prenom'        => 'required|string|max:50',
                'telephone'     => 'required|string|max:50',
                'email'         => 'required|email|max:255|unique:users,email',
                'choixrole'     => 'required|string',
                'mot_de_passe'  => 'required|string|max:50',
            ]
        );
        //return view('administrateurs.index');
       $roles_id = Role::where('name','Administrateur')->first()->id;
        $utilisateur = new User([            
            'name'           =>      $request->input('nom'),
            'firstname'      =>      $request->input('prenom'),
            'email'          =>      $request->input('email'),
            'telephone'      =>      $request->input('telephone'),
            'password'       =>      $request->input('mot_de_passe'),
            'roles_id'       =>      $roles_id

        ]);
        
        $utilisateur->save();

        $administrateur = new Administrateur([
            'matricule'     =>     $request->input('matricule'),
            'users_id'      =>     $utilisateur->id
        ]);

        $administrateur->save();
        return redirect()->route('administrateurs.create')->with('success','utilisateur ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function show(Administrateur $administrateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrateur $administrateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrateur $administrateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrateur $administrateur)
    {
        //
    }

    public function list(Request $request)
    {
        $administrateurs=Administrateur::with('user')->get();
        return Datatables::of($administrateurs)->make(true);
    }
 
}
