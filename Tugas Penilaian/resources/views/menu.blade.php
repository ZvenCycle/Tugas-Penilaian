<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menu - FoodMarket</title>
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

        .navbar-brand {
            font-weight: 700;
            color: #fff !important;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            margin: 0 0.25rem;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .nav-link:hover::before {
            transform: translateX(0);
        }

        .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: #fff !important;
            font-weight: 600;
        }

        .menu-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 6rem 0;
            text-align: center;
            border-radius: 0 0 3rem 3rem;
            margin-bottom: 4rem;
            position: relative;
            overflow: hidden;
        }

        .menu-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5') center/cover;
            opacity: 0.1;
        }

        .menu-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            position: relative;
        }

        .menu-description {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
            position: relative;
        }

        .menu-category {
            margin-bottom: 6rem;
            position: relative;
            padding: 2rem;
            background: white;
            border-radius: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .category-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }

        .category-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            padding: 1rem;
        }

        .menu-item {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
        }

        .menu-item:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 15px 35px rgba(108, 92, 231, 0.15);
        }

        .menu-item-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .menu-item:hover .menu-item-image {
            transform: scale(1.1);
        }

        .menu-item-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--accent);
            color: var(--text-dark);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(255, 217, 61, 0.3);
        }

        .menu-item-content {
            padding: 2rem;
        }

        .menu-item-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .menu-item-description {
            color: var(--text-light);
            font-size: 1rem;
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .menu-item-price {
            font-size: 1.5rem;
            color: var(--primary);
            font-weight: 800;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .menu-item-price small {
            font-size: 1rem;
            color: var(--text-light);
            text-decoration: line-through;
            font-weight: 500;
        }

        .btn-order {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 3rem;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .btn-order::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-order:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(108, 92, 231, 0.3);
        }

        .btn-order:hover::before {
            opacity: 1;
        }

        .btn-order span {
            position: relative;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .menu-title {
                font-size: 2.5rem;
            }
            .menu-description {
                font-size: 1.1rem;
                padding: 0 1.5rem;
            }
            .category-title {
                font-size: 2rem;
            }
            .menu-item-content {
                padding: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .menu-header {
                padding: 4rem 0;
            }
            .menu-title {
                font-size: 2rem;
            }
            .menu-grid {
                grid-template-columns: 1fr;
            }
        }
        a{
            color: white;
            text-decoration: none;
        }
            /* CSS untuk tombol favorite */
            .btn-favorite {
                background: transparent;
                border: 2px solid #e74c3c;
                color: #e74c3c;
                width: 45px;
                height: 45px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                cursor: pointer;
                font-size: 1.2rem;
            }
            
            .btn-favorite:hover {
                background: #e74c3c;
                color: white;
                transform: scale(1.1);
            }
            
            .btn-favorite.favorited {
                background: #e74c3c;
                color: white;
                border-color: #e74c3c;
            }
            
            .btn-favorite.favorited:hover {
                background: #c0392b;
                border-color: #c0392b;
                transform: scale(1.1);
            }
    .btn-favorite.active {
        background: #e74c3c;
        color: white;
        border-color: #e74c3c;
    }
    
    .btn-favorite.active:hover {
        background: #c0392b;
        border-color: #c0392b;
    }
    
    .menu-item-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    
    .btn-order {
        flex: 1;
    }
    
    /* Notification styles */
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        padding: 15px 20px;
        border-radius: 8px;
        color: white;
        font-weight: 500;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transform: translateX(400px);
        transition: transform 0.3s ease;
    }
    
    .notification.show {
        transform: translateX(0);
    }
    
    .notification.success {
        background: linear-gradient(135deg, #27ae60, #2ecc71);
    }
    
    .notification.info {
        background: linear-gradient(135deg, #3498db, #5dade2);
    }
    
    .notification.error {
        background: linear-gradient(135deg, #e74c3c, #ec7063);
    }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <div class="flex items-center">
                <a class="navbar-brand" href="/">FoodMarket</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/menu">Menu</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/my-favorites">Favorit</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="/ai">AI Assistant</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Menu Header -->
    <header class="menu-header">
        <div class="container">
            <h1 class="menu-title">Jelajahi Menu Kami</h1>
            <p class="menu-description">Temukan berbagai pilihan hidangan lezat yang kami sajikan dengan cinta. Dari makanan pembuka yang menggugah selera hingga hidangan utama yang memuaskan dan dessert yang memanjakan.</p>
        </div>
    </header>

    <!-- Menu Content -->
    <div class="container">
        <!-- Makanan Pembuka -->
        <section class="menu-category">
            <h2 class="category-title">Makanan Pembuka</h2>
            <div class="menu-grid">
               <div class="menu-item">
    <div class="menu-item-badge">Bestseller</div>
    <img src="https://images.unsplash.com/photo-1541014741259-de529411b96a" class="menu-item-image" alt="Spring Roll">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Spring Roll Special</h3>
        <p class="menu-item-description">Lumpia crispy berisi sayuran segar, daging ayam cincang, dan udang, disajikan dengan saus asam manis spesial.</p>
        <div class="menu-item-price">
            <small>Rp 30.000</small>
            Rp 25.000
        </div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Spring Roll Special', 25000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(1)" data-menu-id="1" id="fav-btn-1">
                <i class="far fa-heart"></i>
            </button>
        </div>
    </div>
</div>

<div class="menu-item">
    <img src="https://awsimages.detik.net.id/community/media/visual/2021/12/11/5-rekomendasi-dimsum-di-depok-yang-enak-dan-murah-buat-ngemil-3_43.png?w=600&q=90" class="menu-item-image" alt="Dimsum">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Dimsum Platter</h3>
        <p class="menu-item-description">Kombinasi dimsum premium dengan berbagai isian, disajikan dengan saus special dan sambal XO.</p>
        <div class="menu-item-price">Rp 45.000</div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Dimsum Platter', 45000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(2)" data-menu-id="2" id="fav-btn-2">
                <i class="far fa-heart"></i>
            </button>
        </div>
    </div>
</div>

<div class="menu-item">
    <div class="menu-item-badge">New</div>
    <img src="https://images.unsplash.com/photo-1529042410759-befb1204b468" class="menu-item-image" alt="Bruschetta">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Bruschetta Caprese</h3>
        <p class="menu-item-description">Roti Italia panggang dengan topping tomat cherry, mozzarella, daun basil segar, dan balsamico glaze.</p>
        <div class="menu-item-price">Rp 35.000</div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Bruschetta Caprese', 35000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(3)" data-menu-id="3" id="fav-btn-3">
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>
</div>

<!-- Hidangan Utama -->
<div class="menu-item">
    <div class="menu-item-badge">Chef's Choice</div>
    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" class="menu-item-image" alt="Nasi Goreng Spesial">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Nasi Goreng Spesial</h3>
        <p class="menu-item-description">Nasi goreng dengan bumbu rahasia, dilengkapi dengan ayam panggang, udang, telur mata sapi, dan kerupuk udang.</p>
        <div class="menu-item-price">
            <small>Rp 55.000</small>
            Rp 45.000
        </div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Nasi Goreng Spesial', 45000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(4)" data-menu-id="4" id="fav-btn-4">
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>
</div>

<div class="menu-item">
    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" class="menu-item-image" alt="Salmon Steak">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Grilled Salmon Steak</h3>
        <p class="menu-item-description">Salmon segar panggang dengan saus lemon butter, disajikan dengan sayuran organik dan kentang wedges.</p>
        <div class="menu-item-price">Rp 125.000</div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Grilled Salmon Steak', 125000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(5)" data-menu-id="5" id="fav-btn-5">
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>
</div>

<div class="menu-item">
    <div class="menu-item-badge">Spicy</div>
    <img src="https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd" class="menu-item-image" alt="Pasta Arrabbiata">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Pasta Arrabbiata</h3>
        <p class="menu-item-description">Pasta penne dengan saus tomat pedas, bawang putih, cabai, dan daun basil segar, ditaburi parmesan.</p>
        <div class="menu-item-price">Rp 85.000</div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Pasta Arrabbiata', 85000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(6)" data-menu-id="6" id="fav-btn-6">
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>
</div>

<!-- Dessert -->
<div class="menu-item">
    <div class="menu-item-badge">Popular</div>
    <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307" class="menu-item-image" alt="Es Krim Sundae">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Ultimate Sundae</h3>
        <p class="menu-item-description">Es krim premium 3 rasa dengan topping buah segar, kacang, saus cokelat, dan whipped cream.</p>
        <div class="menu-item-price">
            <small>Rp 45.000</small>
            Rp 35.000
        </div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Ultimate Sundae', 35000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(7)" data-menu-id="7" id="fav-btn-7">
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>
</div>

<div class="menu-item">
    <img src="https://images.unsplash.com/photo-1587314168485-3236d6710814" class="menu-item-image" alt="Molten Chocolate Cake">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Molten Chocolate Cake</h3>
        <p class="menu-item-description">Kue cokelat hangat dengan lelehan cokelat di dalamnya, disajikan dengan es krim vanilla.</p>
        <div class="menu-item-price">Rp 55.000</div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Molten Chocolate Cake', 55000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(8)" data-menu-id="8" id="fav-btn-8">
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>
</div>

<div class="menu-item">
    <div class="menu-item-badge">Signature</div>
    <img src="https://images.unsplash.com/photo-1612203985729-70726954388c" class="menu-item-image" alt="Crème Brûlée">
    <div class="menu-item-content">
        <h3 class="menu-item-title">Classic Crème Brûlée</h3>
        <p class="menu-item-description">Custard vanilla lembut dengan lapisan gula karamel renyah, dihias dengan berry segar.</p>
        <div class="menu-item-price">Rp 65.000</div>
        <div class="menu-item-actions">
            <button class="btn-order" onclick="orderNow('Classic Crème Brûlée', 65000)">
                <span>Pesan Sekarang</span>
            </button>
            <button class="btn-favorite" onclick="toggleFavorite(9)" data-menu-id="9" id="fav-btn-9">
                <i class="fas fa-heart"></i>
            </button>
        </div>
    </div>
</div

       

    <!-- Order Modal - HAPUS SELURUH MODAL INI -->
    <!-- Modal tidak diperlukan lagi karena langsung ke halaman beli -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // CSRF Token untuk semua request AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Load favorite status saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        loadFavoriteStatus();
    });
    
    // Fungsi untuk memuat status favorite dari database
    function loadFavoriteStatus() {
        const favoriteButtons = document.querySelectorAll('.btn-favorite');
        
        favoriteButtons.forEach(button => {
            const menuId = button.getAttribute('data-menu-id');
            
            fetch(`/favorites/check/${menuId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.is_favorite) {
                    button.classList.add('favorited');
                    button.innerHTML = '<i class="fas fa-heart"></i>';
                } else {
                    button.classList.remove('favorited');
                    button.innerHTML = '<i class="far fa-heart"></i>';
                }
            })
            .catch(error => {
                console.error('Error loading favorite status:', error);
            });
        });
    }
    
    // Update fungsi toggle favorite
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
                button.classList.add('favorited');
                button.innerHTML = '<i class="fas fa-heart"></i>';
                showNotification(data.message, 'success');
            } else {
                button.classList.remove('favorited');
                button.innerHTML = '<i class="far fa-heart"></i>';
                showNotification(data.message, 'info');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Terjadi kesalahan', 'error');
        });
    }
    
    // Fungsi orderNow tetap sama
    function orderNow(menuName, price) {
        const orderData = {
            name: menuName,
            price: price,
            quantity: 1,
            timestamp: new Date().toISOString()
        };
        
        localStorage.setItem('selectedMenu', JSON.stringify(orderData));
        window.location.href = '/beli';
    }
    
    // Fungsi notifikasi tetap sama
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'}`;
        notification.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            <strong>${message}</strong>
            <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 3000);
    }
</script>
</script>

</body>
</html>