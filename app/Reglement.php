<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
     /**
     * funtion comptable
     */
    public function comptable()
    {
        return this->belongsTo('App\Comptable', 'comptables_id');
       
    }
     /**
     * funtion facture
     */
    public function facture()
    {
        return this->belongsTo('App\Facture', 'factures_id');
       
    }
     /**
     * funtion type
     */
    public function type()
    {
        return this->hasMany('App\Type', 'types_id');
       
    }
}
