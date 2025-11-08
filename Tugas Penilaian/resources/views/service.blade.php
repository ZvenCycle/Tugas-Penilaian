<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan 24/7 - FoodMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #ff6b6b 0%, #4ecdc4 100%);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 900;
            font-size: 1.8rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link {
            font-weight: 600;
            color: #333 !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #ff6b6b !important;
        }

        /* Hero Section */
        .hero-section {
            padding: 120px 0 80px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 20px;
            text-shadow: 3px 3px 0px #333, 6px 6px 0px rgba(0,0,0,0.2);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        /* Content Section */
        .content-section {
            padding: 80px 0;
            background: white;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 60px;
            color: #333;
        }

        .service-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            background-clip: padding-box;
            position: relative;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #667eea, #764ba2);
            border-radius: 23px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .service-card:hover::before {
            opacity: 1;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .service-icon {
            font-size: 3rem;
            color: #ff6b6b;
            margin-bottom: 20px;
        }

        .service-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .service-description {
            color: #666;
            line-height: 1.8;
        }

        .time-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .time-slot {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #ff6b6b 0%, #4ecdc4 100%);
            color: white;
            border-radius: 15px;
            font-weight: 600;
        }

        .back-btn {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(255,107,107,0.4);
            margin-bottom: 40px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255,107,107,0.6);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .service-card {
                padding: 25px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">FoodMarket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('company.profile') }}">Profil Perusahaan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">🕐 LAYANAN 24/7</h1>
            <p class="hero-subtitle">Customer Support dan Delivery Service Sepanjang Waktu untuk Kepuasan Anda</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <a href="{{ route('company.profile') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Profil Perusahaan
            </a>

            <h2 class="section-title">Layanan Non-Stop FoodMarket</h2>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="service-title">Customer Support 24/7</h3>
                        <p class="service-description">
                            Tim customer service profesional siap membantu Anda kapan saja. Live chat, telepon, dan email 
                            support tersedia 24 jam sehari, 7 hari seminggu. Response time rata-rata kurang dari 2 menit 
                            untuk memastikan kepuasan pelanggan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3 class="service-title">Delivery 24 Jam</h3>
                        <p class="service-description">
                            Layanan antar makanan tersedia sepanjang waktu dengan armada delivery yang siap siaga. 
                            Sistem tracking real-time memungkinkan Anda memantau pesanan dari dapur hingga pintu rumah. 
                            Garansi ketepatan waktu dengan kompensasi jika terlambat.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="service-title">Mobile App Support</h3>
                        <p class="service-description">
                            Aplikasi mobile dengan notifikasi push real-time untuk update pesanan, promo eksklusif, 
                            dan customer service. Fitur offline mode memungkinkan browsing menu bahkan tanpa internet. 
                            One-click reorder untuk kemudahan pemesanan ulang.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3 class="service-title">Technical Support</h3>
                        <p class="service-description">
                            Tim IT support siap membantu troubleshooting aplikasi, website, dan sistem pembayaran. 
                            Remote assistance tersedia untuk panduan penggunaan fitur-fitur baru. 
                            Maintenance terjadwal di luar jam sibuk untuk meminimalkan gangguan layanan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="time-grid">
                <div class="time-slot">
                    <i class="fas fa-sun fa-2x mb-2"></i>
                    <h5>Pagi (06:00 - 12:00)</h5>
                    <p>Breakfast & Brunch Menu</p>
                </div>
                <div class="time-slot">
                    <i class="fas fa-cloud-sun fa-2x mb-2"></i>
                    <h5>Siang (12:00 - 18:00)</h5>
                    <p>Lunch & Afternoon Snacks</p>
                </div>
                <div class="time-slot">
                    <i class="fas fa-moon fa-2x mb-2"></i>
                    <h5>Malam (18:00 - 00:00)</h5>
                    <p>Dinner & Late Night Menu</p>
                </div>
                <div class="time-slot">
                    <i class="fas fa-star fa-2x mb-2"></i>
                    <h5>Tengah Malam (00:00 - 06:00)</h5>
                    <p>Midnight Special Menu</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>