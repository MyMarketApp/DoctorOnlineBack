<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'name', 'email','lastName','birthdate','idGender','idType'
    ];
    protected $hidden = [
        'password',
    ];

    public function type()
    {
        return $this->belongsTo('App\Http\Models\UserType','idType','id');
    }

    public function gender()
    {
        return $this->belongsTo('App\Http\Models\UserGender','idGender','id');
    }
}
