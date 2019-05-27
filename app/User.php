<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * funtion role
     */
    public function role()
    {
        return this->belongsTo('App\Role','roles_id')
    }

    /**
     * funtion gestionnaire
     */
    public function gestionnaire()
    {
        return this->hasOne('App\Gestionnaire', 'users_id');
       
    }

    /**
     * funtion client
     */
    public function client()
    {
        return this->hasOne('App\Client', 'users_id');
       
    }

    /**
     * funtion comptable
     */
    public function comptable()
    {
        return this->hasOne('App\Comptable', 'users_id');
       
    }

    /**
     * funtion agent
     */
    public function agent()
    {
        return this->hasOne('App\Agent', 'users_id');
       
    }
}
