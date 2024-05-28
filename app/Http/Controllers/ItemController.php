<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    public function index()
    {
        try {
            $items = Item::all();
            return response()->json($items);
        } catch (\Exception $e) {
            Log::error('Error fetching items: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to fetch items'], 500);
        }
    }

    public function show($id)
    {
        try {
            $item = Item::find($id);
            if (!$item) {
                return response()->json(['message' => 'Item not found'], 404);
            }
            return response()->json($item, 200);
        } catch (\Exception $e) {
            Log::error('Error fetching item: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to fetch item'], 500);
        }
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

        try {
            $item = Item::create($validatedData);
            return response()->json($item, 201);
        } catch (\Exception $e) {
            Log::error('Error creating item: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to create item'], 500);
        }
    }

    // Optional: Adding update method
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_name' => 'sometimes|string',
            'item_client' => 'sometimes|string',
            'item_weight' => 'sometimes|numeric',
            'item_from' => 'sometimes|string',
            'item_destination' => 'sometimes|string',
            'item_pickup_time' => 'sometimes|date',
            'item_dropoff_time' => 'sometimes|date',
            'item_quote' => 'sometimes|numeric',
            'item_image' => 'sometimes|string',
            'item_length' => 'sometimes|numeric',
            'item_width' => 'sometimes|numeric',
            'item_height' => 'sometimes|numeric',
            'item_status' => 'sometimes|string',
            'item_current_bids' => 'sometimes|integer',
        ]);

        try {
            $item = Item::find($id);
            if (!$item) {
                return response()->json(['message' => 'Item not found'], 404);
            }

            $item->update($validatedData);
            return response()->json($item, 200);
        } catch (\Exception $e) {
            Log::error('Error updating item: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to update item'], 500);
        }
    }

    // Optional: Adding delete method
    public function destroy($id)
    {
        try {
            $item = Item::find($id);
            if (!$item) {
                return response()->json(['message' => 'Item not found'], 404);
            }

            $item->delete();
            return response()->json(['message' => 'Item deleted successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting item: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete item'], 500);
        }
    }
}

