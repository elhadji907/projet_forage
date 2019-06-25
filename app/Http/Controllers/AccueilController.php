<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function accueil(){

        if (Auth()->guest())
        {
            return redirect('/login')->withErrors([
                'email' => "Vous devez être connecté pour voir cette page !",
                /* 'password' => "Si vous n'avez pas de compte, veuillez vous inscrire !", */
            ]);            
        }
        else
        {
            return view('layout.index');            
        }
    }
}
