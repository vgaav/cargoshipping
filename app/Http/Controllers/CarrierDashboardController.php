<?php
//app/Http/Controllers/CarrierDashboardController.php

namespace App\Http\Controllers;

use App\Models\Item;  // import the Item model
use App\Models\Vehicle;  // Import the Vehicle model
use App\Models\Bid;  // Import the Bid model

use Illuminate\Http\Request;

class CarrierDashboardController extends Controller
{
    public function index()
    {
        // Fetch all items and vehicles from the database
        $items = Item::all();
        $vehicles = Vehicle::all();

        // Pass the items and vehicles to the Blade template
        return view('carrier-dashboard', compact('items', 'vehicles'));
    }

    public function submitBid(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'item_id' => 'required|exists:items,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'bid_amount' => 'required|numeric|min:1',
        ]);

        // Create a new Bid instance and save it to the database
        $bid = new Bid();
        $bid->item_id = $validatedData['item_id'];
        $bid->vehicle_id = $validatedData['vehicle_id'];
        $bid->bid_amount = $validatedData['bid_amount'];
        $bid->save();

        return response()->json(['message' => 'Bid submitted successfully!'], 200);
    }
}
