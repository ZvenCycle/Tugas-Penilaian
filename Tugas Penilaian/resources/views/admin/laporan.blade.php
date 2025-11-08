<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Penjualan - Admin</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
    .dashboard-container { display: flex; min-height: 100vh; }
    .sidebar { width: 250px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; box-shadow: 2px 0 10px rgba(0,0,0,0.1); }
    .logo { text-align: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #e0e0e0; }
    .logo h2 { color: #333; font-size: 24px; margin-bottom: 5px; }
    .user-info { background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; }
    .nav-menu { list-style: none; }
    .nav-menu li { margin-bottom: 10px; }
    .nav-menu a { display: flex; align-items: center; padding: 12px 15px; color: #333; text-decoration: none; border-radius: 8px; transition: all 0.3s ease; }
    .nav-menu a:hover, .nav-menu a.active { background: linear-gradient(135deg, #667eea, #764ba2); color: white; transform: translateX(5px); }
    .nav-menu i { margin-right: 10px; width: 20px; }
    .main-content { flex: 1; padding: 20px; overflow-y: auto; }
    .header { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .header h1 { color: #333; font-size: 28px; margin-bottom: 5px; }
    .filter-section { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .filter-form { display: flex; gap: 15px; align-items: end; }
    .form-group { flex: 1; }
    .form-group label { display: block; margin-bottom: 5px; font-weight: 600; color: #333; }
    .form-control { width: 100%; padding: 10px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; }
    .btn { padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; text-decoration: none; }
    .btn-primary { background: linear-gradient(135deg, #667eea, #764ba2); color: white; }
    .btn-success { background: linear-gradient(135deg, #43e97b, #38f9d7); color: white; }
    .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
    .stat-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center; }
    .stat-value { font-size: 24px; font-weight: bold; color: #333; margin-bottom: 5px; }
    .stat-label { color: #666; font-size: 14px; }
    .charts-section { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 30px; }
    .chart-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); height: 300px; }
    .chart-title { font-size: 18px; font-weight: 600; color: #333; margin-bottom: 15px; }
    .table-section { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .table { width: 100%; border-collapse: collapse; }
    .table th, .table td { padding: 12px; text-align: left; border-bottom: 1px solid #e0e0e0; }
    .table th { background: #f8f9fa; font-weight: 600; color: #333; }
</style>
</head>
<body>
<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h2><i class="fas fa-utensils"></i> RestoAdmin</h2>
            <p>Dashboard Panel</p>
        </div>
        <div class="user-info">
            <i class="fas fa-user-circle" style="font-size: 40px; margin-bottom: 10px;"></i>
            <h4>{{ auth()->user()->name ?? 'Admin' }}</h4>
            <p>{{ auth()->user()->role ?? 'Administrator' }}</p>
        </div>
        <ul class="nav-menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i> Penjualan</a></li>
            <li><a href="/menu"><i class="fas fa-utensils"></i> Menu</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Pelanggan</a></li>
            <li><a href="{{ route('admin.laporan') }}" class="active"><i class="fas fa-chart-bar"></i> Laporan</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Pengaturan</a></li>
            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Laporan Penjualan</h1>
            <p>Analisis data penjualan dan performa bisnis</p>
        </div>

        <!-- Filter Section dengan Tombol Download -->
        <div class="filter-section">
            <form class="filter-form" method="GET" action="{{ route('admin.laporan') }}">
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $startDate }}">
                </div>
                <div class="form-group">
                    <label for="end_date">Tanggal Akhir</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $endDate }}">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filter</button>
                <a href="{{ route('admin.laporan.export') }}?start_date={{ $startDate }}&end_date={{ $endDate }}" class="btn btn-success"><i class="fas fa-download"></i> Download PDF</a>
            </form>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">{{ number_format($reportData['summary']['total_orders']) }}</div>
                <div class="stat-label">Total Pesanan</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">Rp {{ number_format($reportData['summary']['total_revenue'], 0, ',', '.') }}</div>
                <div class="stat-label">Total Pendapatan</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $reportData['summary']['completion_rate'] }}%</div>
                <div class="stat-label">Tingkat Penyelesaian</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ number_format($reportData['summary']['completed_orders']) }}</div>
                <div class="stat-label">Pesanan Selesai</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ number_format($reportData['summary']['pending_orders']) }}</div>
                <div class="stat-label">Pesanan Pending</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ number_format($reportData['summary']['cancelled_orders']) }}</div>
                <div class="stat-label">Pesanan Dibatalkan</div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="charts-section">
            <div class="chart-card">
                <div class="chart-title">Penjualan Harian</div>
                <canvas id="dailySalesChart"></canvas>
            </div>
            <div class="chart-card">
                <div class="chart-title">Status Pesanan</div>
                <canvas id="orderStatusChart"></canvas>
            </div>
        </div>

        <!-- Popular Menu Table -->
        <div class="table-section">
            <h3 class="chart-title">Menu Terpopuler</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Jumlah Terjual</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportData['popular_menus'] as $menu)
                    <tr>
                        <td>{{ $menu->menu_item }}</td>
                        <td>{{ number_format($menu->total_quantity) }}</td>
                        <td>Rp {{ number_format($menu->total_revenue, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Daily Sales Chart
const dailySalesCtx = document.getElementById('dailySalesChart').getContext('2d');
const dailySalesChart = new Chart(dailySalesCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode($reportData['daily_sales']->pluck('date')->map(function($date) { return date('d/m', strtotime($date)); })) !!},
        datasets: [{
            label: 'Penjualan Harian',
            data: {!! json_encode($reportData['daily_sales']->pluck('total')) !!},
            borderColor: 'rgb(102, 126, 234)',
            backgroundColor: 'rgba(102, 126, 234, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// Order Status Chart
const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
const orderStatusChart = new Chart(orderStatusCtx, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($reportData['orders_by_status']->pluck('status')) !!},
        datasets: [{
            data: {!! json_encode($reportData['orders_by_status']->pluck('count')) !!},
            backgroundColor: [
                '#43e97b',
                '#667eea', 
                '#ff6b6b'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
</body>
</html>