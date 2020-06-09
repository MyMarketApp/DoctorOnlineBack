<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';

    public $timestamps = false;

    protected $fillable = [
        'name', 'lastName', 'idGender', 'idUser', 'dni', 'birthdate', 'imageUrl'
    ];

    public function gender()
    {
        return $this->belongsTo('App\Http\Models\UserGender','idGender','id');
    }

}
