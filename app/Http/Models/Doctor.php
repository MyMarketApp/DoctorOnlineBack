<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctor';

    public $timestamps = false;

    protected $fillable = [
        'description', 'name', 'lastName', 'dni', 'rate', 'idGender', 'idUser', 'idSchedule', 
        'idSpecialty', 'birthdate', 'imageUrl'
    ];

    public function gender()
    {
        return $this->belongsTo('App\Http\Models\UserGender','idGender','id');
    }

    public function schedules()
    {
        return $this->belongsToMany('App\Http\Models\Schedule', 'doctor_schedule', 'idDoctor', 'idSchedule');
    }

}
