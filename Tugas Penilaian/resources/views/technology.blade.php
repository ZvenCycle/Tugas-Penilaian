<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teknologi Terdepan - FoodMarket</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: linear-gradient(45deg, #667eea, #764ba2);
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
            color: #667eea !important;
        }

        /* Hero Section */
        .hero-section {
            padding: 120px 0 80px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 2px, transparent 2px),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 2px, transparent 2px);
            background-size: 50px 50px, 60px 60px;
            animation: float 20s ease-in-out infinite;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 20px;
            text-shadow: 3px 3px 0px #333, 6px 6px 0px rgba(0,0,0,0.2);
            animation: glow 2s ease-in-out infinite alternate;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        /* Content Sections */
        .content-section {
            padding: 80px 0;
            background: white;
            position: relative;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 60px;
            color: #333;
        }

        .tech-card {
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

        .tech-card::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #667eea, #764ba2, #4ecdc4, #44a08d);
            border-radius: 23px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .tech-card:hover::before {
            opacity: 1;
        }

        .tech-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .tech-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }

        .tech-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .tech-description {
            color: #666;
            line-height: 1.8;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .feature-item {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 20px;
        }

        .feature-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Back Button */
        .back-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
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
            box-shadow: 0 8px 25px rgba(102,126,234,0.4);
            margin-bottom: 40px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102,126,234,0.6);
            color: white;
            text-decoration: none;
        }

        @keyframes glow {
            from {
                text-shadow: 3px 3px 0px #333, 6px 6px 0px rgba(0,0,0,0.2), 0 0 20px rgba(255,255,255,0.3);
            }
            to {
                text-shadow: 3px 3px 0px #333, 6px 6px 0px rgba(0,0,0,0.2), 0 0 30px rgba(255,255,255,0.5);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .tech-card {
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
            <h1 class="hero-title">🚀 TEKNOLOGI TERDEPAN</h1>
            <p class="hero-subtitle">Platform Digital Canggih dengan AI untuk Pengalaman Kuliner yang Personal</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <a href="{{ route('company.profile') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Profil Perusahaan
            </a>

            <h2 class="section-title">Inovasi Teknologi FoodMarket</h2>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="tech-card">
                        <div class="tech-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h3 class="tech-title">Artificial Intelligence (AI)</h3>
                        <p class="tech-description">
                            Sistem AI canggih yang mempelajari preferensi kuliner Anda untuk memberikan rekomendasi menu yang personal. 
                            Algoritma machine learning kami menganalisis riwayat pesanan, rating, dan feedback untuk menciptakan 
                            pengalaman kuliner yang unik untuk setiap pelanggan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="tech-card">
                        <div class="tech-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="tech-title">Mobile App Technology</h3>
                        <p class="tech-description">
                            Aplikasi mobile dengan teknologi React Native yang memberikan performa native di iOS dan Android. 
                            Fitur real-time tracking, push notifications, dan offline mode memastikan pengalaman pengguna yang 
                            seamless kapan saja dan di mana saja.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="tech-card">
                        <div class="tech-icon">
                            <i class="fas fa-cloud"></i>
                        </div>
                        <h3 class="tech-title">Cloud Infrastructure</h3>
                        <p class="tech-description">
                            Infrastruktur cloud AWS dengan auto-scaling yang memastikan performa optimal bahkan saat traffic tinggi. 
                            CDN global untuk loading cepat, backup otomatis, dan security tingkat enterprise melindungi data pelanggan 
                            dengan standar internasional.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="tech-card">
                        <div class="tech-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="tech-title">Big Data Analytics</h3>
                        <p class="tech-description">
                            Platform analytics real-time yang mengolah jutaan data point untuk insights bisnis yang actionable. 
                            Predictive analytics membantu optimasi inventory, demand forecasting, dan personalisasi pengalaman 
                            pelanggan berdasarkan pola konsumsi dan tren pasar.
                        </p>
                    </div>
                </div>
            </div>

            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <h4 class="feature-title">QR Code Ordering</h4>
                    <p>Sistem pemesanan contactless dengan QR code untuk pengalaman dining yang aman dan modern</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h4 class="feature-title">Digital Payment</h4>
                    <p>Integrasi dengan 20+ payment gateway untuk kemudahan transaksi digital yang aman</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h4 class="feature-title">GPS Tracking</h4>
                    <p>Real-time tracking delivery dengan akurasi tinggi menggunakan teknologi GPS terdepan</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="feature-title">Cyber Security</h4>
                    <p>Keamanan berlapis dengan enkripsi end-to-end dan monitoring 24/7 untuk melindungi data</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="feature-title">AI Chatbot</h4>
                    <p>Customer service AI yang dapat menangani 90% pertanyaan pelanggan secara otomatis</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h4 class="feature-title">Blockchain</h4>
                    <p>Teknologi blockchain untuk traceability bahan makanan dan transparensi supply chain</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>