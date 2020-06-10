<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    public $timestamps = false;

    protected $fillable = [
        'day', 'start', 'end'
    ];

}
