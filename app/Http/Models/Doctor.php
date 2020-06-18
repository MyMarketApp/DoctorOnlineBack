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
        'idVideoStripePrice', 'callRate', 'videoRate'
    ];

    public function gender()
    {
        return $this->belongsTo('App\Http\Models\UserGender','idGender','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User','idUser','id');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Http\Models\Specialty','idSpecialty','id');
    }

    public function schedules()
    {
        return $this->belongsToMany('App\Http\Models\Schedule', 'doctor_schedule', 'idDoctor', 'idSchedule');
    }

    public function appointments()
    {
        return $this->hasMany('App\Http\Models\Appointment','idDoctor','id');
    }

}
