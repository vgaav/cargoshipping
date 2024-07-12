<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line to import the DB facade


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

  // BidController.php
  public function update(Request $request, $id)
  {
      $bid = Bid::find($id);
      if (!$bid) {
          return response()->json(['message' => 'Bid not found'], 404);
      }

      $bid->bid_amount = $request->input('bid_amount');
      $bid->save();

      return response()->json(['message' => 'Bid updated successfully']);
  }

  public function destroy($id)
  {
      $bid = Bid::find($id);
      if (!$bid) {
          return response()->json(['message' => 'Bid not found'], 404);
      }

      $bid->delete();

      return response()->json(['message' => 'Bid deleted successfully']);
  }

  public function lowestBids()
  {
      $lowestBids = Bid::select('item_id', DB::raw('MIN(bid_amount) as lowest_bid'))
          ->groupBy('item_id')
          ->get();

      return response()->json($lowestBids);
  }

}

