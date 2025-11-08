<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Makanan Favorit - Admin</title>
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
    .nav-menu a:hover, .nav-menu a.active { background: linear-gradient(135deg, #667eea, #764ba2); color: white; transform: translateX(5px); }
    .nav-menu i { margin-right: 10px; width: 20px; }
    .main-content { flex: 1; padding: 20px; overflow-y: auto; }
    .header { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .header h1 { color: #333; font-size: 28px; margin-bottom: 5px; }
    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px; }
    .stat-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center; }
    .stat-number { font-size: 36px; font-weight: bold; color: #667eea; margin-bottom: 10px; }
    .stat-label { color: #666; font-size: 16px; }
    .content-section { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-bottom: 20px; }
    .section-title { font-size: 20px; font-weight: 600; color: #333; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
    .section-title i { color: #667eea; }
    .table { width: 100%; border-collapse: collapse; }
    .table th, .table td { padding: 12px; text-align: left; border-bottom: 1px solid #e0e0e0; }
    .table th { background: #f8f9fa; font-weight: 600; color: #333; }
    .table tr:hover { background: #f8f9fa; }
    .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; }
    .badge-success { background: #d4edda; color: #155724; }
    .top-favorites { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; }
    .favorite-item { background: #f8f9fa; padding: 15px; border-radius: 10px; text-align: center; }
    .favorite-count { font-size: 24px; font-weight: bold; color: #667eea; }
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
            @if(auth()->user()->avatar)
                <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" 
                     alt="Avatar" 
                     style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; margin-bottom: 10px;">
            @else
                <i class="fas fa-user-circle" style="font-size: 40px; margin-bottom: 10px;"></i>
            @endif
            <h4>{{ auth()->user()->name ?? 'Admin' }}</h4>
            <p>{{ ucfirst(auth()->user()->role ?? 'Administrator') }}</p>
        </div>
        <ul class="nav-menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.favorites') }}" class="active"><i class="fas fa-heart"></i> Favorite</a></li>
            <li><a href="/menu"><i class="fas fa-utensils"></i> Menu</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Pelanggan</a></li>
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
            <h1>Makanan Favorit</h1>
            <p>Kelola dan lihat data makanan favorit pengguna</p>
        </div>

        <!-- Bagian statistik -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total_favorites'] }}</div>
                <div class="stat-label">Total Favorit</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total_users_with_favorites'] }}</div>
                <div class="stat-label">User dengan Favorit</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total_favorited_menus'] }}</div>
                <div class="stat-label">Menu Populer</div>
            </div>
        </div>

<!-- Top Favorites -->
<div class="content-section">
    <h3 class="section-title"><i class="fas fa-star"></i> Menu Paling Disukai</h3>
    <div class="top-favorites">
        @foreach($topFavorites as $menu)
        <div class="favorite-item">
            <h5>{{ $menu->name }}</h5>
            <div class="favorite-count">{{ $menu->favorited_by_count }}</div>
            <p>favorit</p>
        </div>
        @endforeach
    </div>
</div>

<!-- Recent Favorites -->
<div class="content-section">
    <h3 class="section-title"><i class="fas fa-heart"></i> Favorit Terbaru</h3>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Menu</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($favorites as $favorite)
            <tr>
                <td>{{ $favorite->user->name ?? 'Tidak tersedia' }}</td>
                <td>{{ $favorite->menu->name ?? 'Tidak tersedia' }}</td>
                <td>{{ $favorite->created_at ? $favorite->created_at->format('d/m/Y H:i') : '-' }}</td>
                <td><span class="badge badge-success">Aktif</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="margin-top: 20px;">
        {{ $favorites->links() }}
    </div>
</div>

<script>
    // Script untuk toggle favorite
function toggleFavorite(menuId) {
    fetch('/favorites/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ menu_id: menuId })
    })
    .then(response => response.json())
    .then(data => {
        const button = document.querySelector(`[data-menu-id="${menuId}"]`);
        if (data.status === 'added') {
            button.innerHTML = '<i class="fas fa-heart"></i> Favorit';
            button.classList.add('favorited');
        } else {
            button.innerHTML = '<i class="far fa-heart"></i> Favorite';
            button.classList.remove('favorited');
        }
        
        // Show notification
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan');
    });
}
</script>
</body>
</html>
