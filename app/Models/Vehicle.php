<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'user_ID',
        'vehicle_name',
        'vehicle_type',
        'capacity',
        'availability',
    ];
}
