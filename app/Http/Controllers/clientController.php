<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Client;
use Illuminate\Http\Request;
use App\Helpers\PCollection;
use Yajra\Datatables\Datatables;


class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $clients=Client::all()->load(['user','gestionnaire.user','village'])->paginate(10);
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $village_id=$request->input('village');
        $village=\App\Village::find($village_id);
        return view('clients.create',compact('village'));
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
                'nom' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
                'email' => 'required|email|max:255|unique:users,email',
                'telephone'     =>  'required|string|max:50',
                'password' => 'required|string|min:8|max:50',
                'village' => 'required|exists:villages,id',
            ],
            [
                'password.min'  =>  'Pour des raisons de sécurité, votre mot de passe doit faire au moins :min caractères.'
            ],
            [
                'password.max'  =>  'Pour des raisons de sécurité, votre mot de passe ne doit pas dépasser :max caractères.'
            ]
        );

        $roles_id = Role::where('name','Client')->first()->id;
        $utilisateur = new User([            
            'firstname'      =>      $request->input('prenom'),
            'name'           =>      $request->input('nom'),
            'email'          =>      $request->input('email'),
            'telephone'      =>      $request->input('telephone'),
            'password'       =>      Hash::make($request->input('password')),
            'roles_id'       =>      $roles_id

        ]);
        $utilisateur->save();
        $client = new Client([
            'matricule'     =>     $roles_id,
            'users_id'      =>     $utilisateur->id,
            'village_id'    =>     $roles_id,
            'gestionnaires_id'=>   $roles_id
        ]);

        $client->save();
        return redirect()->route('clients.index')->with('message','client ajoutée avec succès !');
       /*  return view('clients.index'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        //return $client;
        $utilisateur=$client->user;
        return view('clients.update', compact('client','utilisateur','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $id)
    {
        $this->validate(
            $request, 
            [
                'prenom'        => 'required|string|max:50',
                'nom'           => 'required|string|max:50',
                'telephone'           => 'required|string|max:50',
            ]);

        $client = Client::find($id);
        $utilisateur=$client->user;
        $utilisateur->firstname      =      $request->input('prenom');
        $utilisateur->name           =      $request->input('nom');
        $utilisateur->telephone      =      $request->input('telephone');
        $utilisateur->save();
        $client = new Client([
            'matricule'     =>     $roles_id,
            'users_id'      =>     $utilisateur->id,
            'village_id'    =>     $roles_id,
            'gestionnaires_id'=>   $roles_id
        ]);

        $client->save();
        return redirect()->route('clients.index')->with('message','client ajoutée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $message = $client->user->firstname.' '.$client->user->name.' a été supprimé(e)';
        return redirect()->route('clients.index')->with(compact('message'));
    }

    //lister les client en utilisant la méthode ajax
    public function list(Request $request)
    {
        $clients=Client::with('user')->get();
        return Datatables::of($clients)->make(true);
    }
 
}