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

    public function update(Request $request, $id)
    {
    // Validate the request data
    $request->validate([
        'bid_amount' => 'required|numeric|min:0',
    ]);

    // Find the bid by ID
    $bid = Bid::findOrFail($id);

    // Update the bid_amount field
    $bid->bid_amount = $request->input('bid_amount');

    // Save the updated bid
    $bid->save();

    return response()->json(['message' => 'Bid updated successfully', 'bid' => $bid]);
    }


    public function destroy($id)
   {
    // Find the bid by ID
    $bid = Bid::findOrFail($id);

    // Delete the bid
    $bid->delete();

    return response()->json(['message' => 'Bid deleted successfully']);
  }
}

