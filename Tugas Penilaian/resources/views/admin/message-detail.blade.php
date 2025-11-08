<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesan - Admin Dashboard</title>
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

        .message-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .message-header {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
            border-radius: 10px 10px 0 0;
        }

        .message-content {
            padding: 20px;
        }

        .message-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item i {
            color: #007bff;
            width: 20px;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
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

        .message-text {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #007bff;
            margin: 20px 0;
            line-height: 1.6;
        }

        .reply-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #545b62;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .existing-reply {
            background: #e8f5e8;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #28a745;
            margin: 20px 0;
        }

        .reply-meta {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
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
                <h1>Detail Pesan</h1>
                <p>Lihat dan balas pesan dari pelanggan</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <!-- Message Details -->
            <div class="message-card">
                <div class="message-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3>Pesan dari {{ $message->name }}</h3>
                        <span class="status-badge status-{{ $message->status }}">
                            @if($message->status === 'unread')
                                <i class="fas fa-envelope"></i> Belum Dibaca
                            @elseif($message->status === 'read')
                                <i class="fas fa-envelope-open"></i> Sudah Dibaca
                            @else
                                <i class="fas fa-reply"></i> Sudah Dibalas
                            @endif
                        </span>
                    </div>
                </div>
                
                <div class="message-content">
                    <div class="message-info">
                        <div class="info-item">
                            <i class="fas fa-user"></i>
                            <div>
                                <strong>Nama:</strong><br>
                                {{ $message->name }}
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <strong>Email:</strong><br>
                                <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <strong>Telepon:</strong><br>
                                <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-calendar"></i>
                            <div>
                                <strong>Tanggal:</strong><br>
                                {{ $message->formatted_date }}
                            </div>
                        </div>
                        @if($message->user)
                            <div class="info-item">
                                <i class="fas fa-user-tag"></i>
                                <div>
                                    <strong>User Terdaftar:</strong><br>
                                    {{ $message->user->name }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="message-text">
                        <h4><i class="fas fa-comment"></i> Pesan:</h4>
                        <p>{{ $message->message }}</p>
                    </div>

                    @if($message->admin_reply)
                        <div class="existing-reply">
                            <div class="reply-meta">
                                <i class="fas fa-reply"></i> 
                                <strong>Balasan Admin</strong> - 
                                {{ $message->replied_at ? $message->replied_at->format('d M Y, H:i') : 'Tanggal tidak tersedia' }}
                            </div>
                            <p>{{ $message->admin_reply }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Reply Section -->
            @if($message->status !== 'replied')
                <div class="reply-section">
                    <h3><i class="fas fa-reply"></i> Balas Pesan</h3>
                    <form method="POST" action="{{ route('admin.messages.reply', $message->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="reply">Balasan Anda:</label>
                            <textarea name="reply" id="reply" class="form-control" placeholder="Tulis balasan Anda di sini..." required>{{ old('reply') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Kirim Balasan
                        </button>
                        <a href="{{ route('admin.messages') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </form>
                </div>
            @else
                <div class="reply-section">
                    <div style="text-align: center; padding: 40px;">
                        <i class="fas fa-check-circle" style="font-size: 3rem; color: #28a745; margin-bottom: 15px;"></i>
                        <h3>Pesan Sudah Dibalas</h3>
                        <p>Anda telah membalas pesan ini pada {{ $message->replied_at->format('d M Y, H:i') }}</p>
                        <a href="{{ route('admin.messages') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pesan
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>