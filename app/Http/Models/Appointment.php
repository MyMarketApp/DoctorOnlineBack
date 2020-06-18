<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';

    public $timestamps = false;

    protected $fillable = [
        'diagnostic', 'prescription', 'comment', 'score', 'date',
        'idDoctor', 'idStatus', 'idPatient', 'idSchedule', 'idType'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Http\Models\Doctor','idDoctor','id');
    }

    public function status()
    {
        return $this->belongsTo('App\Http\Models\AppointmentStatus','idStatus','id');
    }

    public function type()
    {
        return $this->belongsTo('App\Http\Models\AppointmentTypes','idType','id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Http\Models\Patient','idPatient','id');
    }

    public function schedule()
    {
        return $this->belongsTo('App\Http\Models\Schedule','idSchedule','id');
    }

}
