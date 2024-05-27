<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function show($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string',
            'item_client' => 'required|string',
            'item_weight' => 'required|numeric',
            'item_from' => 'required|string',
            'item_destination' => 'required|string',
            'item_pickup_time' => 'required|date',
            'item_dropoff_time' => 'required|date',
            'item_quote' => 'required|numeric',
            'item_image' => 'required|string',
            'item_length' => 'nullable|numeric',
            'item_width' => 'nullable|numeric',
            'item_height' => 'nullable|numeric',
            'item_status' => 'nullable|string',
            'item_current_bids' => 'nullable|integer',
        ]);

        $item = Item::create($validatedData);
        return response()->json($item, 201);
    }
}

