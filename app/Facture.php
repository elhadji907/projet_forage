<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    public function reglement()
    {
        return this->hasMany('App\Reglement', 'factures_id');
       
    }
}
