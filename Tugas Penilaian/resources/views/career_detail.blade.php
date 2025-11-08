<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $vacancy->title }} - Karir Kyou Hobby Shop</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    :root {
      --primary: #4361ee;
      --secondary: #3f37c9;
      --success: #4cc9f0;
      --info: #4895ef;
      --warning: #f72585;
      --danger: #e63946;
      --light: #f8f9fa;
      --dark: #212529;
      --accent: #f72585;
      --accent-light: #ffccd5;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    
    body {
      background-color: #f5f7ff;
      color: #333;
    }
    
    /* Navbar */
    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .navbar-brand {
      font-weight: 700;
      color: var(--accent) !important;
    }
    
    .nav-link {
      font-weight: 500;
      color: #333;
      transition: all 0.3s;
    }
    
    .nav-link:hover, .nav-link.active {
      color: var(--accent);
    }
    
    /* Job Detail Header */
    .job-detail-header {
      background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                  @if($vacancy->photo)
                    url('{{ asset($vacancy->photo) }}') center/cover no-repeat;
                  @else
                    linear-gradient(135deg, var(--primary), var(--accent));
                  @endif
      padding: 100px 0;
      color: white;
      text-align: center;
    }
      @if($vacancy->photo)
        background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), 
                    url('{{ asset('storage/' . $vacancy->photo) }}') center/cover no-repeat;
      @else
        background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), 
                    url('https://kyou.id/static/img/banner/banner-1.jpg') center/cover no-repeat;
      @endif
      padding: 100px 0 50px;
      color: white;
      margin-bottom: 50px;
    }
    
    .btn-back {
      display: inline-flex;
      align-items: center;
      color: rgba(255,255,255,0.8);
      text-decoration: none;
      margin-bottom: 20px;
      transition: all 0.3s;
    }
    
    .btn-back:hover {
      color: white;
    }
    
    .btn-back i {
      margin-right: 5px;
    }
    
    .job-detail-title {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 20px;
    }
    
    .job-type-badge {
      display: inline-block;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.9rem;
      font-weight: 600;
      margin-bottom: 20px;
    }
    
    .full-time {
      background-color: var(--primary);
      color: white;
    }
    
    .part-time {
      background-color: var(--success);
      color: white;
    }
    
    .contract {
      background-color: var(--warning);
      color: white;
    }
    
    .internship {
      background-color: var(--info);
      color: white;
    }
    
    .job-detail-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }
    
    .job-detail-meta span {
      display: flex;
      align-items: center;
      color: rgba(255,255,255,0.8);
    }
    
    .job-detail-meta i {
      margin-right: 8px;
      color: var(--accent);
    }
    
    /* Job Detail Content */
    .job-detail-content {
      background: white;
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      margin-bottom: 50px;
    }
    
    .job-detail-content h3 {
      font-size: 1.5rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid #eee;
    }
    
    .job-detail-content p {
      color: #666;
      line-height: 1.8;
      margin-bottom: 30px;
    }
    
    .job-detail-content ul {
      padding-left: 20px;
      margin-bottom: 30px;
    }
    
    .job-detail-content ul li {
      color: #666;
      margin-bottom: 10px;
      position: relative;
    }
    
    .job-detail-content ul li::before {
      content: "•";
      color: var(--accent);
      font-weight: bold;
      display: inline-block;
      width: 1em;
      margin-left: -1em;
    }
    
    .btn-apply-now {
      background: linear-gradient(to right, var(--primary), var(--accent));
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 5px;
      font-weight: 500;
      font-size: 1.1rem;
      display: inline-block;
      transition: all 0.3s;
      text-decoration: none;
    }
    
    .btn-apply-now:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(247, 37, 133, 0.3);
      color: white;
    }
    
    /* Footer */
    footer {
      background-color: #212529;
      color: white;
      padding: 60px 0 30px;
    }
    
    .footer-brand {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--accent);
      margin-bottom: 20px;
      display: block;
    }
    
    footer h5 {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 25px;
      color: white;
    }
    
    footer ul li {
      margin-bottom: 15px;
    }
    
    footer a {
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      transition: all 0.3s;
    }
    
    footer a:hover {
      color: var(--accent);
    }
    
    .footer-contact li {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      color: rgba(255,255,255,0.7);
    }
    
    .footer-contact i {
      margin-right: 10px;
      color: var(--accent);
    }
    
    .social-links {
      display: flex;
      gap: 15px;
    }
    
    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: rgba(255,255,255,0.1);
      color: white;
      transition: all 0.3s;
    }
    
    .social-links a:hover {
      background-color: var(--accent);
      transform: translateY(-5px);
    }
    
    .copyright {
      text-align: center;
      padding-top: 30px;
      margin-top: 30px;
      border-top: 1px solid rgba(255,255,255,0.1);
      color: rgba(255,255,255,0.7);
    }
    
    @media (max-width: 768px) {
      .job-detail-title {
        font-size: 2rem;
      }
      
      .job-detail-content {
        padding: 25px;
      }
      
      footer [class*="col-"] {
        margin-bottom: 30px;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">RestoAdmin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/menu">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/promo">Promo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/career">Karir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kontak">Kontak</a>
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

  <!-- Job Detail Header -->
  <section class="job-detail-header">
    <div class="container">
      <a href="{{ route('career') }}" class="btn-back">
        <i class="bx bx-left-arrow-alt"></i> Kembali ke Daftar Lowongan
      </a>
      <h1 class="job-detail-title">{{ $vacancy->title }}</h1>
      <span class="job-type-badge 
        @if($vacancy->type == 'Full-time') full-time 
        @elseif($vacancy->type == 'Part-time') part-time 
        @elseif($vacancy->type == 'Contract') contract 
        @else internship @endif">
        {{ $vacancy->type }}
      </span>
      <div class="job-detail-meta">
        <span><i class="bx bx-map"></i> {{ $vacancy->location }}</span>
        <span><i class="bx bx-calendar"></i> Deadline: {{ $vacancy->deadline->format('d M Y') }}</span>
      </div>
    </div>
  </section>

  <!-- Job Detail Content -->
  <section class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="job-detail-content">
          @if($vacancy->photo)
            <div class="job-photo mb-4">
              <img src="{{ asset($vacancy->photo) }}" alt="{{ $vacancy->title }}" class="img-fluid rounded" style="width: 100%; max-height: 400px; object-fit: cover;">
            </div>
          @endif
          
          <h3>Deskripsi Pekerjaan</h3>
          <p>{{ $vacancy->description }}</p>
          
          <h3>Persyaratan</h3>
          <div>{!! nl2br(e($vacancy->requirements)) !!}</div>
          
          <div class="text-center mt-5">
            <a href="mailto:karir@kyouhobbyshop.com?subject=Lamaran: {{ $vacancy->title }}" class="btn-apply-now">
              <i class="bx bx-envelope me-2"></i> Lamar Sekarang
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="#" class="footer-brand">RestoAdmin</a>
          <p class="mb-4">Toko hobi terlengkap dengan koleksi figure, gunpla, dan merchandise anime terbaru dan terbaik. Temukan hobi impianmu sekarang!</p>
          <div class="social-links">
            <a href="#"><i class="bx bxl-facebook"></i></a>
            <a href="#"><i class="bx bxl-instagram"></i></a>
            <a href="#"><i class="bx bxl-twitter"></i></a>
            <a href="#"><i class="bx bxl-youtube"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-6 mb-4">
          <h5>Navigasi</h5>
          <ul class="list-unstyled">
            <li><a href="/home">Home</a></li>
            <li><a href="/menu">Menu</a></li>
            <li><a href="/promo">Promo</a></li>
            <li><a href="/career">Karir</a></li>
            <li><a href="/kontak">Kontak</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Kategori</h5>
          <ul class="list-unstyled">
            <li><a href="#">Nendoroid</a></li>
            <li><a href="#">Figma</a></li>
            <li><a href="#">Model Kit</a></li>
            <li><a href="#">Scale Figure</a></li>
            <li><a href="#">Merchandise</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Hubungi Kami</h5>
          <ul class="list-unstyled footer-contact">
            <li><i class="bx bx-phone"></i> +62 123 456 789</li>
            <li><i class="bx bx-envelope"></i> info@kyouhobbyshop.com</li>
            <li><i class="bx bx-map"></i> Jl. Anime No. 123, Bali, Indonesia</li>
            <li><i class="bx bx-time"></i> Senin - Minggu: 10:00 - 22:00</li>
          </ul>
        </div>
      </div>
      
      <div class="copyright">
        <p>&copy; 2024 Kyou Hobby Shop. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>