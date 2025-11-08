<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Profesional - FoodMarket</title>
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
            background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
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
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
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
            color: #4ecdc4 !important;
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

        .team-member {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            transition: all 0.3s ease;
            text-align: center;
            border: 3px solid transparent;
            background-clip: padding-box;
            position: relative;
        }

        .team-member::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #4ecdc4, #44a08d, #667eea, #764ba2);
            border-radius: 23px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .team-member:hover::before {
            opacity: 1;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 3rem;
            color: white;
            box-shadow: 0 10px 30px rgba(78,205,196,0.3);
        }

        .team-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .team-position {
            font-size: 1.1rem;
            color: #4ecdc4;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .team-description {
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .team-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .skill-tag {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .back-btn {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
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
            box-shadow: 0 8px 25px rgba(78,205,196,0.4);
            margin-bottom: 40px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(78,205,196,0.6);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .team-member {
                padding: 20px;
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
            <h1 class="hero-title">👥 TIM PROFESIONAL</h1>
            <p class="hero-subtitle">Chef Berpengalaman dan Tim Ahli dengan Pengalaman 10+ Tahun</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <a href="{{ route('company.profile') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Profil Perusahaan
            </a>

            <h2 class="section-title">Meet Our Expert Team</h2>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="team-name">Ahmad Rizki</h3>
                        <p class="team-position">CEO & Founder</p>
                        <p class="team-description">
                            Visioner di balik FoodMarket dengan pengalaman 15+ tahun di industri kuliner dan teknologi. 
                            Memimpin transformasi digital dalam industri F&B Indonesia.
                        </p>
                        <div class="team-skills">
                            <span class="skill-tag">Leadership</span>
                            <span class="skill-tag">Strategy</span>
                            <span class="skill-tag">Innovation</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3 class="team-name">Sarah Putri</h3>
                        <p class="team-position">Executive Chef</p>
                        <p class="team-description">
                            Chef berpengalaman dengan spesialisasi masakan Nusantara dan fusion cuisine modern. 
                            Lulusan Le Cordon Bleu dengan pengalaman di restoran Michelin Star.
                        </p>
                        <div class="team-skills">
                            <span class="skill-tag">Culinary Arts</span>
                            <span class="skill-tag">Menu Development</span>
                            <span class="skill-tag">Quality Control</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <h3 class="team-name">Budi Santoso</h3>
                        <p class="team-position">Chief Technology Officer</p>
                        <p class="team-description">
                            Ahli teknologi yang memastikan platform FoodMarket selalu up-to-date dan user-friendly. 
                            Expert dalam AI, machine learning, dan cloud infrastructure.
                        </p>
                        <div class="team-skills">
                            <span class="skill-tag">AI/ML</span>
                            <span class="skill-tag">Cloud Computing</span>
                            <span class="skill-tag">System Architecture</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h3 class="team-name">Maya Sari</h3>
                        <p class="team-position">Head of Operations</p>
                        <p class="team-description">
                            Mengawasi operasional harian dengan fokus pada efisiensi dan kualitas layanan. 
                            Berpengalaman dalam supply chain management dan process optimization.
                        </p>
                        <div class="team-skills">
                            <span class="skill-tag">Operations</span>
                            <span class="skill-tag">Supply Chain</span>
                            <span class="skill-tag">Process Optimization</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3 class="team-name">Doni Pratama</h3>
                        <p class="team-position">Quality Assurance Manager</p>
                        <p class="team-description">
                            Memastikan standar kualitas tertinggi dalam setiap aspek produksi dan layanan. 
                            Certified dalam ISO 22000 dan HACCP food safety standards.
                        </p>
                        <div class="team-skills">
                            <span class="skill-tag">Quality Control</span>
                            <span class="skill-tag">Food Safety</span>
                            <span class="skill-tag">ISO Standards</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user-chart"></i>
                        </div>
                        <h3 class="team-name">Lisa Wijaya</h3>
                        <p class="team-position">Head of Marketing</p>
                        <p class="team-description">
                            Strategi marketing digital dan brand development yang inovatif. 
                            Expert dalam social media marketing dan customer engagement strategies.
                        </p>
                        <div class="team-skills">
                            <span class="skill-tag">Digital Marketing</span>
                            <span class="skill-tag">Brand Strategy</span>
                            <span class="skill-tag">Customer Analytics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>