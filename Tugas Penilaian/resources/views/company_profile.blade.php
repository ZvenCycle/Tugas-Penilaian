<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Perusahaan - FoodMarket</title>
    
    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#7c3aed">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="FoodMarket">
    <meta name="description" content="Platform kuliner terdepan dengan teknologi modern dan layanan terbaik">
    <meta name="keywords" content="food, restaurant, delivery, catering, foodmarket">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="/manifest.json">
    
    <!-- PWA Icons -->
    <link rel="apple-touch-icon" href="/images/icons/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/icon-16x16.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* Enhanced Premium Search Results Styles */
        .kyou-search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.1);
            max-height: 500px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
            margin-top: 8px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .kyou-search-results::-webkit-scrollbar {
            width: 6px;
        }

        .kyou-search-results::-webkit-scrollbar-track {
            background: transparent;
        }

        .kyou-search-results::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            border-radius: 10px;
        }

        .kyou-search-result-item {
            padding: 20px 25px;
            border-bottom: 1px solid rgba(226, 232, 240, 0.3);
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            background: transparent;
        }

        .kyou-search-result-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(124, 58, 237, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .kyou-search-result-item:hover::before {
            left: 100%;
        }

        .kyou-search-result-item:hover {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
            transform: translateX(8px) translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.15);
            border-left: 4px solid var(--primary);
        }

        .kyou-search-result-item:last-child {
            border-bottom: none;
        }

        .kyou-search-result-item.highlighted {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%) !important;
            border-left: 4px solid var(--primary);
            transform: translateX(8px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.2);
        }

        .kyou-search-result-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            line-height: 1.4;
        }

        .kyou-search-result-title i {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 8px;
            font-size: 10px;
            flex-shrink: 0;
        }

        .kyou-search-result-desc {
            font-size: 14px;
            color: #64748b;
            margin: 0 0 12px 0;
            line-height: 1.6;
            padding-left: 30px;
        }

        .kyou-search-result-category {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            background: linear-gradient(45deg, var(--accent-light), rgba(124, 58, 237, 0.1));
            color: var(--primary);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 30px;
            border: 1px solid rgba(124, 58, 237, 0.2);
            transition: all 0.3s ease;
        }

        .kyou-search-result-category::before {
            content: '•';
            margin-right: 6px;
            color: var(--secondary);
            font-weight: bold;
        }

        .kyou-search-result-item:hover .kyou-search-result-category {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            transform: scale(1.05);
        }

        /* Enhanced Search Loading */
        .kyou-search-loading {
            padding: 30px 20px;
            text-align: center;
            color: #64748b;
            font-size: 14px;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
        }

        .kyou-search-loading i {
            margin-right: 10px;
            color: var(--primary);
            font-size: 16px;
        }

        /* No Results Styling */
        .kyou-search-no-results {
            padding: 30px 25px;
            text-align: center;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.05) 0%, rgba(245, 158, 11, 0.05) 100%);
        }

        .kyou-search-no-results .kyou-search-result-title {
            justify-content: center;
            color: #f59e0b;
            margin-bottom: 12px;
        }

        .kyou-search-no-results .kyou-search-result-title i {
            background: linear-gradient(45deg, #f59e0b, #ef4444);
        }

        /* Enhanced Search Input */
        .kyou-search-input {
            width: 100%;
            padding: 18px 65px 18px 25px;
            border: 2px solid #e2e8f0;
            border-radius: 30px;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 16px;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .kyou-search-input:focus {
            outline: none;
            border-color: var(--primary);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1), 0 8px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .kyou-search-input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        /* Enhanced Search Button */
        .kyou-search-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 48px;
            height: 48px;
            border: none;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
        }

        .kyou-search-btn:hover {
            transform: translateY(-50%) scale(1.1) rotate(5deg);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
        }

        .kyou-search-btn:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* Search Container Enhancement */
        .kyou-search-container {
            flex: 1;
            max-width: 650px;
            margin: 0 2rem;
        }

        .kyou-search-wrapper {
            position: relative;
            filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.1));
        }

        /* Highlight Text Enhancement */
        mark {
            background: linear-gradient(45deg, #fef3c7, #fde68a) !important;
            padding: 3px 6px !important;
            border-radius: 6px !important;
            font-weight: 700 !important;
            color: #92400e !important;
            box-shadow: 0 2px 4px rgba(146, 64, 14, 0.2) !important;
        }

        /* Mobile Responsive */
        @media (max-width: 991px) {
            .kyou-search-container {
                max-width: 100%;
                margin: 1rem 0;
                order: 3;
                width: 100%;
            }
            
            .kyou-search-input {
                font-size: 16px;
                padding: 15px 55px 15px 20px;
            }
            
            .kyou-search-btn {
                width: 42px;
                height: 42px;
                right: 8px;
            }

            .kyou-search-result-item {
                padding: 16px 20px;
            }

            .kyou-search-result-desc {
                padding-left: 25px;
            }

            .kyou-search-result-category {
                margin-left: 25px;
            }
        }

        /* Animation for search results appearance */
        @keyframes searchResultsAppear {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .kyou-search-results[style*="display: block"] {
            animation: searchResultsAppear 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ... existing code ... */

        /* Premium Testimonials Styles - FIXED VERSION */
        .kyou-testimonials-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .kyou-testimonials-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
            pointer-events: none;
        }

        .kyou-testimonials-title {
            font-size: 3rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .kyou-testimonials-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 4rem;
        }

        .kyou-testimonials-carousel {
            position: relative;
            max-width: 900px;
            margin: 0 auto 4rem;
            overflow: hidden;
            border-radius: 20px;
        }

        .kyou-testimonials-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            width: 400%; /* 4 slides */
        }

        .kyou-testimonial-card {
            width: 25%; /* Each card is 25% of track */
            flex-shrink: 0;
            padding: 0 15px;
            box-sizing: border-box;
        }

        .kyou-testimonial-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .kyou-testimonial-card:hover .kyou-testimonial-content {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .kyou-testimonial-stars {
            margin-bottom: 2rem;
        }

        .kyou-testimonial-stars i {
            color: #fbbf24;
            font-size: 1.5rem;
            margin: 0 2px;
            animation: starGlow 2s ease-in-out infinite alternate;
        }

        @keyframes starGlow {
            0% { opacity: 0.8; }
            100% { opacity: 1; }
        }

        .kyou-testimonial-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--dark);
            margin-bottom: 2rem;
            font-style: italic;
            position: relative;
        }

        .kyou-testimonial-text::before,
        .kyou-testimonial-text::after {
            content: '"';
            font-size: 3rem;
            color: var(--primary);
            font-family: serif;
            position: absolute;
            opacity: 0.3;
        }

        .kyou-testimonial-text::before {
            top: -10px;
            left: -20px;
        }

        .kyou-testimonial-text::after {
            bottom: -30px;
            right: -20px;
        }

        .kyou-testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .kyou-author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .kyou-testimonial-card:hover .kyou-author-avatar {
            transform: scale(1.05);
            border-color: #fbbf24;
        }

        .kyou-author-info {
            text-align: left;
        }

        .kyou-author-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .kyou-author-title {
            color: #64748b;
            margin-bottom: 5px;
        }

        .kyou-author-social {
            display: flex;
            align-items: center;
            gap: 5px;
            color: var(--primary);
            font-size: 14px;
        }

        .kyou-testimonials-nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 2rem;
        }

        .kyou-testimonial-nav-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .kyou-testimonial-nav-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .kyou-testimonial-nav-btn:active {
            transform: scale(0.95);
        }

        .kyou-testimonials-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .kyou-testimonial-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .kyou-testimonial-indicator.active {
            background: #ffffff;
            transform: scale(1.3);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .kyou-testimonial-indicator:hover {
            background: rgba(255, 255, 255, 0.6);
            transform: scale(1.1);
        }

        /* Responsive Design for Testimonials */
        @media (max-width: 768px) {
            .kyou-testimonials-title {
                font-size: 2rem;
            }
            
            .kyou-testimonial-content {
                padding: 30px 20px;
                min-height: 350px;
            }
            
            .kyou-testimonial-author {
                flex-direction: column;
                text-align: center;
            }
            
            .kyou-author-info {
                text-align: center;
            }
            
            .kyou-testimonials-carousel {
                max-width: 100%;
                margin: 0 20px 4rem;
            }
        }

        .kyou-testimonials-stats {
            margin-top: 4rem;
        }

        .kyou-stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .kyou-stat-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .kyou-stat-icon {
            font-size: 2.5rem;
            color: #ffffff;
            margin-bottom: 1rem;
        }

        .kyou-stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .kyou-stat-label {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        /* PWA Install Prompt */
        .kyou-pwa-prompt {
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            z-index: 1001;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .kyou-pwa-prompt.show {
            transform: translateY(0);
            opacity: 1;
        }

        .kyou-pwa-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .kyou-pwa-text {
            flex: 1;
        }

        .kyou-pwa-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .kyou-pwa-desc {
            font-size: 14px;
            opacity: 0.9;
            margin: 0;
        }

        .kyou-pwa-actions {
            display: flex;
            gap: 10px;
        }

        .kyou-pwa-btn {
            padding: 8px 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            background: transparent;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .kyou-pwa-btn.primary {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .kyou-pwa-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .kyou-search-container {
                display: none !important;
            }
            
            .kyou-testimonials-title {
                font-size: 2rem;
            }
            
            .kyou-testimonial-content {
                padding: 30px 20px;
            }
            
            .kyou-testimonial-author {
                flex-direction: column;
                text-align: center;
            }
            
            .kyou-author-info {
                text-align: center;
            }
            
            .kyou-pwa-content {
                flex-direction: column;
                text-align: center;
            }
        }

        :root {
            --primary: #7c3aed;
            --secondary: #6d28d9;
            --accent: #a855f7;
            --accent-light: #e9d5ff;
            --success: #10b981;
            --info: #3b82f6;
            --warning: #f59e0b;
            --danger: #ef4444;
            --light: #f8fafc;
            --dark: #1e293b;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f8fafc;
            color: #333;
        }
        
        /* Navbar */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary) !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            color: #333;
            transition: all 0.3s;
            margin: 0 10px;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary);
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            padding: 120px 0 80px;
            color: white;
            text-align: center;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,0 1000,0 1000,100 0,80"/></svg>') no-repeat bottom;
            background-size: cover;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        /* Company Stats */
        .stats-section {
            background: #f8fafc;
            padding: 80px 0;
            margin-top: -50px;
            position: relative;
            z-index: 3;
        }
        
        .carousel-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.15);
        }
        
        .carousel-item {
            height: 500px;
            position: relative;
        }
        
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .carousel-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
            padding: 40px;
            text-align: left;
        }
        
        .carousel-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .carousel-description {
            font-size: 1.1rem;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
            background: rgba(124, 58, 237, 0.8);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            transition: all 0.3s;
        }
        
        .carousel-control-prev {
            left: 20px;
        }
        
        .carousel-control-next {
            right: 20px;
        }
        
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: var(--primary);
            transform: translateY(-50%) scale(1.1);
        }
        
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 24px;
            height: 24px;
        }
        
        .carousel-indicators {
            bottom: 20px;
        }
        
        .carousel-indicators [data-bs-target] {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.5);
            border: 2px solid white;
            margin: 0 5px;
        }
        
        .carousel-indicators .active {
            background-color: var(--primary);
        }
        
        /* Company Stats */
        .stats-section {
            background: #f8fafc;
            padding: 80px 0;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.1);
            transition: all 0.3s;
            border: 1px solid #e5e7eb;
        }
        
        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.15);
        }
        
        .stats-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }
        
        .stats-label {
            color: #6b7280;
            font-weight: 500;
        }
        
        /* About Section */
        .about-section {
            padding: 80px 0;
            background: #f8fafc;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            text-align: center;
            margin-bottom: 20px;
        }
        
        .section-subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 60px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .about-content {
            background: #f8fafc;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4b5563;
            margin-bottom: 30px;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
        }
        
        .feature-list li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: #4b5563;
        }
        
        .feature-list li i {
            color: var(--primary);
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        /* Vision Mission */
        .vision-mission {
            padding: 80px 0;
            background: #f8fafc;
        }
        
        .vm-card {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border-radius: 20px;
            padding: 40px;
            height: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .vm-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            transform: rotate(45deg);
        }
        
        .vm-card-content {
            position: relative;
            z-index: 2;
        }
        
        .vm-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            opacity: 0.9;
        }
        
        .vm-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 20px;
            display: block;
        }
        
        .vm-text {
            font-size: 1.1rem;
            line-height: 1.7;
            opacity: 0.9;
        }
        
        /* Team Section */
        .team-section {
            padding: 80px 0;
            background: white;
        }
        
        .team-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.3s;
            height: 100%;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.1);
        }
        
        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 3rem;
        }
        
        .team-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .team-position {
            color: var(--primary);
            font-weight: 500;
            margin-bottom: 15px;
        }
        
        .team-description {
            color: #6b7280;
            line-height: 1.6;
        }
        
        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            background: white;
        }
        
        .contact-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            border: 2px solid #e5e7eb;
            transition: all 0.3s;
        }
        
        .contact-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }
        
        .contact-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
        }
        
        .contact-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
        }
        
        .contact-info {
            color: #4b5563;
            font-size: 1.1rem;
        }
        
        /* Footer */
        .footer {
            background-color: var(--dark);
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
        
        .footer h5 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: white;
        }
        
        .footer ul li {
            margin-bottom: 15px;
        }
        
        .footer a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer a:hover {
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .compact-carousel-item {
                height: 220px;
            }
            
            .compact-carousel-title {
                font-size: 1.2rem;
            }
            
            .compact-carousel-overlay {
                padding: 20px;
            }
            
            .compact-carousel-control-prev,
            .compact-carousel-control-next {
                width: 40px;
                height: 40px;
            }
            
            .about-content {
                padding: 30px;
            }
            
            .vm-card {
                padding: 30px;
                margin-bottom: 30px;
            }
            
            .stats-card {
                margin-bottom: 30px;
            }
            
            .team-card {
                margin-bottom: 30px;
            }
            
            .contact-card {
                margin-bottom: 30px;
            }
        }

        /* Multi-Slide Carousel Section - Kyou Style */
        .carousel-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            overflow: hidden;
        }
        
        .carousel-title-section {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .carousel-main-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .carousel-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .multi-carousel-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 20px 0;
        }
        
        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 20px;
            padding: 0 60px;
        }
        
        .carousel-slide {
            flex: 0 0 300px;
            height: 200px;
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.15);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .carousel-slide.active {
            flex: 0 0 400px;
            height: 250px;
            transform: scale(1.05);
            z-index: 5;
            box-shadow: 0 15px 35px rgba(124, 58, 237, 0.25);
        }
        
        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .carousel-slide:hover img {
            transform: scale(1.1);
        }
        
        .slide-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 20px;
            color: white;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .carousel-slide:hover .slide-overlay,
        .carousel-slide.active .slide-overlay {
            transform: translateY(0);
        }
        
        .slide-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 3px 10px rgba(124, 58, 237, 0.3);
        }
        
        .slide-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 5px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .slide-description {
            font-size: 0.85rem;
            opacity: 0.9;
            line-height: 1.4;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.1rem;
            transition: all 0.3s ease;
            z-index: 10;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            cursor: pointer;
        }
        
        .carousel-nav:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
        }
        
        .carousel-nav.prev {
            left: 10px;
        }
        
        .carousel-nav.next {
            right: 10px;
        }
        
        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
        
        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(124, 58, 237, 0.3);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .carousel-dot.active {
            background: var(--primary);
            transform: scale(1.2);
            box-shadow: 0 3px 8px rgba(124, 58, 237, 0.4);
        }
        
        /* Auto-scroll animation */
        @keyframes autoScroll {
            0% { transform: translateX(0); }
            20% { transform: translateX(-320px); }
            40% { transform: translateX(-640px); }
            60% { transform: translateX(-960px); }
            80% { transform: translateX(-1280px); }
            100% { transform: translateX(0); }
        }
        
        .carousel-track.auto-scroll {
            animation: autoScroll 15s infinite;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .carousel-section {
                padding: 40px 0;
            }
            
            .carousel-main-title {
                font-size: 1.8rem;
            }
            
            .carousel-subtitle {
                font-size: 1rem;
                padding: 0 20px;
            }
            
            .carousel-track {
                padding: 0 20px;
                gap: 15px;
            }
            
            .carousel-slide {
                flex: 0 0 250px;
                height: 180px;
            }
            
            .carousel-slide.active {
                flex: 0 0 280px;
                height: 200px;
                transform: scale(1.02);
            }
            
            .slide-title {
                font-size: 1rem;
            }
            
            .slide-description {
                font-size: 0.8rem;
            }
            
            .carousel-nav {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            
            .slide-badge {
                padding: 4px 8px;
                font-size: 0.7rem;
            }
        }
        
        @media (max-width: 480px) {
            .carousel-track {
                padding: 0 10px;
                gap: 10px;
            }
            
            .carousel-slide {
                flex: 0 0 200px;
                height: 150px;
            }
            
            .carousel-slide.active {
                flex: 0 0 220px;
                height: 170px;
            }
        }
                /* Kyou Triple Layout Section - Inspired by Kyou Hobby Shop */
        .kyou-triple-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .kyou-triple-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse"><circle cx="5" cy="5" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }
        
        .kyou-triple-container {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 30px;
            height: 400px;
        }
        
        .kyou-side-carousel {
            flex: 0 0 300px;
            height: 350px;
            position: relative;
            border-radius: 20px;
            overflow: hidden;
        }
        
        .kyou-center-image {
            flex: 1;
            height: 400px;
            position: relative;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        
        .kyou-center-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .kyou-center-image:hover img {
            transform: scale(1.05);
        }
        
        .kyou-center-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 30px;
            color: white;
            text-align: center;
        }
        
        .kyou-center-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .kyou-center-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .kyou-side-slide {
            width: 100%;
            height: 100%;
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        .kyou-side-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .kyou-side-slide:hover img {
            transform: scale(1.1);
        }
        
        .kyou-side-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
            padding: 20px;
            color: white;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .kyou-side-slide:hover .kyou-side-content {
            transform: translateY(0);
        }
        
        .kyou-side-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 3px 10px rgba(255,107,53,0.4);
        }
        a{
            text-decoration: none;
        }
        .kyou-side-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 5px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .kyou-side-description {
            font-size: 0.85rem;
            opacity: 0.9;
            line-height: 1.4;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .kyou-side-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 35px;
            height: 35px;
            background: rgba(255,255,255,0.9);
            border: none;
            border-radius: 50%;
            color: #667eea;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .kyou-side-nav:hover {
            background: #667eea;
            color: white;
            transform: translateY(-50%) scale(1.1);
        }
        
        .kyou-side-nav.prev {
            left: 10px;
        }
        
        .kyou-side-nav.next {
            right: 10px;
        }
        
        .kyou-side-indicators {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
        }
        
        .kyou-side-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .kyou-side-dot.active {
            background: white;
            transform: scale(1.2);
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .kyou-triple-section {
                padding: 40px 0;
            }
            
            .kyou-triple-container {
                flex-direction: column;
                height: auto;
                gap: 20px;
            }
            
            .kyou-side-carousel {
                flex: none;
                width: 100%;
                height: 250px;
            }
            
            .kyou-center-image {
                flex: none;
                width: 100%;
                height: 300px;
            }
            
            .kyou-center-title {
                font-size: 1.5rem;
            }
            
            .kyou-center-subtitle {
                font-size: 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .kyou-side-carousel {
                height: 200px;
            }
            
            .kyou-center-image {
                height: 250px;
            }
            
            .kyou-center-title {
                font-size: 1.3rem;
            }
            
            .kyou-center-overlay {
                padding: 20px;
            }
        }
                /* Kyou Featured Section */
        .kyou-featured-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .kyou-featured-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 2px, transparent 2px),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 2px, transparent 2px),
                radial-gradient(circle at 40% 60%, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 50px 50px, 60px 60px, 30px 30px;
            animation: float 20s ease-in-out infinite;
        }

        .kyou-featured-header {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
            z-index: 2;
        }

        .kyou-featured-title {
            font-size: 3rem;
            font-weight: 900;
            color: #fff;
            text-shadow: 3px 3px 0px #333, 6px 6px 0px rgba(0,0,0,0.2);
            margin-bottom: 20px;
            letter-spacing: 2px;
            animation: glow 2s ease-in-out infinite alternate;
        }

        .kyou-featured-subtitle {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .kyou-featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
            position: relative;
            z-index: 2;
        }

        .kyou-featured-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            border: 3px solid transparent;
            background-clip: padding-box;
        }

        .kyou-featured-card::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #feca57);
            border-radius: 23px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .kyou-featured-card:hover::before {
            opacity: 1;
        }

        .kyou-featured-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .kyou-featured-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .kyou-featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .kyou-featured-card:hover .kyou-featured-image img {
            transform: scale(1.1);
        }

        .kyou-featured-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(255,107,107,0.4);
            z-index: 3;
            animation: pulse 2s infinite;
        }

        .kyou-featured-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .kyou-featured-card:hover .kyou-featured-overlay {
            opacity: 1;
        }

        .kyou-featured-price {
            color: #feca57;
            font-size: 1.5rem;
            font-weight: 900;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .kyou-featured-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(102,126,234,0.3);
            text-decoration: none;
            display: inline-block;
        }

        .kyou-featured-btn:hover {
            background: linear-gradient(45deg, #764ba2, #667eea);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102,126,234,0.5);
            color: white;
            text-decoration: none;
        }

        .kyou-featured-content {
            padding: 25px;
        }

        .kyou-featured-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .kyou-featured-desc {
            color: #7f8c8d;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .kyou-featured-rating {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stars {
            font-size: 1rem;
        }

        .rating-text {
            color: #f39c12;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .kyou-featured-footer {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .kyou-view-all-btn {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(255,107,107,0.4);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .kyou-view-all-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255,107,107,0.6);
        }

        .kyou-view-all-btn i {
            transition: transform 0.3s ease;
        }

        .kyou-view-all-btn:hover i {
            transform: translateX(5px);
        }

        @keyframes glow {
            from {
                text-shadow: 3px 3px 0px #333, 6px 6px 0px rgba(0,0,0,0.2), 0 0 20px rgba(255,255,255,0.3);
            }
            to {
                text-shadow: 3px 3px 0px #333, 6px 6px 0px rgba(0,0,0,0.2), 0 0 30px rgba(255,255,255,0.5);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .kyou-featured-title {
                font-size: 2rem;
            }
            
            .kyou-featured-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .kyou-featured-section {
                padding: 60px 0;
            }
        }

        /* ... existing code ... */
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">FoodMarket</a>
            
            <!-- Premium Search Bar -->
            <div class="kyou-search-container d-none d-lg-flex">
                <div class="kyou-search-wrapper">
                    <input type="text" class="kyou-search-input" placeholder="Cari menu, promo, atau informasi..." id="globalSearch">
                    <button class="kyou-search-btn" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                    <div class="kyou-search-results" id="searchResults"></div>
                </div>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Mobile Search -->
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#" id="mobileSearchToggle">
                            <i class="fas fa-search"></i> Search
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/promo">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('company.profile') }}">Profil Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('career') }}">Karir</a>
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Tentang FoodMarket</h1>
                <p class="hero-subtitle">Platform kuliner terdepan yang menghubungkan cita rasa autentik dengan teknologi modern</p>
            </div>
        </div>
    </section>

    <!-- Compact Carousel Section -->
        <!-- Multi-Slide Carousel Section -->
    <section class="carousel-section">
        <div class="container-fluid">
            <div class="carousel-title-section">
                <h2 class="carousel-main-title">Galeri Perusahaan</h2>
                <p class="carousel-subtitle">Jelajahi fasilitas dan keunggulan FoodMarket yang mendukung kualitas terbaik dalam setiap aspek bisnis kuliner kami</p>
            </div>
            
            <div class="multi-carousel-container">
                <div class="carousel-track" id="carouselTrack">
                    <!-- Slide 1: Restaurant Interior -->
                    <div class="carousel-slide active" data-slide="0">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Interior Restaurant Modern">
                        <div class="slide-badge">Restaurant</div>
                        <div class="slide-overlay">
                            <h3 class="slide-title">Interior Restaurant Modern</h3>
                            <p class="slide-description">Suasana dining yang nyaman dan elegan dengan desain kontemporer</p>
                        </div>
                    </div>
                    
                    <!-- Slide 2: Professional Kitchen -->
                    <div class="carousel-slide" data-slide="1">
                        <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Dapur Profesional">
                        <div class="slide-badge">Kitchen</div>
                        <div class="slide-overlay">
                            <h3 class="slide-title">Dapur Profesional</h3>
                            <p class="slide-description">Dapur berstandar internasional dengan peralatan modern</p>
                        </div>
                    </div>
                    
                    <!-- Slide 3: Fresh Ingredients -->
                    <div class="carousel-slide" data-slide="2">
                        <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Bahan Segar">
                        <div class="slide-badge">Fresh</div>
                        <div class="slide-overlay">
                            <h3 class="slide-title">Bahan Baku Segar</h3>
                            <p class="slide-description">Komitmen menggunakan bahan-bahan segar pilihan terbaik</p>
                        </div>
                    </div>
                    
                    <!-- Slide 4: Food Presentation -->
                    <div class="carousel-slide" data-slide="3">
                        <img src="https://www.fispol.com/wp-content/uploads/2017/07/seni-kuliner.jpg" alt="Presentasi Makanan">
                        <div class="slide-badge">Culinary</div>
                        <div class="slide-overlay">
                            <h3 class="slide-title">Seni Kuliner</h3>
                            <p class="slide-description">Setiap hidangan disajikan dengan presentasi yang memukau</p>
                        </div>
                    </div>
                    
                    <!-- Slide 5: Team Work -->
                    <div class="carousel-slide" data-slide="4">
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Tim Profesional">
                        <div class="slide-badge">Team</div>
                        <div class="slide-overlay">
                            <h3 class="slide-title">Tim Profesional</h3>
                            <p class="slide-description">Chef berpengalaman dan staff yang berdedikasi</p>
                        </div>
                    </div>
                    
                    <!-- Slide 6: Quality Control -->
                    <div class="carousel-slide" data-slide="5">
                        <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Quality Control">
                        <div class="slide-badge">Quality</div>
                        <div class="slide-overlay">
                            <h3 class="slide-title">Kontrol Kualitas</h3>
                            <p class="slide-description">Standar kualitas tinggi dalam setiap proses produksi</p>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Controls -->
                <button class="carousel-nav prev" onclick="moveCarousel(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-nav next" onclick="moveCarousel(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            
            <!-- Dots Indicators -->
            <div class="carousel-dots">
                <button class="carousel-dot active" onclick="goToSlide(0)"></button>
                <button class="carousel-dot" onclick="goToSlide(1)"></button>
                <button class="carousel-dot" onclick="goToSlide(2)"></button>
                <button class="carousel-dot" onclick="goToSlide(3)"></button>
                <button class="carousel-dot" onclick="goToSlide(4)"></button>
                <button class="carousel-dot" onclick="goToSlide(5)"></button>
            </div>
        </div>
    </section>
    <!-- Kyou Triple Layout Section -->
    <section class="kyou-triple-section">
        <div class="container-fluid">
            <div class="kyou-triple-container">
                <!-- Left Carousel -->
                <div class="kyou-side-carousel">
                    <div class="kyou-side-slide" id="leftSlide">
                        <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Professional Kitchen">
                        <div class="kyou-side-badge">🍳 KITCHEN</div>
                        <div class="kyou-side-content">
                            <h4 class="kyou-side-title">Dapur Profesional</h4>
                            <p class="kyou-side-description">Fasilitas dapur modern dengan standar internasional</p>
                        </div>
                    </div>
                    
                    <!-- Left Navigation -->
                    <button class="kyou-side-nav prev" onclick="changeLeftSlide(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="kyou-side-nav next" onclick="changeLeftSlide(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Left Indicators -->
                    <div class="kyou-side-indicators">
                        <div class="kyou-side-dot active" onclick="goToLeftSlide(0)"></div>
                        <div class="kyou-side-dot" onclick="goToLeftSlide(1)"></div>
                        <div class="kyou-side-dot" onclick="goToLeftSlide(2)"></div>
                        <div class="kyou-side-dot" onclick="goToLeftSlide(3)"></div>
                    </div>
                </div>
                
                <!-- Center Company Image -->
                <div class="kyou-center-image">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="FoodMarket Restaurant">
                    <div class="kyou-center-overlay">
                        <h2 class="kyou-center-title">🍽️ FOODMARKET 🍽️</h2>
                        <p class="kyou-center-subtitle">Platform Kuliner Terdepan dengan Kualitas Premium</p>
                    </div>
                </div>
                
                <!-- Right Carousel -->
                <div class="kyou-side-carousel">
                    <div class="kyou-side-slide" id="rightSlide">
                        <img src="https://www.fispol.com/wp-content/uploads/2017/07/seni-kuliner.jpg" alt="Food Presentation">
                        <div class="kyou-side-badge">🍽️ CULINARY</div>
                        <div class="kyou-side-content">
                            <h4 class="kyou-side-title">Seni Kuliner</h4>
                            <p class="kyou-side-description">Presentasi makanan yang memukau dengan cita rasa autentik</p>
                        </div>
                    </div>
                    
                    <!-- Right Navigation -->
                    <button class="kyou-side-nav prev" onclick="changeRightSlide(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="kyou-side-nav next" onclick="changeRightSlide(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Right Indicators -->
                    <div class="kyou-side-indicators">
                        <div class="kyou-side-dot active" onclick="goToRightSlide(0)"></div>
                        <div class="kyou-side-dot" onclick="goToRightSlide(1)"></div>
                        <div class="kyou-side-dot" onclick="goToRightSlide(2)"></div>
                        <div class="kyou-side-dot" onclick="goToRightSlide(3)"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </section>

    <!-- Company Excellence & Services Section -->
    <section class="kyou-featured-section">
        <div class="container">
            <div class="kyou-featured-header">
                <h2 class="kyou-featured-title">🏆 KEUNGGULAN PERUSAHAAN 🏆</h2>
                <p class="kyou-featured-subtitle">Mengapa FoodMarket menjadi pilihan utama dalam industri kuliner</p>
            </div>
            
            <div class="kyou-featured-grid">
                <div class="kyou-featured-card">
                    <div class="kyou-featured-image">
                        <img src="https://amartha.com/_next/image/?url=https%3A%2F%2Faccess.amartha.com%2Fuploads%2FManfaat_teknologi_56e628988d.jpg&w=1920&q=75" alt="Technology">
                        <div class="kyou-featured-badge">🚀 TECH</div>
                        <div class="kyou-featured-overlay">
                            <div class="kyou-featured-price">Advanced</div>
                            <a href="{{ route('technology') }}" class="kyou-featured-btn">Pelajari Lebih</a>
                        </div>
                    </div>
                    <div class="kyou-featured-content">
                        <h4 class="kyou-featured-name">Teknologi Terdepan</h4>
                        <p class="kyou-featured-desc">Platform digital canggih dengan AI untuk pengalaman kuliner yang personal</p>
                        <div class="kyou-featured-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-text">Cutting Edge</span>
                        </div>
                    </div>
                </div>

                <div class="kyou-featured-card">
                    <div class="kyou-featured-image">
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Professional Team">
                        <div class="kyou-featured-badge">👥 TEAM</div>
                        <div class="kyou-featured-overlay">
                            <div class="kyou-featured-price">Expert</div>
                            <a href="{{ route('team') }}" class="kyou-featured-btn">Lihat Tim</a>
                        </div>
                    </div>
                    <div class="kyou-featured-content">
                        <h4 class="kyou-featured-name">Tim Profesional</h4>
                        <p class="kyou-featured-desc">Chef berpengalaman dan tim ahli dengan pengalaman 10+ tahun di industri</p>
                        <div class="kyou-featured-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-text">Professional</span>
                        </div>
                    </div>
                </div>

                <div class="kyou-featured-card">
                    <div class="kyou-featured-image">
                        <img src="https://www.marketeers.com/_next/image/?url=https%3A%2F%2Fimagedelivery.net%2F2MtOYVTKaiU0CCt-BLmtWw%2F9fa17232-b052-4854-27ef-4186d658b200%2Fw%3D1920&w=1920&q=75" alt="Quality Standards">
                        <div class="kyou-featured-badge">💎 QUALITY</div>
                        <div class="kyou-featured-overlay">
                            <div class="kyou-featured-price">Premium</div>
                            <a href="{{ route('quality') }}" class="kyou-featured-btn">Lihat Standar</a>
                        </div>
                    </div>
                    <div class="kyou-featured-content">
                        <h4 class="kyou-featured-name">Standar Kualitas Tinggi</h4>
                        <p class="kyou-featured-desc">Bahan baku pilihan dan proses produksi berstandar internasional ISO 22000</p>
                        <div class="kyou-featured-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-text">Certified</span>
                        </div>
                    </div>
                </div>

                <div class="kyou-featured-card">
                    <div class="kyou-featured-image">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Layanan 24/7">
                        <div class="kyou-featured-badge">🕐 24/7</div>
                        <div class="kyou-featured-overlay">
                            <div class="kyou-featured-price">Non-Stop</div>
                            <a href="{{ route('service') }}" class="kyou-featured-btn">Hubungi Kami</a>
                        </div>
                    </div>
                    <div class="kyou-featured-content">
                        <h4 class="kyou-featured-name">Layanan 24/7</h4>
                        <p class="kyou-featured-desc">Customer service siap melayani Anda kapan saja dengan respon cepat</p>
                        <div class="kyou-featured-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-text">Always Ready</span>
                        </div>
                    </div>
                </div>

                <div class="kyou-featured-card">
                    <div class="kyou-featured-image">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sustainability">
                        <div class="kyou-featured-badge">🌱 ECO</div>
                        <div class="kyou-featured-overlay">
                            <div class="kyou-featured-price">Green Initiative</div>
                            <a href="{{ route('environment') }}" class="kyou-featured-btn">Lihat Program</a>
                        </div>
                    </div>
                    <div class="kyou-featured-content">
                        <h4 class="kyou-featured-name">Ramah Lingkungan</h4>
                        <p class="kyou-featured-desc">Komitmen terhadap sustainability dengan kemasan eco-friendly dan zero waste</p>
                        <div class="kyou-featured-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-text">Sustainable</span>
                        </div>
                    </div>
                </div>

                <div class="kyou-featured-card">
                    <div class="kyou-featured-image">
                        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Innovation">
                        <div class="kyou-featured-badge">💡 INNOVATION</div>
                        <div class="kyou-featured-overlay">
                            <div class="kyou-featured-price">Future Ready</div>
                            <a href="{{ route('innovation') }}" class="kyou-featured-btn">Lihat Inovasi</a>
                        </div>
                    </div>
                    <div class="kyou-featured-content">
                        <h4 class="kyou-featured-name">Inovasi Berkelanjutan</h4>
                        <p class="kyou-featured-desc">R&D center untuk pengembangan produk dan teknologi kuliner masa depan</p>
                        <div class="kyou-featured-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-text">Innovative</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kyou-featured-footer">
                <button class="kyou-view-all-btn">
                    <span>Pelajari Lebih Lanjut</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Stats Section -->

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-number">10,000+</div>
                        <div class="stats-label">Pelanggan Setia</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div class="stats-number">500+</div>
                        <div class="stats-label">Menu Pilihan</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="stats-number">25+</div>
                        <div class="stats-label">Cabang</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="stats-number">5</div>
                        <div class="stats-label">Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <h2 class="section-title">Tentang Kami</h2>
            <p class="section-subtitle">FoodMarket hadir sebagai solusi kuliner modern yang mengutamakan kualitas, cita rasa, dan kepuasan pelanggan</p>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="about-content">
                        <h3 class="mb-4" style="color: var(--primary); font-weight: 600;">Sejarah Kami</h3>
                        <p class="about-text">
                            Didirikan pada tahun 2019, FoodMarket bermula dari passion untuk menghadirkan pengalaman kuliner yang tak terlupakan. 
                            Kami memulai perjalanan dengan satu visi sederhana: menghubungkan cita rasa autentik dengan kemudahan teknologi modern.
                        </p>
                        <p class="about-text">
                            Dari sebuah warung kecil hingga menjadi platform kuliner terdepan, kami terus berinovasi untuk memberikan yang terbaik 
                            bagi setiap pelanggan yang mempercayai kami.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="about-content">
                        <h3 class="mb-4" style="color: var(--primary); font-weight: 600;">Keunggulan Kami</h3>
                        <ul class="feature-list">
                            <li><i class="fas fa-check-circle"></i> Bahan-bahan segar dan berkualitas tinggi</li>
                            <li><i class="fas fa-check-circle"></i> Chef berpengalaman dan terlatih</li>
                            <li><i class="fas fa-check-circle"></i> Sistem pemesanan online yang mudah</li>
                            <li><i class="fas fa-check-circle"></i> Pengiriman cepat dan aman</li>
                            <li><i class="fas fa-check-circle"></i> Harga terjangkau dengan kualitas premium</li>
                            <li><i class="fas fa-check-circle"></i> Layanan pelanggan 24/7</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission -->
    <section class="vision-mission">
        <div class="container">
            <h2 class="section-title">Visi & Misi</h2>
            <p class="section-subtitle">Komitmen kami untuk terus memberikan yang terbaik dalam setiap hidangan</p>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="vm-card">
                        <div class="vm-card-content">
                            <div class="vm-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h3 class="vm-title">Visi Kami</h3>
                            <p class="vm-text">
                                Menjadi platform kuliner terdepan di Indonesia yang menghubungkan cita rasa autentik 
                                dengan teknologi modern, memberikan pengalaman kuliner yang tak terlupakan bagi setiap pelanggan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="vm-card">
                        <div class="vm-card-content">
                            <div class="vm-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <h3 class="vm-title">Misi Kami</h3>
                            <p class="vm-text">
                                Menghadirkan hidangan berkualitas tinggi dengan bahan-bahan segar, melayani pelanggan dengan sepenuh hati, 
                                dan terus berinovasi dalam teknologi kuliner untuk kemudahan dan kepuasan pelanggan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2 class="section-title">Tim Kami</h2>
            <p class="section-subtitle">Bertemu dengan orang-orang hebat di balik kesuksesan FoodMarket</p>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h4 class="team-name">Ahmad Rizki</h4>
                        <p class="team-position">CEO & Founder</p>
                        <p class="team-description">
                            Visioner di balik FoodMarket dengan pengalaman 10+ tahun di industri kuliner dan teknologi.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h4 class="team-name">Sarah Putri</h4>
                        <p class="team-position">Head Chef</p>
                        <p class="team-description">
                            Chef berpengalaman dengan spesialisasi masakan Nusantara dan fusion cuisine modern.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <h4 class="team-name">Budi Santoso</h4>
                        <p class="team-position">CTO</p>
                        <p class="team-description">
                            Ahli teknologi yang memastikan platform FoodMarket selalu up-to-date dan user-friendly.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-subtitle">Kami siap melayani Anda dengan sepenuh hati</p>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4 class="contact-title">Telepon</h4>
                        <p class="contact-info">+62 812-3456-7890</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="contact-title">Email</h4>
                        <p class="contact-info">info@foodmarket.com</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="contact-title">Alamat</h4>
                        <p class="contact-info">Jl. Kuliner No. 123<br>Jakarta, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Premium Testimonials Section -->
    <section class="kyou-testimonials-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="kyou-testimonials-title">Apa Kata Pelanggan Kami</h2>
                    <p class="kyou-testimonials-subtitle">Kepuasan pelanggan adalah prioritas utama kami. Dengarkan cerita mereka!</p>
                </div>
            </div>

            <!-- Testimonials Carousel -->
            <div class="kyou-testimonials-carousel">
                <div class="kyou-testimonials-track" id="testimonialsTrack">
                    <!-- Testimonial 1 -->
                    <div class="kyou-testimonial-card active">
                        <div class="kyou-testimonial-content">
                            <div class="kyou-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="kyou-testimonial-text">
                                "FoodMarket benar-benar mengubah cara saya menikmati makanan. Kualitas premium dengan harga yang sangat reasonable. Tim mereka sangat profesional dan pelayanannya luar biasa!"
                            </p>
                            <div class="kyou-testimonial-author">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKEP4InRizbsad53XWy4s57jXR75Rc40HUaA&s" alt="Sarah Johnson" class="kyou-author-avatar">
                                <div class="kyou-author-info">
                                    <h5 class="kyou-author-name">Sarah Johnson</h5>
                                    <p class="kyou-author-title">Food Blogger & Influencer</p>
                                    <div class="kyou-author-social">
                                        <i class="fab fa-instagram"></i>
                                        <span>@sarahfoodie</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="kyou-testimonial-card">
                        <div class="kyou-testimonial-content">
                            <div class="kyou-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="kyou-testimonial-text">
                                "Sebagai chef profesional, saya sangat menghargai komitmen FoodMarket terhadap kualitas bahan dan inovasi. Mereka benar-benar memahami apa yang dibutuhkan industri kuliner."
                            </p>
                            <div class="kyou-testimonial-author">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face" alt="Chef Marco" class="kyou-author-avatar">
                                <div class="kyou-author-info">
                                    <h5 class="kyou-author-name">Chef Marco Rossi</h5>
                                    <p class="kyou-author-title">Executive Chef - Bella Vista Restaurant</p>
                                    <div class="kyou-author-social">
                                        <i class="fas fa-utensils"></i>
                                        <span>15+ Years Experience</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="kyou-testimonial-card">
                        <div class="kyou-testimonial-content">
                            <div class="kyou-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="kyou-testimonial-text">
                                "Aplikasi mobile mereka sangat user-friendly dan delivery selalu tepat waktu. Yang paling saya suka adalah program loyalty mereka yang memberikan banyak benefit untuk pelanggan setia."
                            </p>
                            <div class="kyou-testimonial-author">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=80&h=80&fit=crop&crop=face" alt="Lisa Chen" class="kyou-author-avatar">
                                <div class="kyou-author-info">
                                    <h5 class="kyou-author-name">Lisa Chen</h5>
                                    <p class="kyou-author-title">Marketing Director - Tech Startup</p>
                                    <div class="kyou-author-social">
                                        <i class="fab fa-linkedin"></i>
                                        <span>@lisachen</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="kyou-testimonial-card">
                        <div class="kyou-testimonial-content">
                            <div class="kyou-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="kyou-testimonial-text">
                                "FoodMarket tidak hanya menyediakan makanan berkualitas, tapi juga berkomitmen pada sustainability. Sebagai environmentalist, saya sangat appreciate usaha mereka untuk ramah lingkungan."
                            </p>
                            <div class="kyou-testimonial-author">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face" alt="David Green" class="kyou-author-avatar">
                                <div class="kyou-author-info">
                                    <h5 class="kyou-author-name">David Green</h5>
                                    <p class="kyou-author-title">Environmental Consultant</p>
                                    <div class="kyou-author-social">
                                        <i class="fas fa-leaf"></i>
                                        <span>Green Living Advocate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="kyou-testimonials-nav">
                    <button class="kyou-testimonial-nav-btn prev" id="testimonialPrev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="kyou-testimonial-nav-btn next" id="testimonialNext">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Indicators -->
                <div class="kyou-testimonials-indicators">
                    <button class="kyou-testimonial-indicator active" data-slide="0"></button>
                    <button class="kyou-testimonial-indicator" data-slide="1"></button>
                    <button class="kyou-testimonial-indicator" data-slide="2"></button>
                    <button class="kyou-testimonial-indicator" data-slide="3"></button>
                </div>
            </div>

            <!-- Stats Row -->
            <div class="row kyou-testimonials-stats">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="kyou-stat-card">
                        <div class="kyou-stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="kyou-stat-number" data-target="50000">0</div>
                        <div class="kyou-stat-label">Happy Customers</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="kyou-stat-card">
                        <div class="kyou-stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="kyou-stat-number">4.9</div>
                        <div class="kyou-stat-label">Average Rating</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="kyou-stat-card">
                        <div class="kyou-stat-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="kyou-stat-number" data-target="1000000">0</div>
                        <div class="kyou-stat-label">Orders Delivered</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="kyou-stat-card">
                        <div class="kyou-stat-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="kyou-stat-number" data-target="25">0</div>
                        <div class="kyou-stat-label">Awards Won</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="#" class="footer-brand">FoodMarket</a>
                    <p class="mb-4">Platform kuliner terdepan yang menghubungkan cita rasa autentik dengan teknologi modern. Nikmati pengalaman kuliner yang tak terlupakan bersama kami.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('menu') }}">Menu</a></li>
                        <li><a href="/promo">Promo</a></li>
                        <li><a href="{{ route('company.profile') }}">Profil Perusahaan</a></li>
                        <li><a href="{{ route('career') }}">Karir</a></li>
                        <li><a href="/kontak">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Layanan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Cara Pemesanan</a></li>
                        <li><a href="#">Metode Pembayaran</a></li>
                        <li><a href="#">Kebijakan Pengiriman</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled footer-contact">
                        <li><i class="fas fa-phone"></i> +62 812-3456-7890</li>
                        <li><i class="fas fa-envelope"></i> info@foodmarket.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Kuliner No. 123, Jakarta</li>
                        <li><i class="fas fa-clock"></i> Senin - Minggu: 08:00 - 22:00</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 FoodMarket. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const dots = document.querySelectorAll('.carousel-dot');
        const track = document.getElementById('carouselTrack');
        const totalSlides = slides.length;
        let autoScrollInterval;

        function updateCarousel() {
            // Remove active class from all slides and dots
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            // Add active class to current slide and dot
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
            
            // Calculate transform position to center the active slide
            const slideWidth = 320; // 300px width + 20px gap
            const containerWidth = track.parentElement.offsetWidth;
            const centerOffset = (containerWidth / 2) - (slideWidth / 2);
            const translateX = centerOffset - (currentSlide * slideWidth);
            
            track.style.transform = `translateX(${translateX}px)`;
        }

        function moveCarousel(direction) {
            currentSlide += direction;
            
            if (currentSlide >= totalSlides) {
                currentSlide = 0;
            } else if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            }
            
            updateCarousel();
            resetAutoScroll();
        }

        function goToSlide(slideIndex) {
            currentSlide = slideIndex;
            updateCarousel();
            resetAutoScroll();
        }

        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                moveCarousel(1);
            }, 4000);
        }

        function resetAutoScroll() {
            clearInterval(autoScrollInterval);
            startAutoScroll();
        }

        // Initialize carousel
        updateCarousel();
        startAutoScroll();

        // Pause auto-scroll on hover
        track.addEventListener('mouseenter', () => {
            clearInterval(autoScrollInterval);
        });

        track.addEventListener('mouseleave', () => {
            startAutoScroll();
        });

        // Handle window resize
        window.addEventListener('resize', updateCarousel);

         const leftSlides = [
            {
                image: "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                badge: "🍳 KITCHEN",
                title: "Dapur Profesional",
                description: "Fasilitas dapur modern dengan standar internasional"
            },
            {
                image: "https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                badge: "🥬 FRESH",
                title: "Bahan Segar",
                description: "Bahan-bahan pilihan terbaik dari supplier terpercaya"
            },
            {
                image: "https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                badge: "👥 TEAM",
                title: "Tim Profesional",
                description: "Chef berpengalaman dan staff yang berdedikasi"
            },
            {
                image: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                badge: "🏪 SERVICE",
                title: "Pelayanan Prima",
                description: "Layanan customer service yang ramah dan responsif"
            }
        ];

        // Right Carousel Data
        const rightSlides = [
            {
                image: "https://www.fispol.com/wp-content/uploads/2017/07/seni-kuliner.jpg",
                badge: "🍽️ CULINARY",
                title: "Seni Kuliner",
                description: "Presentasi makanan yang memukau dengan cita rasa autentik"
            },
            {
                image: "https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                badge: "🍕 MENU",
                title: "Variasi Menu",
                description: "Beragam pilihan menu dari berbagai daerah"
            },
            {
                image: "https://images.unsplash.com/photo-1559339352-11d035aa65de?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                badge: "📱 TECH",
                title: "Teknologi Modern",
                description: "Sistem pemesanan online yang mudah dan praktis"
            },
            {
                image: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                badge: "🚚 DELIVERY",
                title: "Pengiriman Cepat",
                description: "Layanan delivery yang cepat dan terpercaya"
            }
        ];

        let leftCurrentSlide = 0;
        let rightCurrentSlide = 0;

        function updateLeftSlide() {
            const slide = leftSlides[leftCurrentSlide];
            const slideElement = document.getElementById('leftSlide');
            
            slideElement.innerHTML = `
                <img src="${slide.image}" alt="${slide.title}">
                <div class="kyou-side-badge">${slide.badge}</div>
                <div class="kyou-side-content">
                    <h4 class="kyou-side-title">${slide.title}</h4>
                    <p class="kyou-side-description">${slide.description}</p>
                </div>
            `;
            
            // Update indicators
            const leftDots = document.querySelectorAll('.kyou-side-carousel:first-child .kyou-side-dot');
            leftDots.forEach((dot, index) => {
                dot.classList.toggle('active', index === leftCurrentSlide);
            });
        }

        function updateRightSlide() {
            const slide = rightSlides[rightCurrentSlide];
            const slideElement = document.getElementById('rightSlide');
            
            slideElement.innerHTML = `
                <img src="${slide.image}" alt="${slide.title}">
                <div class="kyou-side-badge">${slide.badge}</div>
                <div class="kyou-side-content">
                    <h4 class="kyou-side-title">${slide.title}</h4>
                    <p class="kyou-side-description">${slide.description}</p>
                </div>
            `;
            
            // Update indicators
            const rightDots = document.querySelectorAll('.kyou-side-carousel:last-child .kyou-side-dot');
            rightDots.forEach((dot, index) => {
                dot.classList.toggle('active', index === rightCurrentSlide);
            });
        }

        function changeLeftSlide(direction) {
            leftCurrentSlide = (leftCurrentSlide + direction + leftSlides.length) % leftSlides.length;
            updateLeftSlide();
        }

        function changeRightSlide(direction) {
            rightCurrentSlide = (rightCurrentSlide + direction + rightSlides.length) % rightSlides.length;
            updateRightSlide();
        }

        function goToLeftSlide(index) {
            leftCurrentSlide = index;
            updateLeftSlide();
        }

        function goToRightSlide(index) {
            rightCurrentSlide = index;
            updateRightSlide();
        }

        // Auto-slide functionality
        setInterval(() => {
            changeLeftSlide(1);
        }, 5000);

        setInterval(() => {
            changeRightSlide(1);
        }, 6000);

        // Initialize slides
        updateLeftSlide();
        updateRightSlide();

        // Premium Search Functionality - FIXED VERSION
        const searchInput = document.getElementById('globalSearch');
        const searchResults = document.getElementById('searchResults');
        const searchBtn = document.querySelector('.kyou-search-btn');
        
        // Enhanced search data with more menu items
        const searchData = [
            // Menu Items
            { title: 'Nasi Gudeg Premium', category: 'Menu', description: 'Gudeg khas Yogyakarta dengan cita rasa autentik dan bumbu tradisional' },
            { title: 'Nasi Gudeg Spesial', category: 'Menu', description: 'Gudeg istimewa dengan ayam kampung dan telur pindang' },
            { title: 'Gudeg Jogja Original', category: 'Menu', description: 'Resep turun temurun gudeg asli Yogyakarta' },
            { title: 'Paket Gudeg Komplit', category: 'Menu', description: 'Nasi gudeg lengkap dengan lauk pauk tradisional' },
            { title: 'Nasi Goreng Spesial', category: 'Menu', description: 'Nasi goreng dengan bumbu rahasia dan topping lengkap' },
            { title: 'Ayam Bakar Madu', category: 'Menu', description: 'Ayam bakar dengan bumbu madu dan rempah pilihan' },
            { title: 'Sate Ayam Premium', category: 'Menu', description: 'Sate ayam dengan bumbu kacang spesial' },
            { title: 'Rendang Daging Sapi', category: 'Menu', description: 'Rendang daging sapi dengan bumbu Padang autentik' },
            { title: 'Gado-gado Jakarta', category: 'Menu', description: 'Gado-gado dengan sayuran segar dan bumbu kacang' },
            { title: 'Soto Ayam Lamongan', category: 'Menu', description: 'Soto ayam khas Lamongan dengan kuah bening' },
            
            // Company Features
            { title: 'Teknologi Terdepan', category: 'Keunggulan', description: 'Inovasi teknologi dalam industri kuliner digital' },
            { title: 'Tim Profesional', category: 'Keunggulan', description: 'Tim ahli berpengalaman di bidang kuliner' },
            { title: 'Kualitas Premium', category: 'Keunggulan', description: 'Standar kualitas tinggi untuk semua produk' },
            
            // Promotions
            { title: 'Promo Spesial Ramadan', category: 'Promo', description: 'Diskon hingga 50% untuk paket berbuka puasa' },
            { title: 'Promo Weekend', category: 'Promo', description: 'Diskon khusus untuk pemesanan akhir pekan' },
            { title: 'Promo Gudeg Spesial', category: 'Promo', description: 'Diskon 30% untuk semua menu gudeg' },
            
            // Services
            { title: 'Layanan 24/7', category: 'Layanan', description: 'Customer support dan delivery 24 jam' },
            { title: 'Catering Wedding', category: 'Layanan', description: 'Paket catering untuk acara pernikahan' },
            { title: 'Delivery Express', category: 'Layanan', description: 'Pengiriman cepat dalam 30 menit' },
            
            // Business
            { title: 'Franchise Opportunity', category: 'Bisnis', description: 'Peluang kemitraan bisnis FoodMarket' }
        ];

        let searchTimeout;
        
        // Function to perform search
        function performSearch() {
            const query = searchInput.value.toLowerCase().trim();
            
            if (query.length < 1) {
                searchResults.style.display = 'none';
                showSearchNotification('Masukkan kata kunci pencarian', 'warning');
                return;
            }
            
            // Show loading
            searchResults.innerHTML = `
                <div class="kyou-search-loading">
                    <i class="fas fa-spinner fa-spin"></i> Mencari...
                </div>
            `;
            searchResults.style.display = 'block';
            
            setTimeout(() => {
                // Enhanced search algorithm
                const results = searchData.filter(item => {
                    const titleMatch = item.title.toLowerCase().includes(query);
                    const descMatch = item.description.toLowerCase().includes(query);
                    const categoryMatch = item.category.toLowerCase().includes(query);
                    
                    // Special handling for "gudeg" searches
                    const isGudegSearch = query.includes('gudeg') || query.includes('nasi gudeg');
                    const isGudegItem = item.title.toLowerCase().includes('gudeg');
                    
                    return titleMatch || descMatch || categoryMatch || (isGudegSearch && isGudegItem);
                });
                
                // Sort results: exact matches first, then partial matches
                results.sort((a, b) => {
                    const aExact = a.title.toLowerCase().includes(query);
                    const bExact = b.title.toLowerCase().includes(query);
                    if (aExact && !bExact) return -1;
                    if (!aExact && bExact) return 1;
                    return 0;
                });
                
                displaySearchResults(results, query);
            }, 500); // Simulate search delay
        }
        
        // Event listener for input typing
        searchInput?.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.toLowerCase().trim();
            
            if (query.length < 2) {
                searchResults.style.display = 'none';
                return;
            }
            
            searchTimeout = setTimeout(() => {
                performSearch();
            }, 300);
        });

        // Event listener for search button click
        searchBtn?.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Search button clicked!'); // Debug log
            
            // Add button click animation
            this.style.transform = 'translateY(-50%) scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'translateY(-50%) scale(1)';
            }, 150);
            
            performSearch();
        });

        // Event listener for Enter key
        searchInput?.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                performSearch();
            }
            
            // Keyboard navigation for search results
            const items = searchResults.querySelectorAll('.kyou-search-result-item:not(.kyou-search-loading)');
            if (items.length === 0) return;
            
            let currentIndex = Array.from(items).findIndex(item => item.classList.contains('highlighted'));
            
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (currentIndex < items.length - 1) currentIndex++;
                else currentIndex = 0;
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (currentIndex > 0) currentIndex--;
                else currentIndex = items.length - 1;
            } else if (e.key === 'Enter' && currentIndex >= 0) {
                e.preventDefault();
                items[currentIndex].click();
                return;
            }
            
            // Update highlighting
            items.forEach(item => item.classList.remove('highlighted'));
            if (currentIndex >= 0) {
                items[currentIndex].classList.add('highlighted');
                items[currentIndex].style.background = '#f1f5f9';
            }
        });

        function displaySearchResults(results, query) {
            if (results.length === 0) {
                searchResults.innerHTML = `
                    <div class="kyou-search-result-item">
                        <div class="kyou-search-result-title">
                            <i class="fas fa-exclamation-circle" style="color: #f59e0b; margin-right: 8px;"></i>
                            Tidak ada hasil ditemukan
                        </div>
                        <p class="kyou-search-result-desc">Coba kata kunci lain seperti "gudeg", "nasi goreng", atau "promo"</p>
                    </div>
                `;
            } else {
                searchResults.innerHTML = results.map(item => `
                    <div class="kyou-search-result-item" onclick="selectSearchResult('${item.title}', '${item.category}')">
                        <div class="kyou-search-result-title">
                            <i class="fas fa-${getCategoryIcon(item.category)}" style="margin-right: 8px; color: var(--primary);"></i>
                            ${highlightText(item.title, query)}
                        </div>
                        <p class="kyou-search-result-desc">${highlightText(item.description, query)}</p>
                        <span class="kyou-search-result-category">${item.category}</span>
                    </div>
                `).join('');
            }
            
            searchResults.style.display = 'block';
        }

        function getCategoryIcon(category) {
            const icons = {
                'Menu': 'utensils',
                'Keunggulan': 'star',
                'Promo': 'tags',
                'Layanan': 'concierge-bell',
                'Bisnis': 'handshake'
            };
            return icons[category] || 'circle';
        }

        function highlightText(text, query) {
            const regex = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
            return text.replace(regex, '<mark style="background: #fef3c7; padding: 2px 4px; border-radius: 3px; font-weight: 600;">$1</mark>');
        }

        function selectSearchResult(title, category) {
            searchInput.value = title;
            searchResults.style.display = 'none';
            
            // Add selection animation
            const selectedItem = event.currentTarget;
            selectedItem.style.background = 'var(--primary)';
            selectedItem.style.color = 'white';
            selectedItem.style.transform = 'scale(0.98)';
            
            setTimeout(() => {
                // Show success message
                showSearchNotification(`✅ Menampilkan hasil untuk: ${title}`, 'success');
                console.log(`Navigating to: ${title} in ${category}`);
                
                // Simulate navigation or action
                if (category === 'Menu') {
                    // Scroll to menu section or show menu details
                    const menuSection = document.querySelector('#menu-section') || document.querySelector('.kyou-featured-section');
                    if (menuSection) {
                        menuSection.scrollIntoView({ behavior: 'smooth' });
                    }
                } else if (category === 'Promo') {
                    // Show promo information
                    showSearchNotification(`🎉 Promo aktif: ${title}`, 'info');
                }
            }, 200);
        }

        // Add search notification function
        function showSearchNotification(message, type = 'info') {
            const notification = document.createElement('div');
            const colors = {
                'success': '#10b981',
                'warning': '#f59e0b',
                'error': '#ef4444',
                'info': '#3b82f6'
            };
            
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: ${colors[type] || colors.info};
                color: white;
                padding: 12px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 10000;
                font-weight: 500;
                transform: translateX(100%);
                transition: transform 0.3s ease;
                max-width: 300px;
                font-size: 14px;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => notification.style.transform = 'translateX(0)', 100);
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        // Hide search results when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.kyou-search-wrapper')) {
                searchResults.style.display = 'none';
            }
        });

        // Mobile search toggle functionality
        const mobileSearchToggle = document.getElementById('mobileSearchToggle');
        mobileSearchToggle?.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Create mobile search modal
            const mobileSearchModal = document.createElement('div');
            mobileSearchModal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.8);
                z-index: 10000;
                display: flex;
                align-items: flex-start;
                justify-content: center;
                padding-top: 100px;
            `;
            
            mobileSearchModal.innerHTML = `
                <div style="background: white; border-radius: 15px; padding: 20px; width: 90%; max-width: 500px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h5 style="margin: 0; color: var(--primary);">
                            <i class="fas fa-search"></i> Pencarian
                        </h5>
                        <button id="closeMobileSearch" style="background: none; border: none; font-size: 24px; color: #666;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="kyou-search-wrapper">
                        <input type="text" class="kyou-search-input" placeholder="Cari menu, promo, atau informasi..." id="mobileGlobalSearch" style="margin-bottom: 10px;">
                        <button class="kyou-search-btn" type="button" id="mobileSearchBtn">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="kyou-search-results" id="mobileSearchResults"></div>
                    </div>
                </div>
            `;
            
            document.body.appendChild(mobileSearchModal);
            
            // Focus on mobile search input
            const mobileSearchInput = document.getElementById('mobileGlobalSearch');
            mobileSearchInput.focus();
            
            // Add event listeners for mobile search
            const mobileSearchBtn = document.getElementById('mobileSearchBtn');
            const mobileSearchResults = document.getElementById('mobileSearchResults');
            
            mobileSearchBtn.addEventListener('click', function() {
                const query = mobileSearchInput.value.toLowerCase().trim();
                if (query.length < 1) {
                    showSearchNotification('Masukkan kata kunci pencarian', 'warning');
                    return;
                }
                
                const results = searchData.filter(item => 
                    item.title.toLowerCase().includes(query) || 
                    item.description.toLowerCase().includes(query) ||
                    item.category.toLowerCase().includes(query)
                );
                
                if (results.length === 0) {
                    mobileSearchResults.innerHTML = `
                        <div class="kyou-search-result-item">
                            <div class="kyou-search-result-title">Tidak ada hasil ditemukan</div>
                        </div>
                    `;
                } else {
                    mobileSearchResults.innerHTML = results.map(item => `
                        <div class="kyou-search-result-item" onclick="selectMobileSearchResult('${item.title}', '${item.category}')">
                            <div class="kyou-search-result-title">${highlightText(item.title, query)}</div>
                            <p class="kyou-search-result-desc">${highlightText(item.description, query)}</p>
                            <span class="kyou-search-result-category">${item.category}</span>
                        </div>
                    `).join('');
                }
                
                mobileSearchResults.style.display = 'block';
            });
            
            // Close mobile search
            document.getElementById('closeMobileSearch').addEventListener('click', function() {
                document.body.removeChild(mobileSearchModal);
            });
            
            // Close on backdrop click
            mobileSearchModal.addEventListener('click', function(e) {
                if (e.target === mobileSearchModal) {
                    document.body.removeChild(mobileSearchModal);
                }
            });
        });

        function selectMobileSearchResult(title, category) {
            showSearchNotification(`✅ Menampilkan hasil untuk: ${title}`, 'success');
            // Close mobile search modal
            const modal = document.querySelector('[style*="position: fixed"][style*="z-index: 10000"]');
            if (modal) {
                document.body.removeChild(modal);
            }
        }

        // Initialize search functionality
        console.log('Search functionality initialized!');
        
        // ... existing code ...

        // Premium Testimonials Carousel
        let currentTestimonial = 0;
        const testimonialCards = document.querySelectorAll('.kyou-testimonial-card');
        const testimonialIndicators = document.querySelectorAll('.kyou-testimonial-indicator');
        const testimonialTrack = document.getElementById('testimonialsTrack');
        const testimonialPrev = document.getElementById('testimonialPrev');
        const testimonialNext = document.getElementById('testimonialNext');

        function updateTestimonials() {
            // Move the track to show current testimonial
            const translateX = -currentTestimonial * 25; // 25% per slide
            testimonialTrack.style.transform = `translateX(${translateX}%)`;
            
            // Update indicators
            testimonialIndicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentTestimonial);
            });
            
            // Update active class for styling (optional)
            testimonialCards.forEach((card, index) => {
                card.classList.toggle('active', index === currentTestimonial);
            });
        }

        function nextTestimonial() {
            currentTestimonial = (currentTestimonial + 1) % testimonialCards.length;
            updateTestimonials();
        }

        function prevTestimonial() {
            currentTestimonial = (currentTestimonial - 1 + testimonialCards.length) % testimonialCards.length;
            updateTestimonials();
        }

        testimonialNext?.addEventListener('click', nextTestimonial);
        testimonialPrev?.addEventListener('click', prevTestimonial);

        // Testimonial indicators
        testimonialIndicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentTestimonial = index;
                updateTestimonials();
            });
        });

        // Initialize testimonials
        updateTestimonials();

        // Auto-play testimonials
        setInterval(nextTestimonial, 6000);

        // Animated Counter for Stats
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current).toLocaleString();
            }, 16);
        }

        // Intersection Observer for stats animation
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.target);
                    if (target) {
                        animateCounter(entry.target, target);
                    }
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        document.querySelectorAll('.kyou-stat-number[data-target]').forEach(stat => {
            statsObserver.observe(stat);
        });

        // PWA Installation Prompt
        let deferredPrompt;
        const pwaPrompt = document.createElement('div');
        pwaPrompt.className = 'kyou-pwa-prompt';
        pwaPrompt.innerHTML = `
            <div class="kyou-pwa-content">
                <div class="kyou-pwa-text">
                    <div class="kyou-pwa-title">📱 Install FoodMarket App</div>
                    <p class="kyou-pwa-desc">Akses lebih cepat dan notifikasi promo eksklusif!</p>
                </div>
                <div class="kyou-pwa-actions">
                    <button class="kyou-pwa-btn" onclick="dismissPWAPrompt()">Nanti</button>
                    <button class="kyou-pwa-btn primary" onclick="installPWA()">Install</button>
                </div>
            </div>
        `;
        document.body.appendChild(pwaPrompt);

        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            
            // Show PWA prompt after 3 seconds
            setTimeout(() => {
                pwaPrompt.classList.add('show');
            }, 3000);
        });

        function installPWA() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('PWA installed');
                    }
                    deferredPrompt = null;
                    dismissPWAPrompt();
                });
            }
        }

        function dismissPWAPrompt() {
            pwaPrompt.classList.remove('show');
        }

        // Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then((registration) => {
                        console.log('SW registered: ', registration);
                    })
                    .catch((registrationError) => {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }

        // Performance Analytics
        function trackPerformance() {
            if ('performance' in window) {
                window.addEventListener('load', () => {
                    setTimeout(() => {
                        const perfData = performance.getEntriesByType('navigation')[0];
                        const metrics = {
                            loadTime: perfData.loadEventEnd - perfData.loadEventStart,
                            domContentLoaded: perfData.domContentLoadedEventEnd - perfData.domContentLoadedEventStart,
                            firstPaint: performance.getEntriesByType('paint')[0]?.startTime || 0,
                            firstContentfulPaint: performance.getEntriesByType('paint')[1]?.startTime || 0
                        };
                        
                        console.log('Performance Metrics:', metrics);
                        // In real implementation, send to analytics service
                    }, 0);
                });
            }
        }

        trackPerformance();

        // Enhanced User Experience Features
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Page visibility API for analytics
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                console.log('Page hidden');
                // Track time spent on page
            } else {
                console.log('Page visible');
                // Resume tracking
            }
        });

        // Network status monitoring
        window.addEventListener('online', () => {
            console.log('Back online');
            // Show online indicator
        });

        window.addEventListener('offline', () => {
            console.log('Gone offline');
            // Show offline indicator
        });
    </script>
</body>
</html>
