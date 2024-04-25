<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    //


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'Song_id' => 'required|exists:songs,id',
            'Invoice_id' => 'required|exists:invoices,id',
        ]);

        // Create a new order
        $order = Order::create([
            'Song_id' => $request->Song_id,
            'Invoice_id' => $request->Invoice_id,
        ]);

        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }

    public function index()
    {
        $orders = Order::all();
        return response()->json(['orders' => $orders], 200);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        return response()->json(['order' => $order], 200);
    }
}
