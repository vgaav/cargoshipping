<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_image',
        'item_client',
        'item_weight',
        'item_from',
        'item_destination',
        'item_pickup_time',
        'item_dropoff_time',
        'item_quote'
    ];
}
