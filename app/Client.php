<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function user()
    {
        return this->belongsTo('App\User','users_id')
    }

    public function gestionnaire()
    {
        return this->belongsTo('App\Gestionnaire', 'gestionnaires_id');
       
    }

    public function village()
    {
        return this->hasOne('App\Village', 'village_id');
       
    }

    public function abonnement()
    {
        return this->hasOne('App\Abonnement', 'clients_id');
       
    }
}
