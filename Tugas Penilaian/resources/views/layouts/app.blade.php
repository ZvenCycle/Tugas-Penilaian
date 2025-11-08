<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Shopee')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f5f5f5; }
        .navbar { background: #ff5722; }
        .navbar a { color: white !important; }
        .product-card { transition: 0.3s; }
        .product-card:hover { transform: scale(1.05); }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">ShopeeKu</a>
            <form class="d-flex ms-auto" action="/search" method="GET">
                <input class="form-control me-2" type="search" name="q" placeholder="Cari Produk...">
                <button class="btn btn-dark" type="submit">Cari</button>
            </form>
            <a href="/cart" class="btn btn-warning ms-3">🛒 Keranjang</a>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <div class="container my-4">
        @yield('content')
    </div>

    <footer class="text-center p-3 bg-dark text-white mt-5">
        &copy; 2025 ShopeeKu - Dibuat dengan Laravel
    </footer>
</body>
</html>
