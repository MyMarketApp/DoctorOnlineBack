<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentStatus extends Model
{
    protected $table = 'appointment_status';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

}
