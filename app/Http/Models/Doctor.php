<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctor';

    public $timestamps = false;

    protected $fillable = [
        'description', 'name', 'lastName', 'dni', 'chatRate', 'idGender', 'idUser', 'idSchedule', 
        'idSpecialty', 'birthdate', 'imageUrl', 'idChatStripePrice', 'idCallStripePrice',
        'idVideoStripePrice', 'callrate', 'videoRate'
    ];

    public function gender()
    {
        return $this->belongsTo('App\Http\Models\UserGender','idGender','id');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Http\Models\Specialty','idSpecialty','id');
    }

    public function schedules()
    {
        return $this->belongsToMany('App\Http\Models\Schedule', 'doctor_schedule', 'idDoctor', 'idSchedule');
    }

}
