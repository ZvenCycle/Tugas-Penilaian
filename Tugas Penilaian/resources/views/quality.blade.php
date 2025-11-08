<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standar Kualitas - FoodMarket</title>
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
            background: linear-gradient(135deg, #feca57 0%, #ff9ff3 100%);
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
            background: linear-gradient(45deg, #feca57, #ff9ff3);
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
            color: #feca57 !important;
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

        .quality-card {
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

        .quality-card::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #feca57, #ff9ff3, #4ecdc4, #667eea);
            border-radius: 23px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .quality-card:hover::before {
            opacity: 1;
        }

        .quality-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .quality-icon {
            font-size: 3rem;
            color: #feca57;
            margin-bottom: 20px;
        }

        .quality-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .quality-description {
            color: #666;
            line-height: 1.8;
        }

        .certification-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .cert-item {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .cert-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .cert-icon {
            font-size: 2.5rem;
            color: #feca57;
            margin-bottom: 20px;
        }

        .cert-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .back-btn {
            background: linear-gradient(45deg, #feca57, #ff9ff3);
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
            box-shadow: 0 8px 25px rgba(254,202,87,0.4);
            margin-bottom: 40px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(254,202,87,0.6);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .quality-card {
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
            <h1 class="hero-title">💎 STANDAR KUALITAS TINGGI</h1>
            <p class="hero-subtitle">Bahan Baku Pilihan dan Proses Produksi Berstandar Internasional ISO 22000</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <a href="{{ route('company.profile') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Profil Perusahaan
            </a>

            <h2 class="section-title">Komitmen Kualitas FoodMarket</h2>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="quality-card">
                        <div class="quality-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="quality-title">ISO 22000 Certified</h3>
                        <p class="quality-description">
                            Sertifikasi ISO 22000 untuk Food Safety Management System memastikan setiap proses produksi 
                            mengikuti standar keamanan pangan internasional. Dari pemilihan bahan baku hingga penyajian 
                            akhir, semua tahapan dimonitor ketat untuk menjamin kualitas dan keamanan makanan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="quality-card">
                        <div class="quality-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3 class="quality-title">Organic & Fresh Ingredients</h3>
                        <p class="quality-description">
                            Bermitra langsung dengan petani lokal untuk mendapatkan bahan organik segar setiap hari. 
                            Sistem cold chain yang terintegrasi memastikan kesegaran dari farm to table. 
                            Semua supplier telah melewati audit ketat dan memiliki sertifikasi organic.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="quality-card">
                        <div class="quality-icon">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <h3 class="quality-title">Laboratory Testing</h3>
                        <p class="quality-description">
                            Laboratorium in-house dengan peralatan canggih untuk testing mikrobiologi, kimia, dan fisik. 
                            Setiap batch produk melalui quality control testing sebelum dipasarkan. 
                            Partnership dengan lab eksternal terakreditasi untuk double verification.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="quality-card">
                        <div class="quality-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="quality-title">HACCP Implementation</h3>
                        <p class="quality-description">
                            Hazard Analysis and Critical Control Points (HACCP) diimplementasikan di seluruh rantai produksi. 
                            Identifikasi dan kontrol risiko pada setiap tahap untuk mencegah kontaminasi. 
                            Training berkelanjutan untuk semua staff tentang food safety protocols.
                        </p>
                    </div>
                </div>
            </div>

            <div class="certification-grid">
                <div class="cert-item">
                    <div class="cert-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4 class="cert-title">ISO 22000:2018</h4>
                    <p>Food Safety Management System</p>
                </div>

                <div class="cert-item">
                    <div class="cert-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4 class="cert-title">HACCP Certified</h4>
                    <p>Hazard Analysis Critical Control Points</p>
                </div>

                <div class="cert-item">
                    <div class="cert-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4 class="cert-title">Organic Certified</h4>
                    <p>Certified Organic Ingredients</p>
                </div>

                <div class="cert-item">
                    <div class="cert-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h4 class="cert-title">Global Standards</h4>
                    <p>International Quality Compliance</p>
                </div>

                <div class="cert-item">
                    <div class="cert-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <h4 class="cert-title">Sustainable Practices</h4>
                    <p>Environmental Responsibility</p>
                </div>

                <div class="cert-item">
                    <div class="cert-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h4 class="cert-title">Customer Satisfaction</h4>
                    <p>99.5% Customer Approval Rating</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>