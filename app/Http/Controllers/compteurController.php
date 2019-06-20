<?php

namespace App\Http\Controllers;

use App\Compteur;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class compteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compteurs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $administrateurs_id=$request->input('compteur');
        $compteur=\App\Compteur::find($administrateurs_id);
        return view('compteurs.create',compact('compteur'));
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
                'numero_serie' => 'required|string|max:25',
                'compteur' => 'required|exists:compteurs,id',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compteur  $compteur
     * @return \Illuminate\Http\Response
     */
    public function show(Compteur $compteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compteur  $compteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Compteur $compteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compteur  $compteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compteur $compteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compteur  $compteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compteur $compteur)
    {
        //
    }

    public function list(Request $request)
    {
        $compteurs=Compteur::get();
        return Datatables::of($compteurs)->make(true);
    }
}
