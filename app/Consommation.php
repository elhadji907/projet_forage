<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consommation extends Model
{
    public function facture()
    {
        return this->belongsTo('App\Facture', 'factures_id');
       
    }
}
