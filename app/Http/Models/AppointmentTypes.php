<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentTypes extends Model
{
    protected $table = 'appointment_types';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

}
