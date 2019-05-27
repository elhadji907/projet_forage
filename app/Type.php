<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function reglement()
    {
        return this->hasMany('App\Reglement', 'types_id');
       
    }
}
