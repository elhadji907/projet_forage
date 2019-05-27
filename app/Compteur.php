<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compteur extends Model
{
    public function abonnement()
    {
        return this->belongsTo('App\Abonnement', 'compteurs_id');
       
    }
}
