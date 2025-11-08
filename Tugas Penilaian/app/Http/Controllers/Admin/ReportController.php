<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal dari request atau default ke awal dan akhir bulan ini
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::now()->format('Y-m-d'));
        
        // Ambil data laporan
        $reportData = $this->generateReportData($startDate, $endDate);
        
        return view('admin.laporan', compact('reportData', 'startDate', 'endDate'));
    }
    
    private function generateReportData($startDate, $endDate)
    {
        // Ambil semua order di range tanggal
        $orders = Order::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])->get();

        // Statistik umum
        $totalOrders = $orders->count();
        $totalRevenue = $orders->sum('total_amount');
        $completedOrders = $orders->where('status', 'completed')->count();
        $pendingOrders = $orders->where('status', 'pending')->count();
        $cancelledOrders = $orders->where('status', 'cancelled')->count();

        // Penjualan per hari
        $dailySales = Order::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_amount) as total'), DB::raw('COUNT(*) as orders'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Menu terpopuler
        $popularMenus = Order::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->select('menu_item', DB::raw('SUM(quantity) as total_quantity'), DB::raw('SUM(total_amount) as total_revenue'))
            ->groupBy('menu_item')
            ->orderBy('total_quantity', 'desc')
            ->limit(10)
            ->get();

        // Status pesanan
        $ordersByStatus = Order::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        return [
            'summary' => [
                'total_orders' => $totalOrders,
                'total_revenue' => $totalRevenue,
                'completed_orders' => $completedOrders,
                'pending_orders' => $pendingOrders,
                'cancelled_orders' => $cancelledOrders,
                'completion_rate' => $totalOrders > 0 ? round(($completedOrders / $totalOrders) * 100, 2) : 0
            ],
            'daily_sales' => $dailySales,
            'popular_menus' => $popularMenus,
            'orders_by_status' => $ordersByStatus
        ];
    }
    
    public function exportPdf(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::now()->format('Y-m-d'));
        
        $reportData = $this->generateReportData($startDate, $endDate);
        
        // Generate PDF menggunakan DomPDF
        $pdf = Pdf::loadView('admin.laporan-pdf', compact('reportData', 'startDate', 'endDate'));
        
        // Set paper size dan orientasi
        $pdf->setPaper('A4', 'portrait');
        
        // Generate filename dengan tanggal
        $filename = 'laporan-penjualan-' . $startDate . '-to-' . $endDate . '.pdf';
        
        // Download PDF
        return $pdf->download($filename);
    }
}
