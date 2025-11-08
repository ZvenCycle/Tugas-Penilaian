<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk - Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .user-info {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-menu li {
            margin: 5px 0;
        }

        .nav-menu a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            background-color: rgba(255,255,255,0.1);
            border-left: 4px solid #fff;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .header {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-card .icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .stat-card .number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .messages-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table-header {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-unread {
            background-color: #dc3545;
            color: white;
        }

        .status-read {
            background-color: #ffc107;
            color: #212529;
        }

        .status-replied {
            background-color: #28a745;
            color: white;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
            margin: 2px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
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
                <li><a href="{{ route('admin.favorites') }}"><i class="fas fa-heart"></i> Favorite</a></li>
                <li><a href="{{ route('admin.messages') }}" class="active"><i class="fas fa-envelope"></i> Pesan</a></li>
                <li><a href="{{ route('admin.laporan') }}"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                <li><a href="{{ route('admin.pengaturan') }}"><i class="fas fa-cog"></i> Pengaturan</a></li>
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
                <h1>Pesan Masuk</h1>
                <p>Kelola pesan dan tanggapan dari pelanggan</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="icon" style="color: #007bff;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="number">{{ $stats['total'] }}</div>
                    <div>Total Pesan</div>
                </div>
                <div class="stat-card">
                    <div class="icon" style="color: #dc3545;">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <div class="number">{{ $stats['unread'] }}</div>
                    <div>Belum Dibaca</div>
                </div>
                <div class="stat-card">
                    <div class="icon" style="color: #28a745;">
                        <i class="fas fa-reply"></i>
                    </div>
                    <div class="number">{{ $stats['replied'] }}</div>
                    <div>Sudah Dibalas</div>
                </div>
                <div class="stat-card">
                    <div class="icon" style="color: #ffc107;">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div class="number">{{ $stats['today'] }}</div>
                    <div>Hari Ini</div>
                </div>
            </div>

            <!-- Messages Table -->
            <div class="messages-table">
                <div class="table-header">
                    <h3>Daftar Pesan</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                            <tr>
                                <td>{{ $message->formatted_date }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ Str::limit($message->message, 50) }}</td>
                                <td>
                                    <span class="status-badge status-{{ $message->status }}">
                                        @if($message->status === 'unread')
                                            Belum Dibaca
                                        @elseif($message->status === 'read')
                                            Sudah Dibaca
                                        @else
                                            Sudah Dibalas
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 40px;">
                                    <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc; margin-bottom: 10px;"></i>
                                    <p>Belum ada pesan masuk</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                @if($messages->hasPages())
                    <div class="pagination">
                        {{ $messages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>