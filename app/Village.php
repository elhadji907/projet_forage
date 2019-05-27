<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public function client()
    {
        return this->belongsTo('App\Client', 'village_id');
       
    }
}
