<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Sekarang - FoodMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: #2d3436;
        }

        /* Navbar - Consistent with other pages */
        .navbar {
            background: linear-gradient(to right, #6c5ce7, #a363d9);
            padding: 1rem 0;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: #fff !important;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            transition: all 0.3s ease;
            border-radius: 0.375rem;
            margin: 0 0.25rem;
        }
        
        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff !important;
        }
        
        .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: #fff !important;
        }
        
        .navbar-toggler {
            border-color: rgba(255,255,255,0.5);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .purchase-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        /* Product Showcase */
        .product-showcase {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 
                20px 20px 60px #d1d1d1,
                -20px -20px 60px #ffffff;
            animation: slideInLeft 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .product-showcase::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(108,92,231,0.05), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
        }

        .product-image-container {
            position: relative;
            width: 100%;
            height: 350px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
        }

        .product-image-container::before {
            content: '🍣';
            font-size: 5rem;
            animation: float 3s ease-in-out infinite;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
        }

        .product-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(45deg, #ff6b6b, #ffa500);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .product-details h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #6c5ce7, #a363d9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-price {
            font-size: 2.2rem;
            font-weight: 800;
            color: #00b894;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .original-price {
            font-size: 1.5rem;
            color: #636e72;
            text-decoration: line-through;
            font-weight: 400;
        }

        .discount-badge {
            background: linear-gradient(45deg, #e17055, #fdcb6e);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .product-description {
            color: #636e72;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .product-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .product-features li {
            padding: 0.8rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 500;
            color: #2d3436;
        }

        .product-features li::before {
            content: '✨';
            font-size: 1.2rem;
        }

        /* Order Form */
        .order-form-container {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 
                20px 20px 60px #d1d1d1,
                -20px -20px 60px #ffffff;
            animation: slideInRight 0.8s ease-out;
            position: relative;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .form-header h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #636e72;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: #2d3436;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 1.2rem 1.5rem;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #6c5ce7;
            box-shadow: 0 0 0 4px rgba(108, 92, 231, 0.1);
            transform: translateY(-2px);
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 1rem;
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 15px;
        }

        .quantity-btn {
            width: 50px;
            height: 50px;
            border: none;
            background: linear-gradient(45deg, #6c5ce7, #a363d9);
            color: white;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
        }

        .quantity-display {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d3436;
            min-width: 60px;
            text-align: center;
            background: white;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
        }

        /* Order Summary */
        .order-summary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .order-summary::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            animation: shimmer 2s infinite;
        }

        .summary-header {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .summary-total {
            border-top: 2px solid rgba(255,255,255,0.3);
            padding-top: 1rem;
            margin-top: 1.5rem;
            font-size: 1.3rem;
            font-weight: 700;
        }

        /* Buttons */
        .btn-elegant {
            width: 100%;
            padding: 1.2rem 2rem;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-elegant {
            background: linear-gradient(45deg, #6c5ce7, #a363d9);
            color: white;
            box-shadow: 0 10px 30px rgba(108, 92, 231, 0.3);
        }

        .btn-primary-elegant:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(108, 92, 231, 0.4);
        }

        .btn-secondary-elegant {
            background: transparent;
            color: #6c5ce7;
            border: 2px solid #6c5ce7;
        }

        .btn-secondary-elegant:hover {
            background: #6c5ce7;
            color: white;
            transform: translateY(-2px);
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }

        /* Success Modal */
        .success-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .success-content {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            padding: 3rem;
            border-radius: 25px;
            text-align: center;
            animation: modalZoom 0.5s ease-out;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            max-width: 400px;
            margin: 0 2rem;
        }

        @keyframes modalZoom {
            from {
                opacity: 0;
                transform: scale(0.3);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .success-icon {
            font-size: 4rem;
            color: #00b894;
            margin-bottom: 1rem;
            animation: bounce 1s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .purchase-wrapper {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .main-container {
                margin: 2rem auto;
                padding: 0 1rem;
            }

            .product-showcase,
            .order-form-container {
                padding: 2rem;
            }

            .product-image-container {
                height: 280px;
            }

            .product-details h2 {
                font-size: 2rem;
            }

            .quantity-selector {
                gap: 1rem;
            }
        }

        @media (max-width: 576px) {
            .product-showcase,
            .order-form-container {
                padding: 1.5rem;
            }

            .product-image-container {
                height: 220px;
            }

            .product-details h2 {
                font-size: 1.8rem;
            }

            .product-price {
                font-size: 1.8rem;
            }

            .form-header h3 {
                font-size: 1.5rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-utensils me-2"></i>FoodMarket
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="/promo">Promo</a></li>
                    <li class="nav-item"><a class="nav-link" href="/ai">AI Assistant</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/beli">Beli</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <div class="purchase-wrapper">
            <!-- Product Showcase -->
            <div class="product-showcase">
                <div class="product-image-container">
                    <div class="product-badge">🔥 Best Seller</div>
                </div>
                <div class="product-details">
                    <h2>Dimsum Platter</h2>
                    <div class="product-price">
                        <span>Rp 45.000</span>
                        <span class="original-price">Rp 60.000</span>
                        <span class="discount-badge">25% OFF</span>
                    </div>
                    <p class="product-description">
                        Dimsum Platter dengan isian daging ayam, udang, dan sayuran segar. Dikukus dengan teknik tradisional hingga menghasilkan cita rasa otentik Asia.
                    </p>
                    <ul class="product-features">
                        <li>Daging ayam dan udang segar pilihan</li>
                        <li>Sayuran hijau berkualitas premium</li>
                        <li>Kulit dimsum tipis yang lembut dan kenyal</li>
                        <li>Bumbu rempah khas Asia dengan resep rahasia</li>
                        <li>Dikukus dengan teknik tradisional</li>
                        <li>Disajikan hangat dengan saus cocolan spesial</li>
                    </ul>
                </div>
            </div>

            <!-- Order Form -->
            <div class="order-form-container">
                <div class="form-header">
                    <h3><i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang</h3>
                    <p>Lengkapi data di bawah untuk melanjutkan pemesanan</p>
                </div>
                
                <form id="orderForm" method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="customer_name"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                
                    <div class="form-group">
                        <label for="customer_phone"><i class="fas fa-phone me-2"></i>Nomor Telepon</label>
                        <input type="tel" id="customer_phone" name="customer_phone" class="form-control" placeholder="Contoh: 08123456789" required>
                    </div>
                
                    <div class="form-group">
                        <label for="customer_email"><i class="fas fa-envelope me-2"></i>Email</label>
                        <input type="email" id="customer_email" name="customer_email" class="form-control" placeholder="contoh@email.com" required>
                    </div>
                
                    <div class="form-group">
                        <label for="quantity"><i class="fas fa-sort-numeric-up me-2"></i>Jumlah Pesanan</label>
                        <div class="quantity-selector">
                            <button type="button" class="quantity-btn" onclick="decreaseQuantity()"><i class="fas fa-minus"></i></button>
                            <span class="quantity-display" id="quantityDisplay">1</span>
                            <button type="button" class="quantity-btn" onclick="increaseQuantity()"><i class="fas fa-plus"></i></button>
                            <input type="hidden" id="quantity" name="quantity" value="1">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="delivery_option"><i class="fas fa-truck me-2"></i>Opsi Pengiriman</label>
                        <select id="delivery_option" name="delivery_option" class="form-control" onchange="updateDeliveryFee()">
                            <option value="pickup">🏪 Ambil di Tempat (Gratis)</option>
                            <option value="delivery">🚚 Antar ke Rumah (+Rp 10.000)</option>
                        </select>
                    </div>
                
                    <!-- Hidden fields untuk data yang diperlukan -->
                    <input type="hidden" name="menu_item" value="Dimsum Platter">
                    <input type="hidden" id="price" name="price" value="45000">
                    <input type="hidden" id="total_amount" name="total_amount" value="45000">
                    
                    <div class="form-group" id="addressGroup" style="display: none;">
                        <label for="address"><i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap</label>
                        <textarea id="address" name="address" class="form-control" rows="3" placeholder="Contoh: Jl. Sudirman No. 123"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="notes"><i class="fas fa-sticky-note me-2"></i>Catatan Khusus (Opsional)</label>
                        <textarea id="notes" name="notes" class="form-control" rows="2" placeholder="Contoh: Tidak pedas, extra keju, tanpa bawang, dll."></textarea>
                    </div>

                    <!-- Ringkasan Pesanan -->
                    <div class="order-summary">
                        <div class="summary-header"><i class="fas fa-receipt me-2"></i>Ringkasan Pesanan</div>
                        <div class="summary-row">
                            <span><i class="fas fa-bowl-rice me-2"></i>Dimsum Platter</span>
                            <span id="itemPrice">Rp 45.000</span>
                        </div>
                        <div class="summary-row">
                            <span><i class="fas fa-times me-2"></i>Jumlah</span>
                            <span id="summaryQuantity">1</span>
                        </div>
                        <div class="summary-row">
                            <span><i class="fas fa-calculator me-2"></i>Subtotal</span>
                            <span id="subtotal">Rp 45.000</span>
                        </div>
                        <div class="summary-row">
                            <span><i class="fas fa-shipping-fast me-2"></i>Ongkos Kirim</span>
                            <span id="deliveryFee">Gratis</span>
                        </div>
                        <div class="summary-row summary-total">
                            <span><i class="fas fa-money-bill-wave me-2"></i>Total Pembayaran</span>
                            <span id="total">Rp 45.000</span>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn-elegant btn-primary-elegant" id="submitBtn">
                        <i class="fas fa-credit-card me-2"></i>Pesan Sekarang
                        <span class="loading" id="loadingSpinner" style="display: none;"></span>
                    </button>
                    <a href="/home" class="btn-elegant btn-secondary-elegant">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="success-modal" id="successModal">
        <div class="success-content">
            <div class="success-icon">✅</div>
            <h2>Pesanan Berhasil!</h2>
            <p>Terima kasih telah memesan. Tim kami akan segera memproses pesanan Anda.</p>
            <button class="btn-elegant btn-primary-elegant" onclick="closeSuccessModal()">
                <i class="fas fa-check me-2"></i>OK, Mengerti
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script>
let quantity = 1;
let basePrice = 45000;
let deliveryFee = 0;

function increaseQuantity() {
    quantity++;
    updateQuantityDisplay();
    updateOrderSummary();
}

function decreaseQuantity() {
    if (quantity > 1) {
        quantity--;
        updateQuantityDisplay();
        updateOrderSummary();
    }
}

function updateQuantityDisplay() {
    document.getElementById('quantityDisplay').textContent = quantity;
    document.getElementById('quantity').value = quantity;
    
    // Update hidden fields
    const subtotal = basePrice * quantity;
    const total = subtotal + deliveryFee;
    document.getElementById('price').value = basePrice;
    document.getElementById('total_amount').value = total;
}

function updateDeliveryFee() {
    const deliveryOption = document.getElementById('delivery_option').value;
    const addressGroup = document.getElementById('addressGroup');
    
    if (deliveryOption === 'delivery') {
        deliveryFee = 10000;
        addressGroup.style.display = 'block';
        document.getElementById('address').required = true;
    } else {
        deliveryFee = 0;
        addressGroup.style.display = 'none';
        document.getElementById('address').required = false;
    }
    updateOrderSummary();
    updateQuantityDisplay(); // Update total_amount
}

// Event submit form - HAPUS preventDefault() agar form benar-benar submit
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("orderForm");

    form.addEventListener("submit", function(e) {
        // JANGAN gunakan preventDefault() - biarkan form submit normal
        showLoading();
        
        // Update hidden fields sebelum submit
        updateQuantityDisplay();
    });
});
</script>
</body>
</html>