<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorit Saya - FoodMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6c5ce7;
            --primary-dark: #5b4cc2;
            --secondary: #a363d9;
            --accent: #ffd93d;
            --text-dark: #2d3436;
            --text-light: #636e72;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(108, 92, 231, 0.2);
        }
        .navbar-brand { font-weight: 700; color: #fff !important; font-size: 1.5rem; letter-spacing: 1px; }
        .nav-link { color: rgba(255,255,255,0.9) !important; font-weight: 500; padding: 0.5rem 1.2rem; transition: all 0.3s ease; border-radius: 0.5rem; margin: 0 0.25rem; }
        .nav-link:hover { background: rgba(255,255,255,0.1); color: #fff !important; }
        .page-header { background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; padding: 4rem 0; text-align: center; margin-bottom: 3rem; }
        .page-title { font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; }
        .favorite-card { background: white; border-radius: 1rem; box-shadow: 0 8px 25px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease; margin-bottom: 2rem; }
        .favorite-card:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0,0,0,0.15); }
        .favorite-image { width: 100%; height: 200px; object-fit: cover; }
        .favorite-content { padding: 1.5rem; }
        .favorite-title { font-size: 1.3rem; font-weight: 600; color: var(--text-dark); margin-bottom: 0.5rem; }
        .favorite-description { color: var(--text-light); margin-bottom: 1rem; line-height: 1.6; }
        .favorite-price { font-size: 1.2rem; color: var(--primary); font-weight: 700; margin-bottom: 1rem; }
        .btn-remove-favorite { background: #e74c3c; color: white; border: none; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 500; transition: all 0.3s ease; }
        .btn-remove-favorite:hover { background: #c0392b; transform: translateY(-2px); }
        .btn-order { background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; border: none; padding: 0.5rem 1.5rem; border-radius: 0.5rem; font-weight: 500; transition: all 0.3s ease; margin-left: 0.5rem; }
        .btn-order:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3); }
        .empty-state { text-align: center; padding: 4rem 2rem; }
        .empty-icon { font-size: 4rem; color: var(--text-light); margin-bottom: 1rem; }
        .empty-title { font-size: 1.5rem; font-weight: 600; color: var(--text-dark); margin-bottom: 1rem; }
        .empty-description { color: var(--text-light); margin-bottom: 2rem; }
        .btn-browse-menu { background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; border: none; padding: 1rem 2rem; border-radius: 0.5rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease; }
        .btn-browse-menu:hover { color: white; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(108, 92, 231, 0.3); }
        a { text-decoration: none; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">FoodMarket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/my-favorites">Favorit</a></li>
                    <li class="nav-item"><a class="nav-link" href="/ai">AI Assistant</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <h1 class="page-title"><i class="fas fa-heart"></i> Favorit Saya</h1>
            <p>Koleksi makanan favorit yang telah Anda pilih</p>
        </div>
    </header>

    <!-- Favorites Content -->
    <div class="container">
        @if($favorites->count() > 0)
            <div class="row">
                @foreach($favorites as $favorite)
                <div class="col-md-6 col-lg-4">
                    <div class="favorite-card">
                        <img src="{{ $favorite->menu->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c' }}" 
                             class="favorite-image" 
                             alt="{{ $favorite->menu->name }}">
                        <div class="favorite-content">
                            <h3 class="favorite-title">{{ $favorite->menu->name }}</h3>
                            <p class="favorite-description">{{ $favorite->menu->description }}</p>
                            <div class="favorite-price">Rp {{ number_format($favorite->menu->price, 0, ',', '.') }}</div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn-remove-favorite" onclick="removeFavorite({{ $favorite->menu->id }})">
                                    <i class="fas fa-heart-broken"></i> Hapus
                                </button>
                                <button class="btn-order" onclick="orderNow('{{ $favorite->menu->name }}', {{ $favorite->menu->price }})">
                                    <i class="fas fa-shopping-cart"></i> Pesan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon"><i class="fas fa-heart-broken"></i></div>
                <h2 class="empty-title">Belum Ada Favorit</h2>
                <p class="empty-description">
                    Anda belum menambahkan makanan apapun ke daftar favorit.<br>
                    Jelajahi menu kami dan temukan makanan favorit Anda!
                </p>
                <a href="/menu" class="btn-browse-menu"><i class="fas fa-utensils"></i> Jelajahi Menu</a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle favorite (tidak dipakai di halaman ini, tapi untuk konsistensi)
        function toggleFavorite(menuId) {
            fetch('/favorites/toggle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ menu_id: menuId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'added') {
                    showNotification(data.message, 'success');
                } else if (data.status === 'removed') {
                    showNotification(data.message, 'info');
                }
            })
            .catch(err => {
                console.error(err);
                showNotification('Terjadi kesalahan', 'error');
            });
        }

        // Remove from favorites
        function removeFavorite(menuId) {
            if (confirm('Apakah Anda yakin ingin menghapus dari favorit?')) {
                fetch('/favorites/toggle', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ menu_id: menuId })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'removed') {
                        location.reload();
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Terjadi kesalahan saat menghapus favorit');
                });
            }
        }

        // Order now
        function orderNow(itemName, price) {
            window.location.href = `/beli?item=${encodeURIComponent(itemName)}&price=${price}`;
        }

        // Show notification
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
                ${message}
            `;
            document.body.appendChild(notification);
            setTimeout(() => notification.remove(), 3000);
        }
    </script>
</body>
</html>
