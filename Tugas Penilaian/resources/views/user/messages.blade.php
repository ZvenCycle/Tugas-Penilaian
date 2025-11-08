<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Saya - FoodMarket</title>
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            text-align: center;
        }

        .messages-grid {
            display: grid;
            gap: 20px;
        }

        .message-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .message-card:hover {
            transform: translateY(-5px);
        }

        .message-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
        }

        .message-content {
            padding: 20px;
        }

        .message-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
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
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            margin: 15px 0;
        }

        .reply-section {
            background: #e8f5e8;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid #28a745;
            margin-top: 15px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .empty-state i {
            font-size: 4rem;
            color: #ccc;
            margin-bottom: 20px;
        }

        .pagination {
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-envelope"></i> Pesan Saya</h1>
            <p>Lihat semua pesan yang telah Anda kirim dan balasan dari admin</p>
            <a href="{{ route('home') }}" class="btn btn-secondary" style="margin-top: 15px;">
                <i class="fas fa-arrow-left"></i> Kembali ke Home
            </a>
        </div>

        <div class="messages-grid">
            @forelse($messages as $message)
                <div class="message-card">
                    <div class="message-header">
                        <div class="message-meta">
                            <div>
                                <h3>Pesan ke Admin</h3>
                                <small>{{ $message->formatted_date }}</small>
                            </div>
                            <span class="status-badge status-{{ $message->status }}">
                                @if($message->status === 'unread')
                                    <i class="fas fa-envelope"></i> Terkirim
                                @elseif($message->status === 'read')
                                    <i class="fas fa-envelope-open"></i> Sudah Dibaca
                                @else
                                    <i class="fas fa-reply"></i> Ada Balasan
                                @endif
                            </span>
                        </div>
                    </div>
                    
                    <div class="message-content">
                        <div class="message-text">
                            <strong>Pesan Anda:</strong><br>
                            {{ Str::limit($message->message, 150) }}
                        </div>
                        
                        @if($message->admin_reply)
                            <div class="reply-section">
                                <strong><i class="fas fa-reply"></i> Balasan Admin:</strong><br>
                                {{ Str::limit($message->admin_reply, 150) }}
                                <br><small class="text-muted">Dibalas: {{ $message->replied_at->format('d M Y, H:i') }}</small>
                            </div>
                        @endif
                        
                        <div style="margin-top: 15px;">
                            <a href="{{ route('user.messages.show', $message->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Belum Ada Pesan</h3>
                    <p>Anda belum mengirim pesan apapun.</p>
                    <a href="{{ route('home') }}#contact" class="btn btn-primary" style="margin-top: 15px;">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan Pertama
                    </a>
                </div>
            @endforelse
        </div>
        
        @if($messages->hasPages())
            <div class="pagination">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</body>
</html>
