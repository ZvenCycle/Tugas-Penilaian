<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramah Lingkungan - FoodMarket</title>
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
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
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
            background: linear-gradient(45deg, #2ecc71, #27ae60);
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
            color: #2ecc71 !important;
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

        .eco-card {
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

        .eco-card::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #2ecc71, #27ae60, #16a085, #1abc9c);
            border-radius: 23px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .eco-card:hover::before {
            opacity: 1;
        }

        .eco-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .eco-icon {
            font-size: 3rem;
            color: #2ecc71;
            margin-bottom: 20px;
        }

        .eco-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .eco-description {
            color: #666;
            line-height: 1.8;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .stat-item {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: #2ecc71;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
        }

        .back-btn {
            background: linear-gradient(45deg, #2ecc71, #27ae60);
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
            box-shadow: 0 8px 25px rgba(46,204,113,0.4);
            margin-bottom: 40px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(46,204,113,0.6);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .eco-card {
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
            <h1 class="hero-title">🌱 RAMAH LINGKUNGAN</h1>
            <p class="hero-subtitle">Komitmen Sustainability dan Zero Waste untuk Bumi yang Lebih Hijau</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <a href="{{ route('company.profile') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Profil Perusahaan
            </a>

            <h2 class="section-title">Inisiatif Hijau FoodMarket</h2>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="eco-card">
                        <div class="eco-icon">
                            <i class="fas fa-recycle"></i>
                        </div>
                        <h3 class="eco-title">Zero Waste Program</h3>
                        <p class="eco-description">
                            Program zero waste yang komprehensif dengan target 95% pengurangan limbah pada 2025. 
                            Sistem composting untuk limbah organik, recycling untuk kemasan, dan partnership dengan 
                            bank sampah lokal. Food waste dikonversi menjadi pupuk organik untuk urban farming.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="eco-card">
                        <div class="eco-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3 class="eco-title">Biodegradable Packaging</h3>
                        <p class="eco-description">
                            100% kemasan biodegradable dari bahan ramah lingkungan seperti bagasse, PLA, dan kertas 
                            daur ulang. Kemasan dapat terurai dalam 90 hari dan aman untuk composting rumahan. 
                            Investasi R&D untuk inovasi kemasan edible yang dapat dimakan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="eco-card">
                        <div class="eco-icon">
                            <i class="fas fa-solar-panel"></i>
                        </div>
                        <h3 class="eco-title">Renewable Energy</h3>
                        <p class="eco-description">
                            Transisi ke 100% energi terbarukan dengan instalasi solar panel di semua outlet dan 
                            warehouse. Smart energy management system untuk optimasi konsumsi listrik. 
                            Carbon neutral operations dengan offset program penanaman pohon.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="eco-card">
                        <div class="eco-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h3 class="eco-title">Local Sourcing</h3>
                        <p class="eco-description">
                            Bermitra dengan 500+ petani lokal untuk mengurangi carbon footprint transportasi. 
                            Organic farming support program dengan pelatihan dan bantuan teknologi. 
                            Farm-to-table concept dengan jarak rata-rata supplier kurang dari 50km.
                        </p>
                    </div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Pengurangan Limbah</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Kemasan Biodegradable</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Petani Partner</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50km</div>
                    <div class="stat-label">Rata-rata Jarak Supplier</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10,000</div>
                    <div class="stat-label">Pohon Ditanam/Tahun</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">Carbon</div>
                    <div class="stat-label">Neutral Operations</div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>