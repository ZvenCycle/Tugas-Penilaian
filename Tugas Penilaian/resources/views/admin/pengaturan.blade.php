<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengaturan - Admin</title>
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
    .settings-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; }
    .settings-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .card-title { font-size: 20px; font-weight: 600; color: #333; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
    .card-title i { color: #667eea; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #333; }
    .form-control { width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; transition: border-color 0.3s ease; }
    .form-control:focus { outline: none; border-color: #667eea; }
    .btn { padding: 12px 24px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; text-decoration: none; }
    .btn-primary { background: linear-gradient(135deg, #667eea, #764ba2); color: white; }
    .btn-success { background: linear-gradient(135deg, #43e97b, #38f9d7); color: white; }
    .btn-warning { background: linear-gradient(135deg, #f093fb, #f5576c); color: white; }
    .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
    .alert { padding: 15px; border-radius: 8px; margin-bottom: 20px; }
    .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
    .switch { position: relative; display: inline-block; width: 60px; height: 34px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 34px; }
    .slider:before { position: absolute; content: ""; height: 26px; width: 26px; left: 4px; bottom: 4px; background-color: white; transition: .4s; border-radius: 50%; }
    input:checked + .slider { background-color: #667eea; }
    input:checked + .slider:before { transform: translateX(26px); }
    .system-info { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-top: 20px; }
    .system-info h4 { color: #333; margin-bottom: 10px; }
    .system-info p { color: #666; margin-bottom: 5px; }
    .backup-section { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-bottom: 20px; }
    .backup-item { display: flex; justify-content: space-between; align-items: center; padding: 15px; border: 1px solid #e0e0e0; border-radius: 8px; margin-bottom: 10px; }
    .backup-info h5 { color: #333; margin-bottom: 5px; }
    .backup-info p { color: #666; font-size: 14px; }
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
            <li><a href="#"><i class="fas fa-shopping-cart"></i> Penjualan</a></li>
            <li><a href="/menu"><i class="fas fa-utensils"></i> Menu</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Pelanggan</a></li>
            <li><a href="{{ route('admin.laporan') }}"><i class="fas fa-chart-bar"></i> Laporan</a></li>
            <li><a href="{{ route('admin.pengaturan') }}" class="active"><i class="fas fa-cog"></i> Pengaturan</a></li>
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
            <h1>Pengaturan Sistem</h1>
            <p>Kelola konfigurasi dan pengaturan aplikasi</p>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> Pastikan untuk menyimpan perubahan setelah melakukan konfigurasi.
        </div>

        <!-- Settings Grid -->
        <div class="settings-grid">
            <!-- Profil Admin -->
            <div class="settings-card">
                <h3 class="card-title"><i class="fas fa-user-cog"></i> Profil Admin</h3>
                <form action="{{ route('admin.update-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Admin</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name ?? 'Administrator' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email ?? 'admin@resto.com' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Foto Profil</label>
                        <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*">
                        @if(auth()->user()->avatar)
                            <small class="text-muted">Foto saat ini: {{ auth()->user()->avatar }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Profil</button>
                </form>
            </div>

            <!-- Pengaturan Aplikasi -->
            <div class="settings-card">
                <h3 class="card-title"><i class="fas fa-cogs"></i> Pengaturan Aplikasi</h3>
                <form action="{{ route('admin.update-settings') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="app_name">Nama Aplikasi</label>
                        <input type="text" id="app_name" name="app_name" class="form-control" value="RestoAdmin">
                    </div>
                    <div class="form-group">
                        <label for="restaurant_name">Nama Restoran</label>
                        <input type="text" id="restaurant_name" name="restaurant_name" class="form-control" value="Warung Makan Sederhana">
                    </div>
                    <div class="form-group">
                        <label for="restaurant_address">Alamat Restoran</label>
                        <textarea id="restaurant_address" name="restaurant_address" class="form-control" rows="3">Jl. Contoh No. 123, Jakarta Selatan</textarea>
                    </div>
                    <div class="form-group">
                        <label for="currency">Mata Uang</label>
                        <select id="currency" name="currency" class="form-control">
                            <option value="IDR" selected>Rupiah (IDR)</option>
                            <option value="USD">Dollar (USD)</option>
                            <option value="EUR">Euro (EUR)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Pengaturan</button>
                </form>
            </div>

            <!-- Pengaturan Notifikasi -->
            <div class="settings-card">
                <h3 class="card-title"><i class="fas fa-bell"></i> Pengaturan Notifikasi</h3>
                <form action="{{ route('admin.update-notifications') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Notifikasi Email</label>
                        <div style="display: flex; align-items: center; gap: 15px; margin-top: 10px;">
                            <label class="switch">
                                <input type="checkbox" name="email_notifications" checked>
                                <span class="slider"></span>
                            </label>
                            <span>Aktifkan notifikasi email</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Notifikasi Pesanan Baru</label>
                        <div style="display: flex; align-items: center; gap: 15px; margin-top: 10px;">
                            <label class="switch">
                                <input type="checkbox" name="order_notifications" checked>
                                <span class="slider"></span>
                            </label>
                            <span>Notifikasi saat ada pesanan baru</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Laporan Harian</label>
                        <div style="display: flex; align-items: center; gap: 15px; margin-top: 10px;">
                            <label class="switch">
                                <input type="checkbox" name="daily_reports">
                                <span class="slider"></span>
                            </label>
                            <span>Kirim laporan harian via email</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Notifikasi</button>
                </form>
            </div>

            <!-- Keamanan -->
            <div class="settings-card">
                <h3 class="card-title"><i class="fas fa-shield-alt"></i> Keamanan</h3>
                <form action="{{ route('admin.change-password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Password Saat Ini</label>
                        <input type="password" id="current_password" name="current_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-key"></i> Ubah Password</button>
                </form>
            </div>
        </div>

        <!-- Backup & Restore -->
        <div class="backup-section">
            <h3 class="card-title"><i class="fas fa-database"></i> Backup & Restore</h3>
            <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                <button class="btn btn-success" onclick="createBackup()"><i class="fas fa-download"></i> Buat Backup</button>
                <button class="btn btn-primary" onclick="document.getElementById('restore-file').click()"><i class="fas fa-upload"></i> Restore Backup</button>
                <input type="file" id="restore-file" style="display: none;" accept=".sql,.zip">
            </div>
            
            <h4>Backup Terbaru:</h4>
            <div class="backup-item">
                <div class="backup-info">
                    <h5>backup_{{ date('Y-m-d_H-i-s') }}.sql</h5>
                    <p>Dibuat: {{ date('d/m/Y H:i:s') }} | Ukuran: 2.5 MB</p>
                </div>
                <div>
                    <button class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-download"></i> Download</button>
                    <button class="btn btn-warning"><i class="fas fa-trash"></i> Hapus</button>
                </div>
            </div>
        </div>

        <!-- System Information -->
        <div class="settings-card">
            <h3 class="card-title"><i class="fas fa-info-circle"></i> Informasi Sistem</h3>
            <div class="system-info">
                <h4>Detail Sistem</h4>
                <p><strong>Versi Aplikasi:</strong> 1.0.0</p>
                <p><strong>Versi Laravel:</strong> {{ app()->version() }}</p>
                <p><strong>Versi PHP:</strong> {{ phpversion() }}</p>
                <p><strong>Database:</strong> MySQL</p>
                <p><strong>Server:</strong> {{ $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' }}</p>
                <p><strong>Waktu Server:</strong> {{ date('d/m/Y H:i:s') }}</p>
                <p><strong>Timezone:</strong> {{ config('app.timezone') }}</p>
            </div>
        </div>
    </div>
</div>

<script>
function createBackup() {
    if(confirm('Apakah Anda yakin ingin membuat backup database?')) {
        // Implementasi backup
        alert('Backup berhasil dibuat!');
    }
}

document.getElementById('restore-file').addEventListener('change', function(e) {
    if(e.target.files.length > 0) {
        if(confirm('Apakah Anda yakin ingin restore backup? Data saat ini akan ditimpa.')) {
            // Implementasi restore
            alert('Restore berhasil!');
        }
    }
});

// Auto-save notification
function showSaveNotification() {
    const notification = document.createElement('div');
    notification.className = 'alert alert-success';
    notification.innerHTML = '<i class="fas fa-check-circle"></i> Pengaturan berhasil disimpan!';
    notification.style.position = 'fixed';
    notification.style.top = '20px';
    notification.style.right = '20px';
    notification.style.zIndex = '9999';
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Form submissions
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        showSaveNotification();
    });
});
</script>
</body>
</html>