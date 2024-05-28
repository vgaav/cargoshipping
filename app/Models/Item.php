<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name', 'item_client', 'item_weight', 'item_from',
        'item_destination', 'item_pickup_time', 'item_dropoff_time',
        'item_quote', 'item_image', 'item_length', 'item_width',
        'item_height', 'item_status', 'item_current_bids'
    ];

    protected $casts = [
        'item_weight' => 'float',
        'item_pickup_time' => 'datetime',
        'item_dropoff_time' => 'datetime',
        'item_quote' => 'float',
        'item_length' => 'float',
        'item_width' => 'float',
        'item_height' => 'float',
        'item_current_bids' => 'integer',
    ];
}

