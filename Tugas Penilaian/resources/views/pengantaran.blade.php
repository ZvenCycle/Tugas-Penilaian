<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Pengantaran - FoodMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
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

        /* Navbar - Konsisten dengan halaman lain */
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

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        .loading-overlay.hidden {
            opacity: 0;
            visibility: hidden;
            display: none !important;
        }

        .loading-content {
            text-align: center;
            color: white;
        }

        .loading-logo {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: bounceIn 1.5s ease-out;
        }

        .loading-text {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            margin: 0 auto;
            animation: spin 1s linear infinite;
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3) rotate(-10deg);
            }
            50% {
                opacity: 1;
                transform: scale(1.05) rotate(5deg);
            }
            70% {
                transform: scale(0.9) rotate(-2deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Main Container */
        .main-container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .tracking-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 2rem;
            align-items: start;
        }

        /* Order Info Section */
        .order-info {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            border-radius: 25px;
            padding: 2.5rem;
            box-shadow: 
                20px 20px 60px #d1d1d1,
                -20px -20px 60px #ffffff;
            animation: slideInLeft 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .order-info::before {
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

        .order-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .order-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .order-title h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 0.3rem;
        }

        .order-id {
            font-size: 0.9rem;
            color: #636e72;
        }

        /* Driver Info */
        .driver-info {
            background: rgba(255,255,255,0.8);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(108,92,231,0.1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .driver-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(45deg, #6c5ce7, #a363d9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            box-shadow: 0 10px 20px rgba(108, 92, 231, 0.3);
            position: relative;
            overflow: hidden;
        }

        .driver-avatar::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shine 2s infinite;
        }

        @keyframes shine {
            to {
                left: 100%;
            }
        }

        .driver-details h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2d3436;
        }

        .driver-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .driver-rating i {
            color: #fdcb6e;
        }

        .driver-vehicle {
            font-size: 0.9rem;
            color: #636e72;
        }

        /* Delivery Info */
        .delivery-info {
            margin-bottom: 2rem;
        }

        .info-card {
            background: rgba(255,255,255,0.8);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(108,92,231,0.1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .info-card h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2d3436;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-card h3 i {
            color: #6c5ce7;
        }

        .info-detail {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.8rem;
        }

        .info-label {
            font-size: 0.9rem;
            color: #636e72;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3436;
        }

        .highlight {
            color: #6c5ce7;
        }

        /* Tracking Map */
        .tracking-map-container {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            border-radius: 25px;
            padding: 2.5rem;
            box-shadow: 
                20px 20px 60px #d1d1d1,
                -20px -20px 60px #ffffff;
            animation: slideInRight 0.8s ease-out;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .map-header {
            margin-bottom: 1.5rem;
        }

        .map-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 0.5rem;
        }

        .map-header p {
            color: #636e72;
            font-size: 0.9rem;
        }

        #map {
            width: 100%;
            height: 400px;
            border-radius: 20px;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        /* Map Controls */
        .map-controls {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .map-control-btn {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            color: #2d3436;
        }

        .map-control-btn:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        /* Driver Marker */
        .driver-marker, .restaurant-marker, .destination-marker {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            position: relative;
        }

        .driver-marker i, .restaurant-marker i, .destination-marker i {
            font-size: 20px;
            z-index: 2;
            color: white;
            background: #6c5ce7;
            padding: 8px;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .restaurant-marker i {
            background: #6c5ce7;
        }

        .destination-marker i {
            background: #00b894;
        }

        .driver-pulse {
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(108, 92, 231, 0.3);
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.5);
                opacity: 1;
            }
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        /* Tracking Progress */
        .tracking-progress {
            margin-top: 1.5rem;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .progress-header h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2d3436;
        }

        .estimated-time {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .progress-steps {
            position: relative;
            padding-left: 30px;
        }

        .progress-line {
            position: absolute;
            left: 10px;
            top: 0;
            width: 2px;
            height: 100%;
            background: #dfe6e9;
            z-index: 1;
        }

        .progress-line-active {
            position: absolute;
            left: 10px;
            top: 0;
            width: 2px;
            height: 50%;
            background: #6c5ce7;
            z-index: 2;
            transition: height 0.5s ease;
        }

        .step {
            position: relative;
            padding-bottom: 2rem;
            z-index: 3;
        }

        .step:last-child {
            padding-bottom: 0;
        }

        .step-icon {
            position: absolute;
            left: -30px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            border: 2px solid #dfe6e9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            color: #636e72;
            z-index: 4;
        }

        .step.active .step-icon {
            background: #6c5ce7;
            border-color: #6c5ce7;
            color: white;
            box-shadow: 0 0 0 5px rgba(108, 92, 231, 0.2);
        }

        .step.completed .step-icon {
            background: #6c5ce7;
            border-color: #6c5ce7;
            color: white;
        }

        .step-content {
            padding-left: 1rem;
        }

        .step-title {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3436;
            margin-bottom: 0.3rem;
        }

        .step.active .step-title {
            color: #6c5ce7;
        }

        .step-time {
            font-size: 0.8rem;
            color: #636e72;
        }

        /* Contact Driver Button */
        .contact-driver {
            margin-top: 2rem;
            text-align: center;
        }

        .contact-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .contact-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .pulse {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #00b894;
            box-shadow: 0 0 0 rgba(0, 184, 148, 0.4);
            animation: pulse 2s infinite;
            margin-right: 0.5rem;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 184, 148, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(0, 184, 148, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(0, 184, 148, 0);
            }
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
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

        /* Responsive */
        @media (max-width: 992px) {
            .tracking-wrapper {
                grid-template-columns: 1fr;
            }

            .order-info, .tracking-map-container {
                padding: 2rem;
            }

            #map {
                height: 350px;
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 0 1rem;
                margin: 2rem auto;
            }

            .order-info, .tracking-map-container {
                padding: 1.5rem;
            }

            .driver-info {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .driver-avatar {
                margin: 0 auto;
            }

            #map {
                height: 300px;
            }

            .order-header {
                flex-direction: column;
                text-align: center;
            }

            .order-icon {
                margin: 0 auto;
            }
        }
        /* Notifikasi Makanan Tiba */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(to right, #00b894, #00cec9);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            z-index: 1000;
            transform: translateX(150%);
            transition: transform 0.5s ease;
            max-width: 350px;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification-icon {
            font-size: 24px;
            margin-right: 15px;
        }
        
        .notification-content {
            flex: 1;
        }
        
        .notification-title {
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .notification-message {
            font-size: 14px;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-logo">🍽️</div>
            <div class="loading-text">FoodMarket</div>
            <div class="loading-spinner"></div>
        </div>
    </div>

    <!-- Navbar -->
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
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/promo">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ai">AI Assistant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/beli">Beli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pengantaran">Pengantaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <div class="tracking-wrapper">
            <!-- Order Info Section -->
            <div class="order-info">
                <div class="order-header">
                    <div class="order-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="order-title">
                        <h2>Pesanan Anda</h2>
                        <div class="order-id">ID: #FM78945612</div>
                    </div>
                </div>

                <!-- Driver Info -->
                <div class="driver-info">
                    <div class="driver-avatar">B</div>
                    <div class="driver-details">
                        <h3>Budi Santoso</h3>
                        <div class="driver-rating">
                            <i class="fas fa-star"></i>
                            <span>4.8</span>
                            <span class="text-muted">(120 trips)</span>
                        </div>
                        <div class="driver-vehicle">
                            <i class="fas fa-motorcycle me-1"></i> Honda Beat - B 1234 XYZ
                        </div>
                    </div>
                </div>

                <!-- Delivery Info -->
                <div class="delivery-info">
                    <div class="info-card">
                        <h3><i class="fas fa-map-marker-alt"></i> Lokasi</h3>
                        <div class="info-detail">
            <span class="info-label">Dari</span>
            <span class="info-value">FoodMarket, Jl. Pulau Biak 2 No. 61, Denpasar</span>
        </div>
        <div class="info-detail">
            <span class="info-label">Ke</span>
            <span class="info-value">SMK TI Bali Global Badung, Dalung, Kuta Utara</span>
        </div>
                    </div>

                    <div class="info-card">
                        <h3><i class="fas fa-route"></i> Detail Pengantaran</h3>
                        <div class="info-detail">
                            <span class="info-label">Jarak</span>
                            <span class="info-value highlight" id="distance">3.5 km</span>
                        </div>
                        <div class="info-detail">
                            <span class="info-label">Estimasi Waktu</span>
                            <span class="info-value highlight" id="eta">15 menit</span>
                        </div>
                        <div class="info-detail">
                            <span class="info-label">Status</span>
                            <span class="info-value">Sedang Diantar</span>
                        </div>
                    </div>

                    <div class="info-card">
                        <h3><i class="fas fa-box"></i> Pesanan</h3>
                        <div class="info-detail">
                            <span class="info-label">Dimsum Platter</span>
                            <span class="info-value">Rp 45.000</span>
                        </div>
                        <div class="info-detail">
                            <span class="info-label"></span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-detail">
                            <span class="info-label">Biaya Pengantaran</span>
                            <span class="info-value">Rp 0</span>
                        </div>
                        <div class="info-detail" style="margin-top: 1rem; padding-top: 1rem; border-top: 1px dashed #dfe6e9;">
                            <span class="info-label"><strong>Total</strong></span>
                            <span class="info-value" style="font-size: 1.2rem; color: #6c5ce7;"><strong>Rp 45.000</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Contact Driver -->
                <div class="contact-driver">
                    <button class="contact-btn">
                        <span class="pulse"></span>
                        <i class="fas fa-phone-alt me-2"></i> Hubungi Driver
                    </button>
                </div>
            </div>

            <!-- Tracking Map -->
            <div class="tracking-map-container">
                <div class="map-header">
                    <h2>Tracking Pengantaran</h2>
                    <p>Pantau lokasi driver dan estimasi waktu tiba secara real-time</p>
                </div>

                <div id="map"></div>

                <!-- Map Controls -->
                <div class="map-controls">
                    <button class="map-control-btn" id="zoomIn">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button class="map-control-btn" id="zoomOut">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button class="map-control-btn" id="recenter">
                        <i class="fas fa-location-arrow"></i>
                    </button>
                </div>

                <!-- Tracking Progress -->
                <div class="tracking-progress">
                    <div class="progress-header">
                        <h3>Status Pengantaran</h3>
                        <div class="estimated-time">
                            <i class="fas fa-clock me-1"></i> Tiba dalam <span id="remainingTime">15</span> menit
                        </div>
                    </div>

                    <div class="progress-steps">
                        <div class="progress-line"></div>
                        <div class="progress-line-active"></div>

                        <div class="step completed">
                            <div class="step-icon"><i class="fas fa-check"></i></div>
                            <div class="step-content">
                                <div class="step-title">Pesanan Diterima</div>
                                <div class="step-time">14:30 WIB</div>
                            </div>
                        </div>

                        <div class="step completed">
                            <div class="step-icon"><i class="fas fa-check"></i></div>
                            <div class="step-content">
                                <div class="step-title">Pesanan Diproses</div>
                                <div class="step-time">14:35 WIB</div>
                            </div>
                        </div>

                        <div class="step active">
                            <div class="step-icon"><i class="fas fa-motorcycle"></i></div>
                            <div class="step-content">
                                <div class="step-title">Sedang Diantar</div>
                                <div class="step-time">14:45 WIB</div>
                            </div>
                        </div>

                        <div class="step">
                            <div class="step-icon"><i class="fas fa-home"></i></div>
                            <div class="step-content">
                                <div class="step-title">Pesanan Tiba</div>
                                <div class="step-time">Estimasi 15:00 WIB</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Notifikasi Makanan Tiba -->
    <div class="notification" id="foodArrivalNotification">
        <div class="notification-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="notification-content">
            <div class="notification-title">Makanan Telah Tiba!</div>
            <div class="notification-message">Pesanan Anda telah sampai di lokasi tujuan.</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Loading Overlay
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loadingOverlay').classList.add('hidden');
                initMap();
            }, 2000);
        });

        function initMap() {
            // Koordinat restoran (titik awal)
            const restaurantCoords = [-8.665, 115.208]; // Jl. Pulau Biak 2 No. 61, Denpasar, Bali
            
            // Koordinat tujuan
            const destinationCoords = [-8.610877, 115.172717]; // SMK TI Bali Global Badung, Dalung
            
            // Koordinat awal driver (di dekat restoran)
            const driverCoords = [-8.665, 115.208];
            
            // Inisialisasi peta dengan Leaflet
            const map = L.map('map').setView(driverCoords, 14);
            
            // Tambahkan layer OpenStreetMap (gratis, tanpa API key)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);
            
            // Buat ikon kustom untuk driver
            const driverIcon = L.divIcon({
                className: 'driver-marker',
                html: '<div class="driver-pulse"></div><i class="fas fa-motorcycle"></i>',
                iconSize: [40, 40],
                iconAnchor: [20, 20]
            });
            
            // Tambahkan marker restoran
            const restaurantMarker = L.marker(restaurantCoords, {
                icon: L.divIcon({
                    className: 'restaurant-marker',
                    html: '<i class="fas fa-store" style="color: #6c5ce7;"></i>',
                    iconSize: [30, 30],
                    iconAnchor: [15, 15]
                })
            }).addTo(map);
            restaurantMarker.bindPopup('<h3>FoodMarket</h3><p>Jl. Pulau Biak 2 No. 61, Denpasar</p>');
            
            // Tambahkan marker tujuan
            const destinationMarker = L.marker(destinationCoords, {
                icon: L.divIcon({
                    className: 'destination-marker',
                    html: '<i class="fas fa-home" style="color: #00b894;"></i>',
                    iconSize: [30, 30],
                    iconAnchor: [15, 15]
                })
            }).addTo(map);
            destinationMarker.bindPopup('<h3>Lokasi Anda</h3><p>SMK TI Bali Global Badung, Dalung</p>');
            
            // Tambahkan marker driver
            const driverMarker = L.marker(driverCoords, { icon: driverIcon }).addTo(map);
            driverMarker.bindPopup('<h3>Budi Santoso</h3><p>Driver Anda</p>');
            
            // Tambahkan rute dari restoran ke tujuan
            const routePoints = [
                restaurantCoords,
                [restaurantCoords[0] + 0.005, restaurantCoords[1] + 0.01],
                [restaurantCoords[0] + 0.01, restaurantCoords[1] + 0.015],
                [destinationCoords[0] - 0.005, destinationCoords[1] - 0.01],
                destinationCoords
            ];
            
            // Rute keseluruhan
            const routeLine = L.polyline(routePoints, {
                color: '#6c5ce7',
                weight: 6,
                opacity: 0.8
            }).addTo(map);
            
            // Rute yang sudah dilalui (awalnya hanya titik awal)
            const traveledRoute = L.polyline([restaurantCoords], {
                color: '#00b894',
                weight: 6,
                opacity: 0.8
            }).addTo(map);
            
            // Tombol zoom in
            document.getElementById('zoomIn').addEventListener('click', function() {
                map.zoomIn();
            });
            
            // Tombol zoom out
            document.getElementById('zoomOut').addEventListener('click', function() {
                map.zoomOut();
            });
            
            // Tombol recenter
            document.getElementById('recenter').addEventListener('click', function() {
                map.setView(driverMarker.getLatLng(), 15);
            });
            
            // Simulasi pergerakan driver
            simulateDriverMovement(map, driverMarker, traveledRoute, routePoints);
        }

        // Fungsi untuk simulasi pergerakan driver
        function simulateDriverMovement(map, driverMarker, traveledRoute, routePoints) {
            let currentPointIndex = 0;
            let progress = 0;
            let traveledPoints = [routePoints[0]];
            
            // Update posisi driver setiap 1 detik
            const interval = setInterval(() => {
                if (currentPointIndex >= routePoints.length - 1) {
                    clearInterval(interval);
                    
                    // Tampilkan notifikasi ketika makanan tiba
                    const notification = document.getElementById('foodArrivalNotification');
                    notification.classList.add('show');
                    
                    // Update status pengiriman
                    document.getElementById('status').textContent = 'Terkirim';
                    document.getElementById('status').style.color = '#00b894';
                    
                    // Hapus notifikasi setelah 10 detik
                    setTimeout(() => {
                        notification.classList.remove('show');
                    }, 10000);
                    
                    return;
                }
                
                // Titik saat ini dan titik berikutnya
                const currentPoint = routePoints[currentPointIndex];
                const nextPoint = routePoints[currentPointIndex + 1];
                
                // Hitung posisi interpolasi antara dua titik
                progress += 0.05;
                if (progress >= 1) {
                    currentPointIndex++;
                    progress = 0;
                    traveledPoints.push(routePoints[currentPointIndex]);
                    
                    // Update rute yang sudah dilalui
                    traveledRoute.setLatLngs(traveledPoints);
                    
                    if (currentPointIndex >= routePoints.length - 1) {
                        clearInterval(interval);
                        return;
                    }
                }
                
                // Interpolasi posisi
                const lat = currentPoint[0] + (nextPoint[0] - currentPoint[0]) * progress;
                const lng = currentPoint[1] + (nextPoint[1] - currentPoint[1]) * progress;
                
                // Update posisi marker driver
                driverMarker.setLatLng([lat, lng]);
                
                // Update jarak dan waktu
                updateDistanceAndTime(currentPointIndex, progress, routePoints.length);
                
            }, 1000);
        }

        // Update jarak dan waktu
        function updateDistanceAndTime(pointIndex, progress, totalPoints) {
            // Hitung persentase perjalanan yang sudah ditempuh
            const totalProgress = (pointIndex + progress) / (totalPoints - 1);
            
            // Jarak awal dan akhir (km)
            const initialDistance = 3.5;
            const remainingDistance = initialDistance * (1 - totalProgress);
            
            // Waktu awal dan akhir (menit)
            const initialTime = 15;
            const remainingTime = Math.max(1, Math.round(initialTime * (1 - totalProgress)));
            
            // Update tampilan
            document.getElementById('distance').textContent = remainingDistance.toFixed(1) + ' km';
            document.getElementById('eta').textContent = remainingTime + ' menit';
            document.getElementById('remainingTime').textContent = remainingTime;
            
            // Update progress line
            const progressLineActive = document.querySelector('.progress-line-active');
            const progressPercentage = Math.min(75, 25 + (totalProgress * 50));
            progressLineActive.style.height = `${progressPercentage}%`;
        }

        // Tombol hubungi driver
        document.querySelector('.contact-btn').addEventListener('click', function() {
            alert('Menghubungi driver: Budi Santoso (0812-3456-7890)');
        });
        
        // Load data pesanan dari localStorage
        const orderId = localStorage.getItem('currentOrderId');
        const orderData = localStorage.getItem('currentOrderData');
        
        if (orderId && orderData) {
            try {
                const data = JSON.parse(orderData);
                // Update tampilan dengan data dari localStorage
                if (data.order_id) {
                    document.querySelector('.order-id').textContent = `ID: ${data.order_id}`;
                }
                console.log('Order data loaded:', data);
            } catch (error) {
                console.error('Error parsing order data:', error);
            }
        }
    </script>
    
</body>
</html>