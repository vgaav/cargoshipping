<?php

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items, 200);
    }

    public function show($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        return response()->json($item, 200);
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item->item_id = $request->item_id;
        $item->item_name = $request->item_name;
        $item->item_client = $request->item_client;
        $item->item_weight = $request->item_weight;
        $item->item_from = $request->item_from;
        $item->item_destination = $request->item_destination;
        $item->item_pickup_time = $request->item_pickup_time;
        $item->item_dropoff_time = $request->item_dropoff_time;
        $item->item_quote = $request->item_quote;
        $item->save();
    }
}
