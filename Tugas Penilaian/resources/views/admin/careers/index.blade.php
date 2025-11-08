<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manajemen Karir - Admin</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
    .nav-menu a:hover { background: linear-gradient(135deg, #667eea, #764ba2); color: white; transform: translateX(5px); }
    .nav-menu a.active { background: linear-gradient(135deg, #667eea, #764ba2); color: white; }
    .nav-menu i { margin-right: 10px; width: 20px; }
    .main-content { flex: 1; padding: 20px; overflow-y: auto; }
    .header { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; }
    .header h1 { color: #333; font-size: 28px; margin-bottom: 5px; }
    .btn-primary { background: linear-gradient(135deg, #667eea, #764ba2); border: none; padding: 10px 20px; border-radius: 8px; color: white; font-weight: 500; transition: all 0.3s ease; }
    .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .jobs-container { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .jobs-table { width: 100%; border-collapse: collapse; }
    .jobs-table th, .jobs-table td { padding: 12px; text-align: left; border-bottom: 1px solid #e0e0e0; }
    .jobs-table th { background: #f8f9fa; font-weight: 600; color: #333; }
    .jobs-table tr:hover { background: #f8f9fa; }
    .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 500; display: inline-block; }
    .status-active { background: #d1fae5; color: #065f46; }
    .status-inactive { background: #fee2e2; color: #991b1b; }
    .action-btn { padding: 6px 12px; border-radius: 6px; font-size: 14px; margin-right: 5px; text-decoration: none; display: inline-block; }
    .edit-btn { background: #dbeafe; color: #1e40af; }
    .delete-btn { background: #fee2e2; color: #991b1b; }
    .alert { padding: 15px; border-radius: 8px; margin-bottom: 20px; }
    .alert-success { background: #d1fae5; color: #065f46; }
    .alert-danger { background: #fee2e2; color: #991b1b; }
    .job-type { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 500; display: inline-block; }
    .job-type.full-time { background: #dbeafe; color: #1e40af; }
    .job-type.part-time { background: #e0e7ff; color: #3730a3; }
    .job-type.contract { background: #fef3c7; color: #92400e; }
    .job-type.internship { background: #d1fae5; color: #065f46; }
</style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <h2><i class="fas fa-store"></i> FigureStore</h2>
                <p>Admin Panel</p>
            </div>
            
            <div class="user-info">
                <i class="fas fa-user-circle" style="font-size: 40px; margin-bottom: 10px;"></i>
                <h4>{{ auth()->user()->name }}</h4>
                <p>{{ ucfirst(auth()->user()->role ?? 'Administrator') }}</p>
            </div>
            
            <ul class="nav-menu">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ route('admin.favorites') }}"><i class="fas fa-heart"></i> Favorite</a></li>
                <li><a href="/menu"><i class="fas fa-utensils"></i> Menu</a></li>
                <li><a href="{{ route('admin.careers.index') }}" class="active"><i class="fas fa-briefcase"></i> Karir</a></li>
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
                <div>
                    <h1>Manajemen Karir</h1>
                    <p>Kelola lowongan pekerjaan yang tersedia</p>
                </div>
                <a href="{{ route('admin.careers.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Lowongan
                </a>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Jobs Table -->
            <div class="jobs-container">
                <table class="jobs-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Departemen</th>
                            <th>Lokasi</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Tanggal Posting</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vacancies as $vacancy)
                            <tr>
                                <td>{{ $vacancy->title }}</td>
                                <td>{{ $vacancy->department }}</td>
                                <td>{{ $vacancy->location }}</td>
                                <td>
                                    <span class="job-type {{ $vacancy->type }}">
                                        {{ ucfirst($vacancy->type) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge {{ $vacancy->is_active ? 'status-active' : 'status-inactive' }}">
                                        {{ $vacancy->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </td>
                                <td>{{ $vacancy->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.careers.edit', $vacancy->id) }}" class="action-btn edit-btn">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.careers.destroy', $vacancy->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 30px;">
                                    <i class="fas fa-info-circle" style="font-size: 24px; color: #667eea; margin-bottom: 10px;"></i>
                                    <p>Belum ada lowongan pekerjaan yang tersedia.</p>
                                    <a href="{{ route('admin.careers.create') }}" class="btn btn-primary" style="margin-top: 10px;">
                                        Tambah Lowongan Baru
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>