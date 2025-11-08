<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getStats()
    {
        try {
            $today = Carbon::today();
            
            // Hitung statistik hari ini
            $todayOrders = Order::whereDate('created_at', $today)->get();
            
            $stats = [
                'today_sales' => $todayOrders->sum('total_amount'),
                'today_profit' => $todayOrders->sum('total_amount') * 0.3, // Asumsi profit 30%
                'today_loss' => 0, // Bisa disesuaikan dengan logika bisnis
                'today_orders' => $todayOrders->count(),
                'recent_orders' => Order::with('user')
                    ->whereDate('created_at', $today)
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get()
                    ->map(function($order) {
                        return [
                            'id' => $order->id,
                            'customer_name' => $order->customer_name,
                            'menu_item' => $order->menu_item,
                            'quantity' => $order->quantity,
                            'total_amount' => $order->total_amount,
                            'status' => $order->status,
                            'created_at' => $order->created_at->toISOString()
                        ];
                    })
            ];
            
            return response()->json([
                'success' => true,
                'stats' => $stats
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error loading dashboard stats: ' . $e->getMessage()
            ], 500);
        }
    }
}
