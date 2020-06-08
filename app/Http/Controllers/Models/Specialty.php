<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $table = 'specialties';

    public $timestamps = false;

    protected $fillable = [
        'name', 'imageUrl'
    ];

}
