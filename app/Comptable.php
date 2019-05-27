<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comptable extends Model
{
    //
    public function user()
    {
        return this->hasMany('App\User','roles_id')
    }

    public function reglement()
    {
        return this->hasMany('App\Reglement','roles_id')
    }
}
