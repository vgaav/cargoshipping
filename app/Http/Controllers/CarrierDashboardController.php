<?php
//app/Http/Controllers/CarrierDashboardController.php
namespace App\Http\Controllers;

use App\Models\Item;  // import the Item model
use App\Models\Vehicle;  // Import the Vehicle model

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
}

