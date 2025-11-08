<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Karir - Kyou Hobby Shop</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --primary: #6f42c1;
      --secondary: #5a2d91;
      --accent: #8b5cf6;
      --light-purple: #f3f0ff;
      --dark-purple: #4c1d95;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --light: #ffffff;
      --dark: #1f2937;
      --grey: #6b7280;
      --light-grey: #f9fafb;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      color: var(--dark);
    }
    
    /* Navbar */
    .navbar {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      padding: 1rem 0;
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: var(--primary) !important;
    }
    
    .nav-link {
      font-weight: 500;
      color: var(--dark) !important;
      transition: all 0.3s ease;
      margin: 0 0.5rem;
    }
    
    .nav-link:hover, .nav-link.active {
      color: var(--primary) !important;
      transform: translateY(-2px);
    }
    
    /* Hero Section */
    .hero-section {
      background: linear-gradient(135deg, rgba(103, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
      padding: 100px 0;
      text-align: center;
      color: white;
      margin-bottom: 80px;
    }
    
    .hero-content h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .hero-content p {
      font-size: 1.3rem;
      max-width: 700px;
      margin: 0 auto 30px;
      opacity: 0.9;
    }
    
    /* Section Title */
    .section-title {
      text-align: center;
      margin-bottom: 60px;
    }
    
    .section-title h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: white;
      margin-bottom: 15px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .section-title p {
      color: rgba(255, 255, 255, 0.9);
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto;
    }
    
    /* Job Cards - Mirip dengan Produk Best Seller */
    .job-card {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.4s ease;
      margin-bottom: 30px;
      position: relative;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .job-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .job-card-image {
      height: 250px;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      position: relative;
      overflow: hidden;
    }
    
    .job-card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    
    .job-card:hover .job-card-image img {
      transform: scale(1.1);
    }
    
    .job-type-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      padding: 8px 16px;
      border-radius: 25px;
      font-size: 0.8rem;
      font-weight: 600;
      z-index: 2;
      backdrop-filter: blur(10px);
    }
    
    .full-time {
      background: rgba(16, 185, 129, 0.9);
      color: white;
    }
    
    .part-time {
      background: rgba(245, 158, 11, 0.9);
      color: white;
    }
    
    .contract {
      background: rgba(239, 68, 68, 0.9);
      color: white;
    }
    
    .internship {
      background: rgba(139, 92, 246, 0.9);
      color: white;
    }
    
    .job-card-content {
      padding: 30px 25px;
    }
    
    .job-title {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 15px;
      color: var(--dark);
      line-height: 1.3;
    }
    
    .job-meta {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 20px;
      gap: 15px;
    }
    
    .job-meta span {
      display: flex;
      align-items: center;
      color: var(--grey);
      font-size: 0.9rem;
      font-weight: 500;
    }
    
    .job-meta i {
      margin-right: 8px;
      color: var(--primary);
      font-size: 1rem;
    }
    
    .job-description {
      color: var(--grey);
      margin-bottom: 25px;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      line-height: 1.6;
      font-size: 0.95rem;
    }
    
    .job-price {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 20px;
    }
    
    .btn-apply {
      background: linear-gradient(135deg, var(--primary), var(--accent));
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 25px;
      font-weight: 600;
      font-size: 0.9rem;
      width: 100%;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .btn-apply:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(111, 66, 193, 0.4);
      color: white;
      text-decoration: none;
    }
    
    /* Container */
    .main-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 40px;
      margin: 0 auto;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 80px 20px;
      color: white;
    }
    
    .empty-state i {
      font-size: 4rem;
      margin-bottom: 20px;
      opacity: 0.7;
    }
    
    .empty-state h3 {
      font-size: 1.8rem;
      margin-bottom: 15px;
      font-weight: 600;
    }
    
    .empty-state p {
      font-size: 1.1rem;
      opacity: 0.8;
      max-width: 500px;
      margin: 0 auto;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .hero-content h1 {
        font-size: 2.5rem;
      }
      
      .hero-content p {
        font-size: 1.1rem;
      }
      
      .section-title h2 {
        font-size: 2rem;
      }
      
      .main-container {
        padding: 20px;
        margin: 0 15px;
      }
      
      .job-card-content {
        padding: 20px;
      }
    }
    
    @media (max-width: 576px) {
      .hero-content h1 {
        font-size: 2rem;
      }
      
      .job-meta {
        flex-direction: column;
        gap: 10px;
      }
      
      .job-meta span {
        justify-content: center;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-briefcase me-2"></i>
        FoodMarket
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="/home">
              <i class="fas fa-home me-1"></i>Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/menu">
              <i class="fas fa-utensils me-1"></i>Menu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/promo">
              <i class="fas fa-tags me-1"></i>Promo
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/career">
              <i class="fas fa-briefcase me-1"></i>Karir
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kontak">
              <i class="fas fa-phone me-1"></i>Kontak
            </a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="/my-favorites">
              <i class="fas fa-heart me-1"></i>Favorit
            </a>
          </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="/ai">
              <i class="fas fa-robot me-1"></i>AI Assistant
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="hero-content">
        <h1>Bergabunglah dengan Tim Kami</h1>
        <p>Temukan peluang karir menarik di Kyou Hobby Shop dan jadilah bagian dari tim yang berdedikasi untuk memberikan pengalaman terbaik bagi para penggemar hobi.</p>
      </div>
    </div>
  </section>

  <!-- Job Listings -->
  <section class="container mb-5">
    <div class="main-container">
      <div class="section-title">
        <h2>Lowongan Kerja Terbaik</h2>
        <p>Jelajahi peluang karir yang tersedia saat ini di Kyou Hobby Shop</p>
      </div>
      
      <div class="row">
        @if(count($vacancies) > 0)
          @foreach($vacancies as $vacancy)
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="job-card">
              <div class="job-card-image">
                @if($vacancy->photo)
                  <img src="{{ asset($vacancy->photo) }}" alt="{{ $vacancy->title }}">
                @else
                  <div style="background: linear-gradient(135deg, var(--primary), var(--accent)); height: 100%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-briefcase" style="font-size: 3rem; color: white; opacity: 0.7;"></i>
                  </div>
                @endif
                
                <span class="job-type-badge 
                  @if($vacancy->type == 'Full-time') full-time 
                  @elseif($vacancy->type == 'Part-time') part-time 
                  @elseif($vacancy->type == 'Contract') contract 
                  @else internship @endif">
                  {{ $vacancy->type }}
                </span>
              </div>

              <div class="job-card-content">
                <h3 class="job-title">{{ $vacancy->title }}</h3>
                <div class="job-meta">
                  <span><i class="fas fa-map-marker-alt"></i> {{ $vacancy->location }}</span>
                  <span><i class="fas fa-calendar-alt"></i> {{ $vacancy->deadline->format('d M Y') }}</span>
                </div>
                <p class="job-description">{{ Str::limit($vacancy->description, 120) }}</p>
                <div class="job-price">Gaji Kompetitif</div>
                <a href="{{ route('career.show', $vacancy->id) }}" class="btn-apply">
                  Lamar Sekarang
                </a>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col-12">
            <div class="empty-state">
              <i class="fas fa-briefcase"></i>
              <h3>Belum Ada Lowongan Tersedia</h3>
              <p>Saat ini belum ada lowongan kerja yang tersedia. Silakan cek kembali nanti untuk peluang karir terbaru di Kyou Hobby Shop.</p>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>