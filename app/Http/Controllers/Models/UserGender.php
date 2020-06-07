<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserGender extends Model
{
    protected $table = 'user_gender';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

}
