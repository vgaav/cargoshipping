<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index()
    {
        $bid = Bid::all();
        return response()->json($bid);
    }

    public function myBids(Request $request)
    {
        // Assuming you have authenticated user
        $userId = 1;

        // Fetch all bids made by the user, including related items
        $bids = Bid::where('user_id', $userId)->with('item')->get();

        return response()->json($bids);
    }
}

