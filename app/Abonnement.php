<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    public function client()
    {
        return this->belongsTo('App\Client', 'clients_id');
       
    }

    public function compteur()
    {
        return this->hasOne('App\Compteur', 'compteurs_id');
       
    }
}
