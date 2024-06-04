<?php
//app/Http/Controllers/CarrierDashboardController.php
namespace App\Http\Controllers;

use App\Models\Item;  // Make sure to import the Item model
use Illuminate\Http\Request;

class CarrierDashboardController extends Controller
{
    public function index()
    {
        // Fetch all items from the database
        $items = Item::all();

        // Pass the items to the Blade template
        return view('carrier-dashboard', compact('items'));
    }
}

