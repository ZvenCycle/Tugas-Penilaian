<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 250px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .logo h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .user-info {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .nav-menu {
            list-style: none;
        }
        
        .nav-menu li {
            margin-bottom: 10px;
        }
        
        .nav-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #333;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .nav-menu a:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: translateX(5px);
        }
        
        .nav-menu i {
            margin-right: 10px;
            width: 20px;
        }
        
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 5px;
        }
        
        .header p {
            color: #666;
            font-size: 16px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        
        .stat-icon.sales {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }
        
        .stat-icon.profit {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
        }
        
        .stat-icon.loss {
            background: linear-gradient(135deg, #fa709a, #fee140);
        }
        
        .stat-icon.orders {
            background: linear-gradient(135deg, #a8edea, #fed6e3);
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .stat-change {
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        
        .stat-change.positive {
            color: #10b981;
        }
        
        .stat-change.negative {
            color: #ef4444;
        }
        
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .chart-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .chart-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        
        .recent-orders {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .orders-table th,
        .orders-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .orders-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-success {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }
        
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                order: 2;
            }
            
            .main-content {
                order: 1;
            }
            
            .charts-section {
                grid-template-columns: 1fr;
            }
        }
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
                <h4>{{ auth()->user()->name }}</h4>
                <p>{{ auth()->user()->role }}</p>
            </div>
            
            <ul class="nav-menu">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-shopping-cart"></i> Penjualan</a></li>
                <li><a href="/menu"><i class="fas fa-utensils"></i> Menu</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Pelanggan</a></li>
                <li><a href="/admin/laporan"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                <li><a href="/admin/pengaturan"><i class="fas fa-cog"></i> Pengaturan</a></li>
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ route('admin.favorites') }}"><i class="fas fa-heart"></i> Favorite</a></li>
                <li><a href="{{ route('admin.messages') }}"><i class="fas fa-envelope"></i> Pesan</a></li>
                <li><a href="{{ route('admin.laporan') }}"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                <li><a href="{{ route('admin.career.index') }}"><i class="fas fa-briefcase"></i> Karir</a></li>
                <li><a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h1>Dashboard Admin</h1>
                <p>Selamat datang kembali, {{ auth()->user()->name }}! Berikut adalah ringkasan bisnis hari ini.</p>
            </div>
            
            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value" id="todaySales">Rp 0</div>
                            <div class="stat-label">Total Penjualan Hari Ini</div>
                            <div class="stat-change positive" id="salesChange">
                                <i class="fas fa-arrow-up"></i> Loading...
                            </div>
                        </div>
                        <div class="stat-icon sales">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value" id="todayProfit">Rp 0</div>
                            <div class="stat-label">Keuntungan Bersih</div>
                            <div class="stat-change positive" id="profitChange">
                                <i class="fas fa-arrow-up"></i> Loading...
                            </div>
                        </div>
                        <div class="stat-icon profit">
                            <i class="fas fa-coins"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value" id="todayLoss">Rp 0</div>
                            <div class="stat-label">Kerugian/Diskon</div>
                            <div class="stat-change negative" id="lossChange">
                                <i class="fas fa-arrow-down"></i> Loading...
                            </div>
                        </div>
                        <div class="stat-icon loss">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value" id="todayOrders">0</div>
                            <div class="stat-label">Total Pesanan</div>
                            <div class="stat-change positive" id="ordersChange">
                                <i class="fas fa-arrow-up"></i> Loading...
                            </div>
                        </div>
                        <div class="stat-icon orders">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Charts Section -->
            <div class="charts-section">
                <div class="chart-card">
                    <h3 class="chart-title">Grafik Penjualan 7 Hari Terakhir</h3>
                    <canvas id="salesChart" width="400" height="200"></canvas>
                </div>
                
                <div class="chart-card">
                    <h3 class="chart-title">Kategori Menu Terlaris</h3>
                    <canvas id="categoryChart" width="300" height="300"></canvas>
                </div>
            </div>
            
            <!-- Recent Orders -->
            <div class="recent-orders">
                <h3 class="chart-title">Pesanan Terbaru</h3>
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody id="recentOrdersTable">
                        <tr>
                            <td colspan="5" class="text-center">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Hidden Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
    <script>
        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Penjualan (Rp)',
                    data: [1200000, 1900000, 1500000, 2200000, 2800000, 2100000, 2450000],
                    borderColor: 'rgb(102, 126, 234)',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Keuntungan (Rp)',
                    data: [400000, 650000, 500000, 750000, 950000, 700000, 850000],
                    borderColor: 'rgb(67, 233, 123)',
                    backgroundColor: 'rgba(67, 233, 123, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
        
        // Category Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Nasi', 'Ayam', 'Minuman', 'Snack', 'Dessert'],
                datasets: [{
                    data: [35, 25, 20, 12, 8],
                    backgroundColor: [
                        '#667eea',
                        '#764ba2',
                        '#f093fb',
                        '#f5576c',
                        '#4facfe'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    </script>
</body>
</html>

<script>
// Update script untuk load data real-time
function loadDashboardStats() {
    fetch('/dashboard/stats')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Dashboard stats loaded:', data);
            if (data.success) {
                const stats = data.stats;
                
                // Update statistics
                document.getElementById('todaySales').textContent = 'Rp ' + parseInt(stats.today_sales || 0).toLocaleString();
                document.getElementById('todayProfit').textContent = 'Rp ' + parseInt(stats.today_profit || 0).toLocaleString();
                document.getElementById('todayLoss').textContent = 'Rp ' + parseInt(stats.today_loss || 0).toLocaleString();
                document.getElementById('todayOrders').textContent = stats.today_orders || 0;
                
                // Update recent orders table
                updateRecentOrdersTable(stats.recent_orders || []);
            } else {
                console.error('API returned error:', data.message);
                showErrorMessage('Gagal memuat data dashboard: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error loading dashboard stats:', error);
            showErrorMessage('Koneksi ke server gagal. Pastikan server Laravel berjalan.');
        });
}

function updateRecentOrdersTable(orders) {
    const tbody = document.getElementById('recentOrdersTable');
    
    if (!tbody) {
        console.error('Element recentOrdersTable tidak ditemukan');
        return;
    }
    
    if (!orders || orders.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" class="text-center">Belum ada pesanan hari ini</td></tr>';
        return;
    }
    
    tbody.innerHTML = orders.map(order => {
        const statusClass = {
            'pending': 'status-pending',
            'confirmed': 'status-pending',
            'preparing': 'status-pending',
            'ready': 'status-pending',
            'delivering': 'status-pending',
            'completed': 'status-success',
            'cancelled': 'status-cancelled'
        }[order.status] || 'status-pending';
        
        const statusText = {
            'pending': 'Menunggu',
            'confirmed': 'Dikonfirmasi',
            'preparing': 'Diproses',
            'ready': 'Siap',
            'delivering': 'Dikirim',
            'completed': 'Selesai',
            'cancelled': 'Dibatalkan'
        }[order.status] || order.status;
        
        return `
            <tr>
                <td>${order.order_id || '#ORD-' + order.id.toString().padStart(3, '0')}</td>
                <td>${order.customer_name || 'N/A'}</td>
                <td>Rp ${parseInt(order.total_amount || 0).toLocaleString()}</td>
                <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                <td>${new Date(order.created_at).toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</td>
            </tr>
        `;
    }).join('');
}

function showErrorMessage(message) {
    // Tampilkan pesan error di dashboard
    const errorDiv = document.createElement('div');
    errorDiv.className = 'alert alert-danger';
    errorDiv.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; padding: 15px; background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;';
    errorDiv.textContent = message;
    
    document.body.appendChild(errorDiv);
    
    // Hapus pesan setelah 5 detik
    setTimeout(() => {
        if (errorDiv.parentNode) {
            errorDiv.parentNode.removeChild(errorDiv);
        }
    }, 5000);
}

// Load data when page loads
document.addEventListener('DOMContentLoaded', function() {
    console.log('Dashboard loaded, fetching stats...');
    loadDashboardStats();
    
    // Refresh data every 30 seconds
    setInterval(loadDashboardStats, 30000);
});
</script>
