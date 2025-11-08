<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodMarket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Poppins', sans-serif;
    color: #2d3436;
  }
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

  /* Profile Dropdown Styles */
  .profile-dropdown {
    position: relative;
  }
  
  .profile-btn {
    background: rgba(255,255,255,0.1);
    border: 2px solid rgba(255,255,255,0.2);
    border-radius: 50px;
    padding: 8px 15px;
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    cursor: pointer;
  }
  
  .profile-btn:hover {
    background: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.3);
    color: white;
    text-decoration: none;
  }
  
  .profile-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(45deg, #2b95a3, #654ecd);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 14px;
    color: white;
  }
  
  .profile-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }
  
  .profile-name {
    font-weight: 600;
    font-size: 14px;
    line-height: 1;
    margin-bottom: 2px;
  }
  
  .profile-email {
    font-size: 12px;
    opacity: 0.8;
    line-height: 1;
  }
  
  .dropdown-menu {
    background: white;
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    padding: 15px 0;
    min-width: 250px;
    margin-top: 10px;
  }
  
  .dropdown-header {
    padding: 10px 20px;
    border-bottom: 1px solid #f1f3f4;
    margin-bottom: 10px;
  }
  
  .dropdown-header .user-name {
    font-weight: 600;
    color: #2d3436;
    font-size: 16px;
    margin-bottom: 5px;
  }
  
  .dropdown-header .user-email {
    color: #636e72;
    font-size: 14px;
  }
  
  .dropdown-item {
    padding: 12px 20px;
    color: #2d3436;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
  }
  
  .dropdown-item:hover {
    background: #f8f9fa;
    color: #6c5ce7;
  }
  
  .dropdown-item i {
    width: 20px;
    text-align: center;
  }
  
  .logout-item {
    border-top: 1px solid #f1f3f4;
    margin-top: 10px;
    padding-top: 15px;
  }
  
  .logout-item:hover {
    background: #fff5f5;
    color: #e74c3c;
  }
  .hero {
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
              url('https://images.unsplash.com/photo-1504674900247-0877df9cc836') center/cover no-repeat;
    height: 500px;
    border-radius: 30px;
    margin: 30px 0;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0 20px;
    position: relative;
    overflow: hidden;
  }
  .hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(108,92,231,0.8), rgba(163,99,217,0.8));
    opacity: 0.7;
  }
  .hero-content {
    position: relative;
    z-index: 1;
    max-width: 800px;
  }
  .hero-content h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
  }
  .hero-content p {
    font-size: 1.3rem;
    margin-bottom: 2.5rem;
    opacity: 0.9;
  }
  .hero-btn {
    background: #fff;
    color: #6c5ce7;
    padding: 15px 40px;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 600;
    font-size: 1.1rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  }
  .hero-btn:hover {
    background: #6c5ce7;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
  }
  .section-title {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
    padding-bottom: 20px;
  }
  .section-title h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2d3436;
    margin-bottom: 10px;
  }
  .section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: #6c5ce7;
    border-radius: 2px;
  }

  /* ====== GRID PRODUK DEFAULT (tetap 4 kolom) ====== */
  .product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    padding: 20px 0;
  }

  @media (max-width: 1200px) {
    .product-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 768px) {
    .product-grid {
      grid-template-columns: 1fr;
    }
  }

  .product-card {
    background: #fff;
    border: none;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  }
  .product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
  }
  .product-card img {
    height: 250px;
    object-fit: cover;
    transition: all 0.3s ease;
  }
  .product-card:hover img {
    transform: scale(1.05);
  }
  .product-card .card-body {
    padding: 25px;
  }
  .product-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #2d3436;
  }
  .product-price {
    font-size: 1.3rem;
    color: #6c5ce7;
    font-weight: 700;
    margin-bottom: 20px;
  }
  .product-price del {
    font-size: 1rem;
    color: #b2bec3;
    margin-right: 10px;
  }

  .btn-cart {
    background: linear-gradient(135deg, #6c5ce7, #a363d9);
    color: #fff;
    border: none;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    width: 100%;
    text-transform: uppercase;
    box-shadow: 0 4px 15px rgba(108, 92, 231, 0.2);
  }
  .btn-cart:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(108, 92, 231, 0.3);
    background: linear-gradient(135deg, #5b4cc2, #8f55c2);
  }
  .btn-cart:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(108, 92, 231, 0.2);
  }

  /* ====== FLASH SALE ====== */
  .flash-sale {
    background: linear-gradient(135deg, #6c5ce7, #a363d9);
    padding: 40px;
    border-radius: 30px;
    margin: 50px 0;
    color: #fff;
  }
  .flash-sale-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
  }
  .flash-sale-title {
    font-size: 2rem;
    font-weight: 700;
  }
  .flash-sale-timer {
    font-size: 1.2rem;
    font-weight: 500;
  }

  /* ====== FOOTER ====== */
  .footer {
    background: #2d3436;
    color: #fff;
    padding: 80px 0 30px;
    margin-top: 100px;
  }
  .footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-bottom: 50px;
  }
  .footer-section h5 {
    color: #6c5ce7;
    font-size: 1.3rem;
    margin-bottom: 25px;
    font-weight: 600;
  }
  .footer-section ul {
    list-style: none;
    padding: 0;
  }
  .footer-section ul li {
    margin-bottom: 15px;
  }
  .footer-section ul li a {
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease;
    opacity: 0.8;
  }
  .footer-section ul li a:hover {
    color: #6c5ce7;
    opacity: 1;
  }

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
    .product-grid {
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
    }
  }

  /* ====== SPECIAL MENU ====== */
  .special-menu {
    background: linear-gradient(135deg, #f6f8fd, #f1f4f9);
    padding: 60px 0;
    margin: 50px 0;
    border-radius: 40px;
  }

  .special-menu .product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
    margin-bottom: 30px;
  }

  @media (max-width: 1200px) {
    .special-menu .product-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 768px) {
    .special-menu .product-grid {
      grid-template-columns: 1fr;
    }
  }

  .special-menu .product-card {
    background: #ffffff;
    border-radius: 25px;
    box-shadow: 0 10px 30px rgba(108, 92, 231, 0.1);
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  }

  .special-menu .product-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 40px rgba(108, 92, 231, 0.15);
  }

  .special-menu .product-card img {
    height: 250px;
    width: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
  }

  .special-menu .product-card:hover img {
    transform: scale(1.08);
  }

  .special-menu .card-body {
    padding: 25px;
  }

  .special-menu .product-title {
    font-size: 1.4rem;
    color: #2d3436;
    margin-bottom: 12px;
    font-weight: 700;
  }

  .special-menu .product-description {
    color: #636e72;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 15px;
    min-height: 50px;
  }

  .special-menu .product-price {
    font-size: 1.5rem;
    color: #6c5ce7;
    font-weight: 700;
    margin-bottom: 20px;
  }  /* <- fixed: tidak ada kurung kurawal nyasar */

  .special-menu .btn-cart {
    background: linear-gradient(135deg, #6c5ce7, #a363d9);
    border: none;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    letter-spacing: 1px;
    transition: all 0.3s ease;
  }

  .special-menu .btn-cart:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(108, 92, 231, 0.2);
  }

  .special-menu .section-title::after {
    width: 80px;
    height: 5px;
  }

  .view-more-btn {
    text-align: center;
    margin-top: 30px;
  }

  .view-more-btn button {
    background: transparent;
    border: 2px solid #6c5ce7;
    color: #6c5ce7;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .view-more-btn button:hover {
    background: #6c5ce7;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(108, 92, 231, 0.2);
  }
/* ====== HIDDEN MENU ====== */
.hidden-menu {
  background: linear-gradient(135deg, #f6f8fd, #f1f4f9);
  padding: 60px 0;
  margin: 50px 0;
  border-radius: 40px;
  display: none;
  opacity: 0;
  transition: all 0.4s ease;
}

.hidden-menu.show {
  display: block;
  opacity: 1;
}

/* Grid untuk card di dalam hidden-menu */
.hidden-menu .product-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 25px;
}

@media (max-width: 1200px) {
  .hidden-menu .product-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .hidden-menu .product-grid {
    grid-template-columns: 1fr;
  }
}

.hidden-menu .product-card {
  background: #ffffff;
  border-radius: 25px;
  box-shadow: 0 10px 30px rgba(108, 92, 231, 0.1);
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.hidden-menu .product-card:hover {
  transform: translateY(-15px) scale(1.02);
  box-shadow: 0 20px 40px rgba(108, 92, 231, 0.15);
}

.hidden-menu .product-card img {
  height: 250px;
  width: 100%;
  object-fit: cover;
  transition: all 0.5s ease;
}

.hidden-menu .product-card:hover img {
  transform: scale(1.08);
}

.hidden-menu .card-body {
  padding: 25px;
}

.hidden-menu .product-title {
  font-size: 1.4rem;
  color: #2d3436;
  margin-bottom: 12px;
  font-weight: 700;
}

.hidden-menu .product-description {
  color: #636e72;
  font-size: 1rem;
  line-height: 1.6;
  margin-bottom: 15px;
  min-height: 50px;
}

.hidden-menu .product-price {
  font-size: 1.5rem;
  color: #6c5ce7;
  font-weight: 700;
  margin-bottom: 20px;
}

.hidden-menu .btn-cart {
  background: linear-gradient(135deg, #6c5ce7, #a363d9);
  border: none;
  padding: 15px 30px;
  border-radius: 50px;
  font-weight: 600;
  letter-spacing: 1px;
  transition: all 0.3s ease;
  width: 100%;
  color: #fff;
  text-transform: uppercase;
  box-shadow: 0 4px 15px rgba(108, 92, 231, 0.2);
}

.hidden-menu .btn-cart:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(108, 92, 231, 0.3);
  background: linear-gradient(135deg, #5b4cc2, #8f55c2);
}


  /* ====== FLASH SALE CAROUSEL AREA ====== */
  .flash-sale-carousel {
    position: relative;
    overflow: hidden;
    padding: 0 40px;
  }

  .product-container {
    overflow-x: scroll;
    scroll-behavior: smooth;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE and Edge */
  }

  .product-container::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
  }

  /* FIX: yang tadinya .product-grid (bikin grid rusak) kini khusus track carousel */
  .product-track {
    display: flex;
    gap: 20px;
    padding: 20px 0;
    transition: transform 0.3s ease;
  }

  /* Card khusus di dalam carousel saja */
  .flash-sale-carousel .product-card {
    flex: 0 0 280px;
    margin: 0;
  }

  /* Tombol carousel khusus di area flash-sale saja */
  .flash-sale-carousel .carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    border: none;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    color: #6c5ce7;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 2;
  }

  .flash-sale-carousel .carousel-control:hover {
    background: #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  }

  .flash-sale-carousel .carousel-control.prev {
    left: 10px;
  }

  .flash-sale-carousel .carousel-control.next {
    right: 10px;
  }

  /* Harga di flash sale putih, biar kontras */
  .flash-sale .sale-price {
    color: #6c5ce7;
    font-size: 1.3rem;
    font-weight: 700;
  }

  /* ====== BLOK KEDUA FLASH SALE (tetap dipertahankan, tapi discoping) ====== */
  .flash-sale {
    background: linear-gradient(135deg, #6c5ce7, #a363d9);
    border-radius: 20px;
    padding: 2rem;
    margin: 2rem 0;
  }

  .flash-sale-title h2 {
    color: white;
    font-size: 1.8rem;
    font-weight: 600;
  }

  .flash-sale-timer {
    color: white;
    font-size: 1.1rem;
    font-weight: 500;
  }

  .flash-sale-carousel {
    overflow: hidden;
    padding: 0 40px;
    margin: 0 -40px;
  }

  .product-slider {
    overflow: hidden;
    margin: 0 -10px;
  }

  .product-track {
    display: flex;
    transition: transform 0.5s ease;
    gap: 20px;
    padding: 10px 0;
  }

  /* Card umum (dipertahankan). Card carousel tetap discoping di atas */
  .product-card {
    flex: initial;              /* reset agar grid tidak ketarik dari rule carousel */
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
  }

  .card-image {
    height: 200px;
    overflow: hidden;
  }

  .card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .product-card:hover .card-image img {
    transform: scale(1.05);
  }

  .card-body {
    padding: 1.5rem;
  }

  .product-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: #2d3436;
  }

  .price-wrapper {
    margin-bottom: 1.2rem;
  }

  .original-price {
    color: #b2bec3;
    font-size: 0.9rem;
    text-decoration: line-through;
    margin-bottom: 0.3rem;
  }

  /* Sale price default (di luar flash-sale) */
  .sale-price {
    color: #6c5ce7;
    font-size: 1.4rem;
    font-weight: 700;
  }

  /* Tombol carousel – discope lagi agar tidak ganggu komponen lain */
  .flash-sale-carousel .carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    border: none;
    border-radius: 50%;
    background: white;
    color: #6c5ce7;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 2;
  }

  .flash-sale-carousel .carousel-control:hover {
    background: #6c5ce7;
    color: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  }

  .flash-sale-carousel .carousel-control.prev {
    left: 0;
  }

  .flash-sale-carousel .carousel-control.next {
    right: 0;
  }

  /* Promo */
  /* ====== PROMO SECTION ====== */
.promo-section {
  padding: 80px 0;
  background: linear-gradient(135deg, #f6f8fd, #f1f4f9);
  margin: 50px 0;
  border-radius: 40px;
}

.promo-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 25px;
  margin-top: 40px;
}

.promo-card {
  position: relative;
  border-radius: 25px;
  overflow: hidden;
  background: #fff;
  box-shadow: 0 10px 30px rgba(108, 92, 231, 0.1);
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.promo-card:hover {
  transform: translateY(-15px);
  box-shadow: 0 20px 40px rgba(108, 92, 231, 0.15);
}

.promo-image {
  position: relative;
  height: 250px;
  overflow: hidden;
}

.promo-card-big .promo-image {
  height: 400px;
}

.promo-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.promo-card:hover .promo-image img {
  transform: scale(1.1);
}

.promo-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.7));
}

.promo-content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 30px;
  color: #fff;
}

.promo-tag {
  display: inline-block;
  padding: 8px 16px;
  background: rgba(108, 92, 231, 0.9);
  border-radius: 50px;
  font-size: 0.9rem;
  font-weight: 500;
  margin-bottom: 15px;
}

.promo-content h3 {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 10px;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.promo-content p {
  font-size: 1.1rem;
  opacity: 0.9;
  margin-bottom: 20px;
}

.btn-promo {
  background: #fff;
  color: #6c5ce7;
  border: none;
  padding: 12px 25px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 1rem;
  transition: all 0.3s ease;
  cursor: pointer;
}

.btn-promo:hover {
  background: #6c5ce7;
  color: #fff;
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

@media (max-width: 1200px) {
  .promo-grid {
    grid-template-columns: 1fr 1fr;
  }
  
  .promo-card-big {
    grid-column: 1 / -1;
  }
}

@media (max-width: 768px) {
  .promo-grid {
    grid-template-columns: 1fr;
  }
  
  .promo-card-big .promo-image {
    height: 300px;
  }
  
  .promo-content h3 {
    font-size: 1.8rem;
  }
}

/* Contact */
/* ====== CONTACT SECTION ====== */
.contact-section {
  padding: 80px 0;
  background: linear-gradient(135deg, #f6f8fd, #f1f4f9);
  margin: 50px 0;
  border-radius: 40px;
}

.contact-wrapper {
  display: grid;
  grid-template-columns: 1fr 1.5fr;
  gap: 50px;
  margin-top: 50px;
}

.contact-info {
  display: grid;
  gap: 30px;
}

.info-card {
  background: #fff;
  padding: 30px;
  border-radius: 25px;
  box-shadow: 0 10px 30px rgba(108, 92, 231, 0.1);
  transition: all 0.3s ease;
}

.info-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(108, 92, 231, 0.15);
}

.info-card .icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #6c5ce7, #a363d9);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
}

.info-card .icon i {
  font-size: 24px;
  color: #fff;
}

.info-card h3 {
  font-size: 1.4rem;
  color: #2d3436;
  margin-bottom: 15px;
}

.info-card p {
  color: #636e72;
  line-height: 1.6;
}

.contact-form {
  background: #fff;
  padding: 40px;
  border-radius: 25px;
  box-shadow: 0 10px 30px rgba(108, 92, 231, 0.1);
}

.form-group {
  margin-bottom: 20px;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 15px;
  border: 2px solid #e0e0e0;
  border-radius: 15px;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus {
  border-color: #6c5ce7;
  outline: none;
  box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
}

.btn-submit {
  background: linear-gradient(135deg, #6c5ce7, #a363d9);
  color: #fff;
  border: none;
  padding: 15px 30px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 1.1rem;
  width: 100%;
  cursor: pointer;
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
  box-shadow: 0 4px 15px rgba(108, 92, 231, 0.2);
}

.btn-submit:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(108, 92, 231, 0.3);
  background: linear-gradient(135deg, #5b4cc2, #8f55c2);
}

@media (max-width: 992px) {
  .contact-wrapper {
    grid-template-columns: 1fr;
  }
  
  .contact-info {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 768px) {
  .contact-info {
    grid-template-columns: 1fr;
  }
  
  .contact-form {
    padding: 30px;
  }
}
/* Pizza Theme Popup */
.pizza-theme {
  background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
}

.pizza-box {
  position: relative;
  width: 120px;
  height: 120px;
  margin: 0 auto 2rem;
  animation: pizzaSpin 4s infinite linear;
}

@keyframes pizzaSpin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.pizza-slice {
  width: 100px;
  height: 100px;
  position: relative;
  margin: 0 auto;
}

.pizza-base {
  width: 100px;
  height: 100px;
  background: #ffd93d;
  border-radius: 50%;
  position: absolute;
  box-shadow: 0 8px 20px rgba(255, 217, 61, 0.4);
}

.pizza-cheese {
  width: 90px;
  height: 90px;
  background: #fff8dc;
  border-radius: 50%;
  position: absolute;
  top: 5px;
  left: 5px;
  opacity: 0.9;
}

.pizza-pepperoni {
  width: 15px;
  height: 15px;
  background: #d63031;
  border-radius: 50%;
  position: absolute;
  animation: pepperoniFloat 2s infinite ease-in-out;
}

.pizza-pepperoni:nth-child(3) {
  top: 20px;
  left: 30px;
  animation-delay: 0s;
}

.pepperoni-2 {
  top: 40px;
  right: 25px;
  animation-delay: 0.7s;
}

.pepperoni-3 {
  bottom: 25px;
  left: 35px;
  animation-delay: 1.4s;
}

@keyframes pepperoniFloat {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
}

.pizza-steam {
  position: absolute;
  top: -20px;
  left: 50%;
  transform: translateX(-50%);
}

.steam-line {
  width: 2px;
  height: 20px;
  background: rgba(255, 255, 255, 0.6);
  margin: 0 3px;
  display: inline-block;
  animation: steamRise 1.5s infinite ease-in-out;
  border-radius: 2px;
}

.steam-line:nth-child(1) {
  animation-delay: 0s;
}

.steam-line:nth-child(2) {
  animation-delay: 0.5s;
}

.steam-line:nth-child(3) {
  animation-delay: 1s;
}

@keyframes steamRise {
  0% {
    opacity: 0;
    transform: translateY(0px);
  }
  50% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    transform: translateY(-20px);
  }
}

.pizza-btn {
  background: #ff6b6b;
  color: white;
}

.pizza-btn:hover {
  background: #ff5252;
}

/* Burger Theme Popup */
.burger-theme {
  background: linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%);
}

.burger-box {
  position: relative;
  width: 140px;
  height: 120px;
  margin: 0 auto 2rem;
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  animation: burgerBounce 2s infinite ease-in-out;
}

@keyframes burgerBounce {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-8px);
  }
}

.burger-stack {
  position: relative;
  width: 60px;
  height: 80px;
}

.burger-bun-top {
  width: 60px;
  height: 20px;
  background: #daa520;
  border-radius: 30px 30px 10px 10px;
  position: absolute;
  top: 0;
  box-shadow: 0 2px 8px rgba(218, 165, 32, 0.4);
}

.burger-bun-top::before {
  content: '';
  position: absolute;
  top: 5px;
  left: 15px;
  width: 3px;
  height: 3px;
  background: #8b4513;
  border-radius: 50%;
  box-shadow: 10px 0 #8b4513, 20px 2px #8b4513;
}

.burger-lettuce {
  width: 55px;
  height: 8px;
  background: #228b22;
  border-radius: 5px;
  position: absolute;
  top: 18px;
  left: 2px;
  opacity: 0.8;
}

.burger-tomato {
  width: 50px;
  height: 6px;
  background: #ff6347;
  border-radius: 3px;
  position: absolute;
  top: 25px;
  left: 5px;
}

.burger-patty {
  width: 55px;
  height: 12px;
  background: #8b4513;
  border-radius: 5px;
  position: absolute;
  top: 32px;
  left: 2px;
  box-shadow: 0 2px 6px rgba(139, 69, 19, 0.4);
}

.burger-cheese {
  width: 50px;
  height: 8px;
  background: #ffd700;
  border-radius: 3px;
  position: absolute;
  top: 42px;
  left: 5px;
  opacity: 0.9;
}

.burger-bun-bottom {
  width: 60px;
  height: 15px;
  background: #daa520;
  border-radius: 10px 10px 20px 20px;
  position: absolute;
  bottom: 0;
  box-shadow: 0 4px 10px rgba(218, 165, 32, 0.4);
}

.burger-fries {
  position: relative;
  width: 30px;
  height: 60px;
  margin-left: 10px;
}

.fry {
  width: 4px;
  height: 25px;
  background: #ffd700;
  position: absolute;
  border-radius: 2px;
  animation: fryWiggle 1.5s infinite ease-in-out;
}

.fry:nth-child(1) {
  left: 5px;
  height: 30px;
  animation-delay: 0s;
}

.fry:nth-child(2) {
  left: 12px;
  height: 25px;
  animation-delay: 0.3s;
}

.fry:nth-child(3) {
  left: 19px;
  height: 28px;
  animation-delay: 0.6s;
}

.fry:nth-child(4) {
  left: 26px;
  height: 22px;
  animation-delay: 0.9s;
}

@keyframes fryWiggle {
  0%, 100% {
    transform: rotate(0deg);
  }
  25% {
    transform: rotate(2deg);
  }
  75% {
    transform: rotate(-2deg);
  }
}

.burger-drink {
  position: relative;
  width: 20px;
  height: 40px;
  margin-left: 5px;
}

.cup {
  width: 20px;
  height: 30px;
  background: linear-gradient(to bottom, #ff6b6b, #ff5252);
  border-radius: 0 0 8px 8px;
  position: absolute;
  bottom: 0;
}

.cup::before {
  content: '';
  position: absolute;
  top: -5px;
  left: 2px;
  width: 16px;
  height: 8px;
  background: #fff;
  border-radius: 8px 8px 0 0;
}

.straw {
  width: 3px;
  height: 45px;
  background: #ff1744;
  position: absolute;
  top: -15px;
  right: 5px;
  border-radius: 2px;
  animation: strawBend 2s infinite ease-in-out;
}

@keyframes strawBend {
  0%, 100% {
    transform: rotate(0deg);
  }
  50% {
    transform: rotate(5deg);
  }
}

.burger-btn {
  background: #fd79a8;
  color: white;
}

.burger-btn:hover {
  background: #e84393;
}

/* Responsive adjustments for new popups */
@media (max-width: 480px) {
  .pizza-box,
  .burger-box {
    width: 100px;
    height: 100px;
  }
  
  .pizza-slice {
    width: 80px;
    height: 80px;
  }
  
  .pizza-base {
    width: 80px;
    height: 80px;
  }
  
  .pizza-cheese {
    width: 70px;
    height: 70px;
  }
  
  .burger-stack {
    width: 50px;
    height: 70px;
  }
  
  .burger-fries {
    width: 25px;
    height: 50px;
  }
  
  .burger-drink {
    width: 15px;
    height: 35px;
  }
}

/* Gift Popup Styles */
.gift-popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 10000;
  backdrop-filter: blur(5px);
}

.gift-popup {
  background: linear-gradient(135deg, #8B5CF6 0%, #A855F7 100%);
  border-radius: 20px;
  padding: 2rem;
  text-align: center;
  position: relative;
  max-width: 400px;
  width: 90%;
  box-shadow: 0 20px 60px rgba(139, 92, 246, 0.4);
  animation: popupAppear 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

@keyframes popupAppear {
  0% {
    opacity: 0;
    transform: scale(0.3) rotate(-10deg);
  }
  100% {
    opacity: 1;
    transform: scale(1) rotate(0deg);
  }
}

.gift-box {
  position: relative;
  width: 120px;
  height: 120px;
  margin: 0 auto 2rem;
  animation: giftBounce 2s infinite ease-in-out;
}

@keyframes giftBounce {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-10px);
  }
}

.gift-body {
  width: 100px;
  height: 80px;
  background: linear-gradient(45deg, #ff6b6b, #feca57);
  border-radius: 10px;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
}

.gift-lid {
  width: 110px;
  height: 30px;
  background: linear-gradient(45deg, #ff4757, #ff3838);
  border-radius: 10px;
  position: absolute;
  top: 40px;
  left: 50%;
  transform: translateX(-50%);
  box-shadow: 0 4px 15px rgba(255, 71, 87, 0.4);
  animation: lidOpen 3s infinite;
}

@keyframes lidOpen {
  0%, 80%, 100% {
    transform: translateX(-50%) rotateX(0deg);
  }
  85%, 95% {
    transform: translateX(-50%) rotateX(-20deg);
  }
}

.gift-bow {
  width: 40px;
  height: 20px;
  background: #ff3838;
  border-radius: 50%;
  position: absolute;
  top: -10px;
  left: 50%;
  transform: translateX(-50%);
}

.gift-bow::before,
.gift-bow::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 15px;
  background: #ff3838;
  border-radius: 50% 10px 50% 10px;
  top: 2px;
}

.gift-bow::before {
  left: -15px;
  transform: rotate(-45deg);
}

.gift-bow::after {
  right: -15px;
  transform: rotate(45deg);
}

.gift-sparkles {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

.sparkle {
  position: absolute;
  width: 6px;
  height: 6px;
  background: #ffd700;
  border-radius: 50%;
  animation: sparkleFloat 2s infinite ease-in-out;
}

.sparkle:nth-child(1) {
  top: 10px;
  left: 20px;
  animation-delay: 0s;
}

.sparkle:nth-child(2) {
  top: 30px;
  right: 15px;
  animation-delay: 0.4s;
}

.sparkle:nth-child(3) {
  bottom: 20px;
  left: 10px;
  animation-delay: 0.8s;
}

.sparkle:nth-child(4) {
  bottom: 40px;
  right: 20px;
  animation-delay: 1.2s;
}

.sparkle:nth-child(5) {
  top: 50%;
  left: -10px;
  animation-delay: 1.6s;
}

@keyframes sparkleFloat {
  0%, 100% {
    opacity: 0;
    transform: translateY(0px) scale(0);
  }
  50% {
    opacity: 1;
    transform: translateY(-20px) scale(1);
  }
}

.gift-content {
  color: white;
}

.gift-content h2 {
  font-size: 2rem;
  margin-bottom: 1rem;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.gift-content p {
  margin-bottom: 0.5rem;
  opacity: 0.9;
}

.gift-message {
  font-weight: 600;
  font-size: 1.1rem;
  margin-bottom: 2rem !important;
  color: #ffd700;
}

.claim-gift-btn {
  background: white;
  color: #8B5CF6;
  border: none;
  padding: 1rem 2rem;
  border-radius: 25px;
  font-weight: 700;
  font-size: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
}

.claim-gift-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(255, 255, 255, 0.4);
  background: #f8f9fa;
}

.close-popup {
  position: absolute;
  top: 15px;
  right: 20px;
  background: none;
  border: none;
  color: white;
  font-size: 2rem;
  cursor: pointer;
  opacity: 0.7;
  transition: opacity 0.3s ease;
}

.close-popup:hover {
  opacity: 1;
}

/* Responsive */
@media (max-width: 480px) {
  .gift-popup {
    padding: 1.5rem;
    margin: 1rem;
  }
  
  .gift-box {
    width: 100px;
    height: 100px;
  }
  
  .gift-body {
    width: 80px;
    height: 60px;
  }
  
  .gift-lid {
    width: 90px;
    height: 25px;
  }
  
  .gift-content h2 {
    font-size: 1.5rem;
  }
}
</style>

</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">FoodMarket</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="/promo">Promo</a></li>
          <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
          <li class="nav-item">
            <a class="nav-link" href="/ai">AI Assistant</a>
          </li>
          <!-- Profile Dropdown -->
          <li class="nav-item dropdown profile-dropdown">
            <a class="profile-btn dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="profile-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
              </div>
              <div class="profile-info">
                <div class="profile-name">{{ auth()->user()->name }}</div>
                <div class="profile-email">{{ auth()->user()->email }}</div>
              </div>
              <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <li class="dropdown-header">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-email">{{ auth()->user()->email }}</div>
              </li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profil Saya</a></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-bag"></i> Pesanan Saya</a></li>
              <li><a class="dropdown-item" href="/my-favorites"><i class="fas fa-heart"></i> Favorit</a></li>
              <li><a class="dropdown-item" href="{{ route('user.messages') }}"><i class="fas fa-envelope"></i> Pesan Saya</a></li>
              <li><a class="dropdown-item" href="/admin/pengaturan"><i class="fas fa-cog"></i> Pengaturan</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                  @csrf
                  <button type="submit" class="dropdown-item logout-item" style="border: none; background: none; width: 100%; text-align: left;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="container">
    <div class="hero">
      <div class="hero-content">
        <h1>Nikmati Kelezatan Setiap Gigitan</h1>
        <p>Temukan berbagai pilihan makanan lezat dari restoran terbaik di kotamu</p>
        <a href="#" class="hero-btn">Jelajahi Menu</a>
      </div>
    </div>
  </div>

 <!-- Flash Sale Section -->
<div class="container-fluid px-4">
  <div class="flash-sale">
    <div class="flash-sale-header d-flex justify-content-between align-items-center mb-4">
      <div class="flash-sale-title d-flex align-items-center">
        <i class="fas fa-bolt me-2"></i>
        <h2 class="m-0">Flash Sale</h2>
      </div>
      <div class="flash-sale-timer" id="flashSaleTimer">
        Berakhir dalam: <span id="hours">02</span>:<span id="minutes">15</span>:<span id="seconds">43</span>
      </div>
    </div>
    
    <div class="flash-sale-carousel position-relative">
      <button class="carousel-control prev" onclick="slideProducts(-1)">
        <i class="fas fa-chevron-left"></i>
      </button>
      
      <div class="product-slider" id="productSlider">
        <div class="product-track" id="productTrack">
          <!-- Repeat this card structure for each product -->
          <div class="product-card">
            <div class="card-image">
              <img src="https://cdn0-production-images-kly.akamaized.net/gukmiW6FdHCNTrXO4RhNZvsD0XM=/0x0:4545x2562/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4078801/original/082199100_1656987442-ilya-mashkov-_qxbJUr9RqI-unsplash.jpg" alt="Burger Spesial">
            </div>
            <div class="card-body">
              <h5 class="product-title">Burger Spesial</h5>
              <div class="price-wrapper">
                <del class="original-price">Rp50.000</del>
                <div class="sale-price">Rp30.000</div>
              </div>
              <button class="btn btn-cart">Beli Sekarang</button>
            </div>
          </div>
          <div class="product-card">
            <div class="card-image">
              <img src="https://www.allrecipes.com/thmb/aefJMDXKqs42oAP71dQuYf_-Qdc=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/6776_Pizza-Dough_ddmfs_4x3_1724-fd91f26e0bd6400a9e89c6866336532b.jpg" alt="Burger Spesial">
            </div>
            <div class="card-body">
              <h5 class="product-title">Pizza Spesial</h5>
              <div class="price-wrapper">
                <del class="original-price">Rp90.000</del>
                <div class="sale-price">Rp75.000</div>
              </div>
              <button class="btn btn-cart">Beli Sekarang</button>
            </div>
          </div>
           <div class="product-card">
            <div class="card-image">
              <img src="https://cdn.rri.co.id/berita/Nunukan/o/1731055308447-Screenshot_20241107_113612_Chrome/81mu8lxuqzmcxhl.jpeg" alt="Burger Spesial">
            </div>
            <div class="card-body">
              <h5 class="product-title">Spagetti Spesial</h5>
              <div class="price-wrapper">
                <del class="original-price">Rp50.000</del>
                <div class="sale-price">Rp30.000</div>
              </div>
              <button class="btn btn-cart">Beli Sekarang</button>
            </div>
          </div>
           <div class="product-card">
            <div class="card-image">
              <img src="https://www.kikkoman.eu/fileadmin/_processed_/4/2/csm_sushi-kakkoii_2c56fe3133.webp" alt="Burger Spesial">
            </div>
            <div class="card-body">
              <h5 class="product-title">Sushi Spesial</h5>
              <div class="price-wrapper">
                <del class="original-price">Rp50.000</del>
                <div class="sale-price">Rp30.000</div>
              </div>
              <button class="btn btn-cart">Beli Sekarang</button>
            </div>
          </div>
           <div class="product-card">
            <div class="card-image">
              <img src="https://buckets.sasa.co.id/v1/AUTH_Assets/Assets/p/website/medias/page_medias/cara_membuat_ramen.jpg" alt="Burger Spesial">
            </div>
            <div class="card-body">
              <h5 class="product-title">Ramen Spesial</h5>
              <div class="price-wrapper">
                <del class="original-price">Rp50.000</del>
                <div class="sale-price">Rp30.000</div>
              </div>
              <button class="btn btn-cart">Beli Sekarang</button>
            </div>
          </div>
           <div class="product-card">
            <div class="card-image">
              <img src="https://www.glorimelamine.com/wp-content/uploads/Resep-Masak-Shashimi-Sederhana-di-Rumah.jpg" alt="Burger Spesial">
            </div>
            <div class="card-body">
              <h5 class="product-title">Sashimi Spesial</h5>
              <div class="price-wrapper">
                <del class="original-price">Rp50.000</del>
                <div class="sale-price">Rp30.000</div>
              </div>
              <button class="btn btn-cart">Beli Sekarang</button>
            </div>
          </div>
           <div class="product-card">
            <div class="card-image">
              <img src="https://asset.kompas.com/crops/VcgvggZKE2VHqIAUp1pyHFXXYCs=/202x66:1000x599/1200x800/data/photo/2023/05/07/6456a450d2edd.jpg" alt="Burger Spesial">
            </div>
            <div class="card-body">
              <h5 class="product-title">Nasi Goreng Spesial</h5>
              <div class="price-wrapper">
                <del class="original-price">Rp50.000</del>
                <div class="sale-price">Rp30.000</div>
              </div>
              <button class="btn btn-cart">Beli Sekarang</button>
            </div>
          </div>
           <div class="product-card">
            <div class="card-image">
              <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,f_auto,q_auto:best,w_640/v1634025439/01hthbdr3e1kd248h3d9ecgfkq.jpg" alt="Burger Spesial">
            </div>
            <div class="card-body">
              <h5 class="product-title">Steak Spesial</h5>
              <div class="price-wrapper">
                <del class="original-price">Rp50.000</del>
                <div class="sale-price">Rp30.000</div>
              </div>
              <button class="btn btn-cart">Beli Sekarang</button>
            </div>
          </div>
        </div>
      </div>
      
      <button class="carousel-control next" onclick="slideProducts(1)">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
  </div>
</div>

  <!-- Menu Section -->
 <!-- Special Menu Section -->
<div class="special-menu">
  <div class="container">
    <div class="section-title">
      <h2>Menu Spesial</h2>
    </div>
    <div class="product-grid">
      <div class="product-card">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" alt="Steak Premium">
        <div class="card-body">
          <h5 class="product-title">Steak Premium</h5>
          <p class="product-description">Steak premium dengan daging Wagyu grade A5, disajikan dengan saus signature</p>
          <div class="product-price">Rp350.000</div>
          <button class="btn btn-cart">Pesan Sekarang</button>
        </div>
      </div>
      <div class="product-card">
        <img src="https://images.unsplash.com/photo-1548943487-a2e4e43b4853" alt="Seafood Royal Platter">
        <div class="card-body">
          <h5 class="product-title">Seafood Royal Platter</h5>
          <p class="product-description">Kombinasi lobster, king crab, dan udang tiger dengan saus spesial</p>
          <div class="product-price">Rp450.000</div>
          <button class="btn btn-cart">Pesan Sekarang</button>
        </div>
      </div>
      <div class="product-card">
        <img src="https://static.tripzilla.id/media/123677/conversions/d791cb75-9a56-40e5-8c31-2552d5572160-w768.webp" alt="Sushi Premium Set">
        <div class="card-body">
          <h5 class="product-title">Sushi Premium Set</h5>
          <p class="product-description">Set sushi premium dengan 24 potong sushi pilihan terbaik</p>
          <div class="product-price">Rp280.000</div>
          <button class="btn btn-cart">Pesan Sekarang</button>
        </div>
      </div>
      <div class="product-card">
        <img src="https://images.unsplash.com/photo-1551024709-8f23befc6f87" alt="Pasta Truffle">
        <div class="card-body">
          <h5 class="product-title">Pasta Truffle</h5>
          <p class="product-description">Pasta dengan jamur truffle hitam dan saus krim spesial</p>
          <div class="product-price">Rp180.000</div>
          <button class="btn btn-cart">Pesan Sekarang</button>
        </div>
      </div>
    </div>
  </div>
</div>
    
    
    <!-- Hidden Menu Items -->
<section class="hidden-menu" id="hiddenMenu">
  <div class="container">
    <div class="product-grid">
      <div class="product-card">
        <img src="images/pasta.jpg" alt="Pasta Truffle">
        <div class="card-body">
          <h3 class="product-title">Pasta Truffle</h3>
          <p class="product-description">Pasta dengan jamur truffle hitam dan saus cream spesial</p>
          <div class="product-price">Rp250.000</div>
          <button class="btn-cart">Pesan Sekarang</button>
        </div>
      </div>
         <div class="product-card">
        <img src="images/pasta.jpg" alt="Pasta Truffle">
        <div class="card-body">
          <h3 class="product-title">Pasta Truffle</h3>
          <p class="product-description">Pasta dengan jamur truffle hitam dan saus cream spesial</p>
          <div class="product-price">Rp250.000</div>
          <button class="btn-cart">Pesan Sekarang</button>
        </div>
    </div>
       <div class="product-card">
        <img src="images/pasta.jpg" alt="Pasta Truffle">
        <div class="card-body">
          <h3 class="product-title">Pasta Truffle</h3>
          <p class="product-description">Pasta dengan jamur truffle hitam dan saus cream spesial</p>
          <div class="product-price">Rp250.000</div>
          <button class="btn-cart">Pesan Sekarang</button>
        </div>
  </div>
     <div class="product-card">
        <img src="images/pasta.jpg" alt="Pasta Truffle">
        <div class="card-body">
          <h3 class="product-title">Pasta Truffle</h3>
          <p class="product-description">Pasta dengan jamur truffle hitam dan saus cream spesial</p>
          <div class="product-price">Rp250.000</div>
          <button class="btn-cart">Pesan Sekarang</button>
        </div>
</section>

      
    </div>
    </div>
    <div class="view-more-btn">
      <button id="viewMoreBtn" onclick="toggleMenu()">Lihat Selengkapnya</button>
    </div>
  </div>
</div>

<!-- Promo Section -->
<section class="promo-section">
  <div class="container">
    <div class="section-title">
      <h2>Promo Spesial</h2>
      <p>Nikmati berbagai penawaran menarik untuk anda</p>
    </div>
    
    <div class="promo-grid">
      <!-- Promo Card 1 - Big -->
      <div class="promo-card promo-card-big">
        <div class="promo-image">
          <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" alt="Promo Spesial">
          <div class="promo-overlay"></div>
        </div>
        <div class="promo-content">
          <span class="promo-tag">Terbatas</span>
          <h3>Diskon 50%</h3>
          <p>Untuk pembelian pertama anda</p>
          <button class="btn-promo">Klaim Sekarang</button>
        </div>
      </div>
      
      <!-- Promo Card 2 -->
      <div class="promo-card">
        <div class="promo-image">
          <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/5f482ade-f50c-4e52-a502-4988e95cb37d_phdala-carte-cheese-rizz-fa_ooh-cheese_1x1-1746436187178.jpg?auto=format" alt="Pizza Promo">
          <div class="promo-overlay"></div>
        </div>
        <div class="promo-content">
          <span class="promo-tag">Hot Deal</span>
          <h3>Buy 1 Get 1</h3>
          <p>Pizza spesial untuk hari ini</p>
          <button class="btn-promo" data-promo="pizza">Ambil Sekarang</button>
        </div>
      </div>

      <!-- Promo Card 3 -->
      <div class="promo-card">
        <div class="promo-image">
          <img src="https://images.unsplash.com/photo-1551782450-a2132b4ba21d" alt="Burger Promo">
          <div class="promo-overlay"></div>
        </div>
        <div class="promo-content">
          <span class="promo-tag">Limited</span>
          <h3>Paket Hemat</h3>
          <p>Burger + Fries + Drink</p>
          <button class="btn-promo" data-promo="burger">Dapatkan Sekarang</button>
        </div>
      </div>
    </div>
  </div>
</section>

 @if(session('success'))
    <div id="successNotification" style="
        position: fixed;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 20px 25px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(40, 167, 69, 0.3);
        z-index: 9999;
        max-width: 400px;
        animation: slideInRight 0.5s ease-out;
    ">
        <div style="display: flex; align-items: center; gap: 15px;">
            <i class="fas fa-check-circle" style="font-size: 24px;"></i>
            <div>
                <h4 style="margin: 0 0 5px 0; font-size: 16px;">Pesan Terkirim!</h4>
                <p style="margin: 0; font-size: 14px; opacity: 0.9;">{{ session('success') }}</p>
            </div>
            <button onclick="closeNotification()" style="
                background: none;
                border: none;
                color: white;
                font-size: 18px;
                cursor: pointer;
                opacity: 0.7;
                transition: opacity 0.3s;
            ">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <style>
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>
    
    <script>
        function closeNotification() {
            const notification = document.getElementById('successNotification');
            notification.style.animation = 'slideOutRight 0.5s ease-out';
            setTimeout(() => {
                notification.remove();
            }, 500);
        }
        
        // Auto close after 5 seconds
        setTimeout(() => {
            const notification = document.getElementById('successNotification');
            if (notification) {
                closeNotification();
            }
        }, 5000);
    </script>
@endif

<section class="contact-section">
    <div class="container">
        <div class="section-title">
            <h2>Hubungi Kami</h2>
            <p>Kami siap membantu anda 24/7</p>
        </div>

        <div class="contact-wrapper">
            <div class="contact-info">
                <div class="info-card">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Alamat</h3>
                    <p>Jl. Raya Foodmarket No. 123<br>Jakarta Selatan, 12345</p>
                </div>

                <div class="info-card">
                    <div class="icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Telepon</h3>
                    <p>+62 21 1234 5678<br>+62 812 3456 7890</p>
                </div>

                <div class="info-card">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>info@foodmarket.com<br>support@foodmarket.com</p>
                </div>
            </div>

            <div class="contact-form">
                <form method="POST" action="{{ route('messages.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        @error('name')
                            <small style="color: red; display: block; margin-top: 5px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <small style="color: red; display: block; margin-top: 5px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Nomor Telepon" value="{{ old('phone') }}" required>
                        @error('phone')
                            <small style="color: red; display: block; margin-top: 5px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Tulis pesan Anda di sini... (contoh: Saya ingin menanyakan tentang menu spesial hari ini)" rows="5" required>{{ old('message') }}</textarea>
                        @error('message')
                            <small style="color: red; display: block; margin-top: 5px;">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h5>Tentang Kami</h5>
          <ul>
            <li><a href="{{ route('company.profile') }}">Profil Perusahaan</a></li>
            <li><a href="{{ route('career') }}">Karir</a></li>
            <li><a href="https://foodmarketblog.blogspot.com/">Blog</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h5>Layanan</h5>
          <ul>
            <li><a href="#">Cara Pemesanan</a></li>
            <li><a href="#">Metode Pembayaran</a></li>
            <li><a href="#">Kebijakan Pengiriman</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h5>Hubungi Kami</h5>
          <ul>
            <li><a href="mailto:support@foodmarket.com">support@foodmarket.com</a></li>
            <li><a href="tel:081234567890">0812-3456-7890</a></li>
          </ul>
        </div>
      </div>
      <div class="text-center">
        <p>&copy; 2025 FoodMarket. Semua Hak Dilindungi.</p>
      </div>
    </div>
  </footer>

  <!-- Pizza Popup Modal -->
<div id="pizzaPopup" class="gift-popup-overlay">
  <div class="gift-popup pizza-theme">
    <div class="pizza-box">
      <div class="pizza-slice">
        <div class="pizza-base"></div>
        <div class="pizza-cheese"></div>
        <div class="pizza-pepperoni"></div>
        <div class="pizza-pepperoni pepperoni-2"></div>
        <div class="pizza-pepperoni pepperoni-3"></div>
      </div>
      <div class="pizza-steam">
        <div class="steam-line"></div>
        <div class="steam-line"></div>
        <div class="steam-line"></div>
      </div>
    </div>
    <div class="gift-content">
      <h2>🍕 Fantastic!</h2>
      <p>Promo Buy 1 Get 1 Pizza berhasil diklaim!</p>
      <p class="gift-message">Nikmati 2 pizza dengan harga 1 pizza</p>
      <button class="claim-gift-btn pizza-btn">Lihat Menu Pizza</button>
    </div>
    <button class="close-popup" data-popup="pizzaPopup">&times;</button>
  </div>
</div>

<!-- Burger Popup Modal -->
<div id="burgerPopup" class="gift-popup-overlay">
  <div class="gift-popup burger-theme">
    <div class="burger-box">
      <div class="burger-stack">
        <div class="burger-bun-top"></div>
        <div class="burger-lettuce"></div>
        <div class="burger-tomato"></div>
        <div class="burger-patty"></div>
        <div class="burger-cheese"></div>
        <div class="burger-bun-bottom"></div>
      </div>
      <div class="burger-fries">
        <div class="fry"></div>
        <div class="fry"></div>
        <div class="fry"></div>
        <div class="fry"></div>
      </div>
      <div class="burger-drink">
        <div class="cup"></div>
        <div class="straw"></div>
      </div>
    </div>
    <div class="gift-content">
      <h2>🍔 Awesome!</h2>
      <p>Paket Hemat Burger berhasil diklaim!</p>
      <p class="gift-message">Burger + Kentang + Minuman dalam satu paket</p>
      <button class="claim-gift-btn burger-btn">Lihat Paket Lengkap</button>
    </div>
    <button class="close-popup" data-popup="burgerPopup">&times;</button>
  </div>
</div>

  <!-- Popup Kado Modal -->
<div id="giftPopup" class="gift-popup-overlay">
  <div class="gift-popup">
    <div class="gift-box">
      <div class="gift-lid">
        <div class="gift-bow"></div>
      </div>
      <div class="gift-body"></div>
      <div class="gift-sparkles">
        <div class="sparkle"></div>
        <div class="sparkle"></div>
        <div class="sparkle"></div>
        <div class="sparkle"></div>
        <div class="sparkle"></div>
      </div>
    </div>
    <div class="gift-content">
      <h2>🎉 Selamat!</h2>
      <p>Anda berhasil mengklaim promo spesial!</p>
      <p class="gift-message">Diskon 50% untuk pembelian pertama Anda telah aktif</p>
      <button class="claim-gift-btn diskon-btn">Lihat Semua Promo</button>
    </div>
    <button class="close-popup" id="closeGiftPopup">&times;</button>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Tambahkan script ini sebelum tag penutup body -->
  <script>
  function updateTimer() {
    const timerElement = document.getElementById('flashSaleTimer');
    const hoursElement = document.getElementById('hours');
    const minutesElement = document.getElementById('minutes');
    const secondsElement = document.getElementById('seconds');
  
    let hours = parseInt(hoursElement.textContent);
    let minutes = parseInt(minutesElement.textContent);
    let seconds = parseInt(secondsElement.textContent);
  
    const countdown = setInterval(() => {
      if (seconds > 0) {
        seconds--;
      } else {
        if (minutes > 0) {
          minutes--;
          seconds = 59;
        } else {
          if (hours > 0) {
            hours--;
            minutes = 59;
            seconds = 59;
          } else {
            clearInterval(countdown);
            timerElement.innerHTML = '<span class="text-danger">Flash Sale Berakhir!</span>';
            return;
          }
        }
      }
  
      hoursElement.textContent = hours.toString().padStart(2, '0');
      minutesElement.textContent = minutes.toString().padStart(2, '0');
      secondsElement.textContent = seconds.toString().padStart(2, '0');
    }, 1000);
  }
  
  // Jalankan timer saat halaman dimuat
  document.addEventListener('DOMContentLoaded', updateTimer);

function toggleMenu() {
  const hiddenMenu = document.getElementById('hiddenMenu');
  const viewMoreBtn = document.getElementById('viewMoreBtn');
  
  hiddenMenu.classList.toggle('show');
  
  if (hiddenMenu.classList.contains('show')) {
    viewMoreBtn.textContent = 'Lihat Lebih Sedikit';
    // Scroll ke menu yang baru muncul
    hiddenMenu.scrollIntoView({ behavior: 'smooth', block: 'start' });
  } else {
    viewMoreBtn.textContent = 'Lihat Selengkapnya';
  }
}
function slideProducts(direction) {
  const container = document.getElementById('productContainer');
  const cardWidth = 300; // Width of card + gap
  const scrollAmount = cardWidth * direction;
  container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
}

const productTrack = document.getElementById('productTrack');
let currentPosition = 0;
const cardWidth = 320; // card width + gap

function slideProducts(direction) {
  const maxScroll = productTrack.scrollWidth - productTrack.clientWidth;
  currentPosition = Math.max(Math.min(currentPosition - (cardWidth * direction), 0), -maxScroll);
  productTrack.style.transform = `translateX(${currentPosition}px)`;
}

// Touch support
let startX = 0;
let scrollLeft = 0;
let isDown = false;

productTrack.addEventListener('mousedown', e => {
  isDown = true;
  startX = e.pageX - productTrack.offsetLeft;
  scrollLeft = currentPosition;
});

productTrack.addEventListener('mouseleave', () => {
  isDown = false;
});

productTrack.addEventListener('mouseup', () => {
  isDown = false;
});

productTrack.addEventListener('mousemove', e => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - productTrack.offsetLeft;
  const walk = (x - startX);
  currentPosition = Math.max(Math.min(scrollLeft + walk, 0), -(productTrack.scrollWidth - productTrack.clientWidth));
  productTrack.style.transform = `translateX(${currentPosition}px)`;
});

// Touch events
productTrack.addEventListener('touchstart', e => {
  startX = e.touches[0].pageX - productTrack.offsetLeft;
  scrollLeft = currentPosition;
});

productTrack.addEventListener('touchmove', e => {
  if (e.touches.length !== 1) return;
  const x = e.touches[0].pageX - productTrack.offsetLeft;
  const walk = (x - startX);
  currentPosition = Math.max(Math.min(scrollLeft + walk, 0), -(productTrack.scrollWidth - productTrack.clientWidth));
  productTrack.style.transform = `translateX(${currentPosition}px)`;
});

// Gift Popup Functionality
document.addEventListener('DOMContentLoaded', function() {
  // Get all popup elements
  const pizzaPopup = document.getElementById('pizzaPopup');
  const burgerPopup = document.getElementById('burgerPopup');
  
  // Get all promo buttons
  const promoButtons = document.querySelectorAll('.btn-promo');
  
  // Add click event to all promo buttons
  promoButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      const promoType = this.getAttribute('data-promo');
      let targetPopup;
      
      // Determine which popup to show based on data-promo attribute
      switch(promoType) {
        case 'pizza':
          targetPopup = pizzaPopup;
          break;
        case 'burger':
          targetPopup = burgerPopup;
          break;
        default:
          // For the original gift popup (no data-promo attribute)
          targetPopup = document.getElementById('giftPopup');
          break;
      }
      
      if (targetPopup) {
        // Show the popup
        targetPopup.style.display = 'flex';
        
        // Add body scroll lock
        document.body.style.overflow = 'hidden';
        
        // Auto close after 10 seconds
        setTimeout(() => {
          if (targetPopup.style.display === 'flex') {
            closePopup(targetPopup);
          }
        }, 10000);
      }
    });
  });
  
  // Close popup function
  function closePopup(popup) {
    popup.style.display = 'none';
    document.body.style.overflow = 'auto';
  }
  
  // Add close functionality to all close buttons
  document.querySelectorAll('.close-popup').forEach(closeBtn => {
    closeBtn.addEventListener('click', function() {
      const popupId = this.getAttribute('data-popup');
      const popup = popupId ? document.getElementById(popupId) : this.closest('.gift-popup-overlay');
      closePopup(popup);
    });
  });
  
  // Close popup when clicking outside
  [pizzaPopup, burgerPopup].forEach(popup => {
    if (popup) {
      popup.addEventListener('click', function(e) {
        if (e.target === popup) {
          closePopup(popup);
        }
      });
    }
  });
  
  // Redirect functionality for new popup buttons
  const pizzaBtn = document.querySelector('.pizza-btn');
  const burgerBtn = document.querySelector('.burger-btn');
  const diskonBtn = document.querySelector('.diskon-btn');
  
  
  if (pizzaBtn) {
    pizzaBtn.addEventListener('click', function() {
      setTimeout(() => {
        window.location.href = '/promo';
      }, 300);
    });
  }
  
  if (burgerBtn) {
    burgerBtn.addEventListener('click', function() {
      setTimeout(() => {
        window.location.href = '/promo';
      }, 300);
    });
  }
    if (diskonBtn) {
    diskonBtn.addEventListener('click', function() {
      setTimeout(() => {
        window.location.href = '/promo';
      }, 300);
    });
  }
  
  // Enhanced Escape key functionality
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      const openPopups = document.querySelectorAll('.gift-popup-overlay[style*="flex"]');
      openPopups.forEach(popup => {
        closePopup(popup);
      });
    }
  });
});
</script>
  </body>
  </html>
