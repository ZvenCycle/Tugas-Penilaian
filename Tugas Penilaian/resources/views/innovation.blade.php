<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inovasi Berkelanjutan - FoodMarket</title>
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
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
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
            background: linear-gradient(45deg, #9b59b6, #8e44ad);
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
            color: #9b59b6 !important;
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

        .innovation-card {
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

        .innovation-card::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #9b59b6, #8e44ad, #667eea, #764ba2);
            border-radius: 23px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .innovation-card:hover::before {
            opacity: 1;
        }

        .innovation-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .innovation-icon {
            font-size: 3rem;
            color: #9b59b6;
            margin-bottom: 20px;
        }

        .innovation-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .innovation-description {
            color: #666;
            line-height: 1.8;
        }

        .timeline {
            position: relative;
            margin-top: 60px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #9b59b6, #8e44ad);
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 50px;
            width: 50%;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            padding-right: 50px;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
            padding-left: 50px;
        }

        .timeline-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
        }

        .timeline-year {
            background: linear-gradient(45deg, #9b59b6, #8e44ad);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 15px;
        }

        .back-btn {
            background: linear-gradient(45deg, #9b59b6, #8e44ad);
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
            box-shadow: 0 8px 25px rgba(155,89,182,0.4);
            margin-bottom: 40px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(155,89,182,0.6);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .innovation-card {
                padding: 25px;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-item {
                width: 100%;
                left: 0 !important;
                padding-left: 50px !important;
                padding-right: 0 !important;
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
            <h1 class="hero-title">💡 INOVASI BERKELANJUTAN</h1>
            <p class="hero-subtitle">Research & Development untuk Masa Depan Industri Kuliner Digital</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <a href="{{ route('company.profile') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Profil Perusahaan
            </a>

            <h2 class="section-title">Inovasi Terdepan FoodMarket</h2>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="innovation-card">
                        <div class="innovation-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3 class="innovation-title">AI-Powered Nutrition</h3>
                        <p class="innovation-description">
                            Sistem AI yang menganalisis kebutuhan nutrisi personal berdasarkan data kesehatan, 
                            aktivitas, dan preferensi makanan. Machine learning algorithm yang terus belajar 
                            untuk memberikan rekomendasi menu yang optimal untuk kesehatan setiap individu.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="innovation-card">
                        <div class="innovation-icon">
                            <i class="fas fa-cube"></i>
                        </div>
                        <h3 class="innovation-title">Blockchain Traceability</h3>
                        <p class="innovation-description">
                            Implementasi blockchain untuk full traceability dari farm to fork. Setiap bahan makanan 
                            dapat dilacak asal-usulnya, proses pengolahan, dan rantai distribusi. 
                            Transparansi penuh untuk consumer confidence dan food safety assurance.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="innovation-card">
                        <div class="innovation-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h3 class="innovation-title">Automated Kitchen</h3>
                        <p class="innovation-description">
                            Robot chef dan automated cooking system untuk konsistensi kualitas dan efisiensi produksi. 
                            IoT sensors untuk monitoring suhu, kelembaban, dan timing yang presisi. 
                            Predictive maintenance untuk zero downtime operations.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="innovation-card">
                        <div class="innovation-icon">
                            <i class="fas fa-dna"></i>
                        </div>
                        <h3 class="innovation-title">Food Science Lab</h3>
                        <p class="innovation-description">
                            Laboratorium R&D untuk pengembangan alternative protein, plant-based meat, dan 
                            functional foods. Kolaborasi dengan universitas untuk research nutrigenomics 
                            dan personalized nutrition berdasarkan genetic profile.
                        </p>
                    </div>
                </div>
            </div>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2024</div>
                        <h4>AI Nutrition Assistant Launch</h4>
                        <p>Peluncuran fitur AI yang memberikan rekomendasi nutrisi personal dan meal planning otomatis.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2025</div>
                        <h4>Blockchain Implementation</h4>
                        <p>Full implementation blockchain untuk traceability dan smart contracts dengan suppliers.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2026</div>
                        <h4>Automated Kitchen Rollout</h4>
                        <p>Deployment robot chef dan automated systems di 50% outlet untuk konsistensi kualitas.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2027</div>
                        <h4>Lab-Grown Meat Integration</h4>
                        <p>Integrasi lab-grown meat dan alternative protein dalam menu untuk sustainability.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2028</div>
                        <h4>Personalized Nutrition Platform</h4>
                        <p>Platform nutrisi personal berdasarkan genetic testing dan real-time health monitoring.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>