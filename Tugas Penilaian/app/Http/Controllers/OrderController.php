<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'nullable|string',
            'menu_item' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'delivery_option' => 'required|in:pickup,delivery',
            'address' => 'nullable|string',
            'notes' => 'nullable|string'
        ]);

        // Generate order ID
        $orderId = 'ORD-' . date('Ymd') . '-' . str_pad(Order::whereDate('created_at', today())->count() + 1, 3, '0', STR_PAD_LEFT);
        
        $order = Order::create(array_merge($validated, [
            'user_id' => auth()->id(),
            'order_id' => $orderId,
            'order_date' => now(),
            'status' => 'pending'
        ]));

        return redirect()->route('pengantaran')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(Order $order)
    {
        return response()->json($order);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,preparing,ready,delivering,completed,cancelled'
        ]);

        $order->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Status pesanan berhasil diupdate',
            'order' => $order
        ]);
    }

    public function getRecentOrders()
    {
        $orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return response()->json($orders);
    }
}
