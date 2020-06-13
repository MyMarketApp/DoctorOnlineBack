<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';

    public $timestamps = false;

    protected $fillable = [
        'diagnostic', 'prescription', 'comment', 'score', 'date',
        'idDoctor', 'idStatus', 'idPatient', 'idSchedule'
    ];

}
