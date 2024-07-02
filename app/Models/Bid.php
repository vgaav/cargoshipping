<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'vehicle_id',
        'bid_amount',
        'user_id', // Ensure user_id is fillable
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
