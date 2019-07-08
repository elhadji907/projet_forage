<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('roles:Administrateur|Gestionnaire|Agent|Comptable|Client'); 
    }

    public function accueil(){

        return view('layout.index');         
        
    }
}
