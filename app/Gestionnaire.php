<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestionnaire extends Model
{
    //
    public function user()
    {
        return this->belongsTo('App\User','users_id')
    }

    public function client()
    {
        return this->hasMany('App\Client', 'gestionnaires_id');
       
    }
}
