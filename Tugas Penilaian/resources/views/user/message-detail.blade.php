<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesan - FoodMarket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
            color: #333;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        .navbar-nav a {
            color: #333;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .navbar-nav a:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .page-header h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .page-header p {
            color: #666;
            font-size: 16px;
        }

        .message-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .message-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .message-header h3 {
            font-size: 24px;
            margin: 0;
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .message-content {
            padding: 30px;
        }

        .message-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        .info-item i {
            color: #667eea;
            font-size: 20px;
            margin-top: 2px;
        }

        .info-item strong {
            display: block;
            color: #333;
            margin-bottom: 5px;
        }

        .info-item span {
            color: #666;
            font-size: 14px;
        }

        .message-text {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 25px;
            border-radius: 12px;
            border-left: 5px solid #667eea;
            margin: 25px 0;
            line-height: 1.7;
        }

        .message-text h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .message-text p {
            color: #555;
            font-size: 16px;
            margin: 0;
        }

        .reply-section {
            background: linear-gradient(135deg, #e8f5e8, #d4edda);
            padding: 25px;
            border-radius: 12px;
            border-left: 5px solid #28a745;
            margin-top: 25px;
        }

        .reply-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #155724;
            font-weight: 600;
        }

        .reply-meta i {
            color: #28a745;
        }

        .reply-text {
            color: #155724;
            font-size: 16px;
            line-height: 1.6;
        }

        .no-reply {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            padding: 25px;
            border-radius: 12px;
            border-left: 5px solid #ffc107;
            margin-top: 25px;
            text-align: center;
        }

        .no-reply i {
            font-size: 48px;
            color: #856404;
            margin-bottom: 15px;
        }

        .no-reply h4 {
            color: #856404;
            margin-bottom: 10px;
        }

        .no-reply p {
            color: #856404;
            margin: 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #545b62;
            transform: translateY(-2px);
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            .message-info {
                grid-template-columns: 1fr;
            }

            .message-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <i class="fas fa-utensils"></i> FoodMarket
            </a>
            <ul class="navbar-nav">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ route('menu') }}"><i class="fas fa-utensils"></i> Menu</a></li>
                @auth
                    <li><a href="{{ route('user.messages') }}"><i class="fas fa-envelope"></i> Pesan Saya</a></li>
                   <li><a href="{{ route('my-favorites') }}"><i class="fas fa-heart"></i> Favorit</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1><i class="fas fa-envelope-open"></i> Detail Pesan</h1>
            <p>Lihat detail pesan yang Anda kirimkan dan balasan dari admin</p>
        </div>

        <!-- Message Details -->
        <div class="message-card">
            <div class="message-header">
                <h3><i class="fas fa-comment"></i> Pesan Anda</h3>
                <span class="status-badge">
                    @if($message->status == 'pending')
                        <i class="fas fa-clock"></i> Menunggu Balasan
                    @elseif($message->status == 'replied')
                        <i class="fas fa-check-circle"></i> Sudah Dibalas
                    @else
                        <i class="fas fa-envelope"></i> {{ ucfirst($message->status) }}
                    @endif
                </span>
            </div>
            
            <div class="message-content">
                <div class="message-info">
                    <div class="info-item">
                        <i class="fas fa-calendar-alt"></i>
                        <div>
                            <strong>Tanggal Kirim</strong>
                            <span>{{ $message->created_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-user"></i>
                        <div>
                            <strong>Nama Pengirim</strong>
                            <span>{{ $message->name }}</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <span>{{ $message->email }}</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Telepon</strong>
                            <span>{{ $message->phone }}</span>
                        </div>
                    </div>
                </div>

                <div class="message-text">
                    <h4><i class="fas fa-comment-dots"></i> Isi Pesan:</h4>
                    <p>{{ $message->message }}</p>
                </div>

                @if($message->admin_reply)
                    <div class="reply-section">
                        <div class="reply-meta">
                            <i class="fas fa-reply"></i>
                            <strong>Balasan Admin</strong>
                            <span>{{ $message->replied_at ? $message->replied_at->format('d M Y, H:i') : 'Tanggal tidak tersedia' }}</span>
                        </div>
                        <div class="reply-text">
                            {{ $message->admin_reply }}
                        </div>
                    </div>
                @else
                    <div class="no-reply">
                        <i class="fas fa-hourglass-half"></i>
                        <h4>Menunggu Balasan</h4>
                        <p>Pesan Anda sedang diproses. Admin akan membalas segera.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('user.messages') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pesan
            </a>
            <a href="{{ route('home') }}#contact" class="btn btn-primary">
                <i class="fas fa-plus"></i> Kirim Pesan Baru
            </a>
        </div>
    </div>

    @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</body>
</html>