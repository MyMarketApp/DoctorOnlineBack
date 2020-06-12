<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'email', 'phone', 'score', 'idType', 'idStripeCustomer'
    ];
    protected $hidden = [
        'password',
    ];

    public function type()
    {
        return $this->belongsTo('App\Http\Models\UserType','idType','id');
    }

    public function profiles()
    {
        return $this->hasMany('App\Http\Models\Patient','idUser','id');
    }
}
