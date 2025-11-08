<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo Spesial - FoodMarket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-purple: #8B5CF6;
            --secondary-purple: #A855F7;
            --light-purple: #F3E8FF;
            --dark-purple: #6D28D9;
            --gradient-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-card: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            --text-dark: #1F2937;
            --text-light: #6B7280;
            --white: #FFFFFF;
            --shadow: 0 20px 40px rgba(139, 92, 246, 0.1);
            --shadow-hover: 0 30px 60px rgba(139, 92, 246, 0.2);
            --border-radius: 20px;
            --gold: #FFD700;
            --star-empty: #E5E7EB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            overflow-x: hidden;
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

.loading-overlay.hidden {
    opacity: 0;
    visibility: hidden;
    display: none !important;
}


        .loading-content {
            text-align: center;
            color: white;
        }

        .loading-logo {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: bounceIn 1.5s ease-out;
        }

        .loading-text {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            margin: 0 auto;
            animation: spin 1s linear infinite;
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3) rotate(-10deg);
            }
            50% {
                opacity: 1;
                transform: scale(1.05) rotate(5deg);
            }
            70% {
                transform: scale(0.9) rotate(-2deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Navbar */
        .navbar {
            background: var(--gradient-bg);
            padding: 1rem 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            position: relative;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Header Section */
        .promo-header {
            background: var(--gradient-bg);
            padding: 6rem 0;
            text-align: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .promo-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="%23ffffff" opacity="0.1"/></svg>') repeat;
            animation: float 20s infinite linear;
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: floatUpDown 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            top: 40%;
            left: 80%;
            animation-delay: 4s;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            100% { transform: translateY(-100px); }
        }

        @keyframes floatUpDown {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .header-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .promo-header h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            background: linear-gradient(45deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .promo-header p {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 3rem;
            font-weight: 300;
        }

        .promo-stats {
            display: flex;
            justify-content: center;
            gap: 4rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.8;
            font-weight: 500;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 5rem 2rem;
        }

        /* Filter Section */
        .filter-section {
            margin-bottom: 4rem;
            text-align: center;
        }

        .filter-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 1rem 2rem;
            border: 2px solid var(--primary-purple);
            background: var(--white);
            color: var(--primary-purple);
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.4s ease;
            font-weight: 600;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-purple);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .filter-btn:hover::before,
        .filter-btn.active::before {
            left: 0;
        }

        .filter-btn:hover,
        .filter-btn.active {
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        /* Promo Grid */
        .promo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 2.5rem;
            margin-bottom: 4rem;
        }

        .promo-card {
            background: var(--gradient-card);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .promo-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(139, 92, 246, 0.05), rgba(168, 85, 247, 0.05));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .promo-card:hover::before {
            opacity: 1;
        }

        .promo-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: var(--shadow-hover);
        }

        .promo-image {
            width: 100%;
            height: 280px;
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            position: relative;
            overflow: hidden;
        }

        .promo-image::before {
            content: '🍔';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 5rem;
            opacity: 0.8;
            transition: transform 0.3s ease;
        }

        .promo-card:hover .promo-image::before {
            transform: translate(-50%, -50%) scale(1.1) rotate(10deg);
        }

        .promo-badge {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: linear-gradient(45deg, #ff4757, #ff3838);
            color: var(--white);
            padding: 0.7rem 1.2rem;
            border-radius: 25px;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 8px 25px rgba(255, 71, 87, 0.4);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .promo-content {
            padding: 2rem;
        }

        .promo-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .promo-description {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .promo-price {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .original-price {
            text-decoration: line-through;
            color: var(--text-light);
            font-size: 1rem;
        }

        .promo-price-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-purple);
        }

        .discount-percent {
            background: var(--light-purple);
            color: var(--primary-purple);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .promo-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .promo-timer {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #ff4757;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .order-btn {
            background: var(--gradient-bg);
            color: var(--white);
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .order-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .order-btn:hover::before {
            left: 100%;
        }

        .order-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.4);
        }

        /* Reviews Section */
        .reviews-section {
            background: var(--white);
            padding: 5rem 2rem;
            margin: 5rem 0;
            border-radius: 30px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            z-index: 5;
        }

        .reviews-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(139, 92, 246, 0.02), rgba(168, 85, 247, 0.02));
        }

        .reviews-header {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
            z-index: 2;
        }

        .reviews-header h2 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 1rem;
            background: var(--gradient-bg);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .reviews-header p {
            font-size: 1.2rem;
            color: var(--text-light);
            font-weight: 300;
        }

        .reviews-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 4rem;
            flex-wrap: wrap;
        }

        .review-stat {
            text-align: center;
            padding: 2rem;
            background: var(--gradient-card);
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.1);
            transition: transform 0.3s ease;
            border: 1px solid rgba(139, 92, 246, 0.1);
        }

        .review-stat:hover {
            transform: translateY(-5px);
        }

        .review-stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-purple);
            display: block;
            margin-bottom: 0.5rem;
        }

        .review-stat-label {
            font-size: 1rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .reviews-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .review-card {
            background: var(--gradient-card);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(139, 92, 246, 0.1);
            position: relative;
            overflow: hidden;
        }

        .review-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(139, 92, 246, 0.03), rgba(168, 85, 247, 0.03));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .review-card:hover::before {
            opacity: 1;
        }

        .review-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.15);
        }

        .review-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .reviewer-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--gradient-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--white);
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(139, 92, 246, 0.3);
        }

        .reviewer-info h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.3rem;
        }

        .reviewer-info .review-date {
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 400;
        }

        .rating {
            display: flex;
            gap: 0.3rem;
            margin-bottom: 1.5rem;
        }

        .star {
            font-size: 1.2rem;
            color: var(--star-empty);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .star.filled {
            color: var(--gold);
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
        }
        
        .star:hover {
            transform: scale(1.2);
        }

        .review-text {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--text-dark);
            margin-bottom: 1rem;
            font-style: italic;
        }

        .review-product {
            font-size: 0.9rem;
            color: var(--primary-purple);
            font-weight: 600;
            background: var(--light-purple);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: inline-block;
        }

        /* Review Form */
        .review-form-section {
            background: var(--gradient-card);
            padding: 3rem;
            border-radius: var(--border-radius);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.1);
            border: 1px solid rgba(139, 92, 246, 0.1);
        }

        .review-form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .review-form-header h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .review-form-header p {
            color: var(--text-light);
            font-size: 1rem;
        }

        .review-form {
            display: grid;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 1rem;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-purple);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .rating-input {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .rating-input .star {
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .rating-input .star:hover,
        .rating-input .star.active {
            color: var(--gold);
            transform: scale(1.1);
        }

        .submit-btn {
            background: var(--gradient-bg);
            color: var(--white);
            border: none;
            padding: 1.2rem 3rem;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            justify-self: center;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.4);
        }

        /* Special Offers Section */
        .special-offers {
            background: var(--gradient-bg);
            padding: 5rem 2rem;
            margin: 5rem 0;
            border-radius: 30px;
            color: var(--white);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .special-offers::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: rotate 30s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .special-content {
            position: relative;
            z-index: 2;
        }

        .special-offers h2 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            font-weight: 800;
        }

        .special-offers p {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .special-btn {
            background: var(--white);
            color: var(--primary-purple);
            border: none;
            padding: 1.2rem 3rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .special-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 4rem 0 2rem;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .footer-links a:hover {
            color: var(--primary-purple);
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 2rem;
            margin-top: 3rem;
            opacity: 0.7;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .promo-header h1 {
                font-size: 2.5rem;
            }

            .promo-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .promo-grid {
                grid-template-columns: 1fr;
            }

            .reviews-grid {
                grid-template-columns: 1fr;
            }

            .reviews-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .filter-buttons {
                flex-direction: column;
                align-items: center;
            }

            .special-offers {
                margin: 3rem 0;
                padding: 3rem 1rem;
            }

            .special-offers h2 {
                font-size: 2rem;
            }

            .reviews-header h2 {
                font-size: 2rem;
            }

            .promo-footer {
                flex-direction: column;
                gap: 1rem;
            }

            .review-form-section {
                padding: 2rem;
            }
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* Scroll animations */
        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s ease;
        }

        .scroll-animate.animate {
            opacity: 1;
            transform: translateY(0);
        }

        /* Review animations */
        .review-card {
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .star-animation {
            animation: starPulse 0.3s ease-in-out;
        }

        @keyframes starPulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1);
            }
        }
        .promo-header::before,
        .reviews-section::before,
        .special-offers::before,
        .floating-elements {
         pointer-events: none;
}
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-logo">🍽️</div>
            <div class="loading-text">FoodMarket</div>
            <div class="loading-spinner"></div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="logo">🍽️ FoodMarket</a>
            <ul class="nav-links">
                <li><a href="/">Beranda</a></li>
                <li><a href="/menu">Menu</a></li>
                <li><a href="/promo" class="active">Promo</a></li>
                <li><a href="/ai">AI Assistant</a></li>
            </ul>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="promo-header">
        <div class="floating-elements">
            <div class="floating-element">🍕</div>
            <div class="floating-element">🍔</div>
            <div class="floating-element">🍟</div>
        </div>
        <div class="header-content">
            <h1 class="fade-in">🎉 Promo Spesial</h1>
            <p class="fade-in">Nikmati penawaran terbaik dari FoodMarket! Hemat hingga 50% untuk makanan favorit Anda.</p>
            <div class="promo-stats fade-in">
                <div class="stat-item">
                    <span class="stat-number">50%</span>
                    <span class="stat-label">Diskon Maksimal</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100+</span>
                    <span class="stat-label">Menu Promo</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Tersedia</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Filter Section -->
        <section class="filter-section scroll-animate">
            <div class="filter-buttons">
                <button class="filter-btn active">Semua Promo</button>
                <button class="filter-btn">Flash Sale</button>
                <button class="filter-btn">Diskon Besar</button>
                <button class="filter-btn">Buy 1 Get 1</button>
                <button class="filter-btn">Paket Hemat</button>
            </div>
        </section>

        <!-- Promo Grid -->
        <section class="promo-grid">
            <!-- Promo Card 1 -->
            <div class="promo-card scroll-animate slide-in-left">
                <div class="promo-image" style="background: linear-gradient(45deg, #ff6b6b, #feca57);">
                    <div class="promo-badge">-40%</div>
                </div>
                <div class="promo-content">
                    <h3 class="promo-title">Burger Spesial Combo</h3>
                    <p class="promo-description">Burger daging sapi premium dengan kentang goreng dan minuman segar</p>
                    <div class="promo-price">
                        <span class="original-price">Rp 50.000</span>
                        <span class="promo-price-value">Rp 30.000</span>
                        <span class="discount-percent">40% OFF</span>
                    </div>
                    <div class="promo-footer">
                        <div class="promo-timer">
                            <i class="fas fa-clock"></i>
                            <span>2 hari lagi</span>
                        </div>
                        <button class="order-btn">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Promo Card 2 -->
            <div class="promo-card scroll-animate">
                <div class="promo-image" style="background: linear-gradient(45deg, #ff9ff3, #f368e0);">
                    <div class="promo-badge">-50%</div>
                </div>
                <div class="promo-content">
                    <h3 class="promo-title">Pizza Margherita Jumbo</h3>
                    <p class="promo-description">Pizza ukuran jumbo dengan topping keju mozzarella dan saus tomat segar</p>
                    <div class="promo-price">
                        <span class="original-price">Rp 80.000</span>
                        <span class="promo-price-value">Rp 40.000</span>
                        <span class="discount-percent">50% OFF</span>
                    </div>
                    <div class="promo-footer">
                        <div class="promo-timer">
                            <i class="fas fa-clock"></i>
                            <span>5 hari lagi</span>
                        </div>
                        <button class="order-btn">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Promo Card 3 -->
            <div class="promo-card scroll-animate slide-in-right">
                <div class="promo-image" style="background: linear-gradient(45deg, #54a0ff, #2e86de);">
                    <div class="promo-badge">Buy 1 Get 1</div>
                </div>
                <div class="promo-content">
                    <h3 class="promo-title">Ayam Goreng Crispy</h3>
                    <p class="promo-description">Ayam goreng crispy dengan bumbu rahasia, beli 1 gratis 1 porsi</p>
                    <div class="promo-price">
                        <span class="original-price">Rp 60.000</span>
                        <span class="promo-price-value">Rp 30.000</span>
                        <span class="discount-percent">BOGO</span>
                    </div>
                    <div class="promo-footer">
                        <div class="promo-timer">
                            <i class="fas fa-clock"></i>
                            <span>1 minggu lagi</span>
                        </div>
                        <button class="order-btn">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Promo Card 4 -->
            <div class="promo-card scroll-animate slide-in-left">
                <div class="promo-image" style="background: linear-gradient(45deg, #26de81, #20bf6b);">
                    <div class="promo-badge">-35%</div>
                </div>
                <div class="promo-content">
                    <h3 class="promo-title">Nasi Gudeg Jogja</h3>
                    <p class="promo-description">Nasi gudeg khas Jogja dengan ayam, telur, dan sambal krecek</p>
                    <div class="promo-price">
                        <span class="original-price">Rp 25.000</span>
                        <span class="promo-price-value">Rp 16.250</span>
                        <span class="discount-percent">35% OFF</span>
                    </div>
                    <div class="promo-footer">
                        <div class="promo-timer">
                            <i class="fas fa-clock"></i>
                            <span>3 hari lagi</span>
                        </div>
                        <button class="order-btn">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Promo Card 5 -->
            <div class="promo-card scroll-animate">
                <div class="promo-image" style="background: linear-gradient(45deg, #fd79a8, #e84393);">
                    <div class="promo-badge">-45%</div>
                </div>
                <div class="promo-content">
                    <h3 class="promo-title">Paket Keluarga Hemat</h3>
                    <p class="promo-description">Paket lengkap untuk 4 orang: nasi, ayam, sayur, dan minuman</p>
                    <div class="promo-price">
                        <span class="original-price">Rp 120.000</span>
                        <span class="promo-price-value">Rp 66.000</span>
                        <span class="discount-percent">45% OFF</span>
                    </div>
                    <div class="promo-footer">
                        <div class="promo-timer">
                            <i class="fas fa-clock"></i>
                            <span>1 hari lagi</span>
                        </div>
                        <button class="order-btn">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Promo Card 6 -->
            <div class="promo-card scroll-animate slide-in-right">
                <div class="promo-image" style="background: linear-gradient(45deg, #a29bfe, #6c5ce7);">
                    <div class="promo-badge">Flash Sale</div>
                </div>
                <div class="promo-content">
                    <h3 class="promo-title">Es Krim Sundae Deluxe</h3>
                    <p class="promo-description">Es krim premium dengan topping buah segar dan saus cokelat</p>
                    <div class="promo-price">
                        <span class="original-price">Rp 35.000</span>
                        <span class="promo-price-value">Rp 17.500</span>
                        <span class="discount-percent">50% OFF</span>
                    </div>
                    <div class="promo-footer">
                        <div class="promo-timer">
                            <i class="fas fa-clock"></i>
                            <span>6 jam lagi</span>
                        </div>
                        <button class="order-btn">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Reviews Section -->
<section class="reviews-section scroll-animate">
    <div class="reviews-header">
        <h2>⭐ Ulasan Pelanggan</h2>
        <p>Lihat apa kata pelanggan kami tentang promo-promo terbaik FoodMarket</p>
    </div>

    <div class="reviews-stats">
        <div class="review-stat">
            <span id="averageRating" class="review-stat-number">4.8</span>
            <span class="review-stat-label">Rating Rata-rata</span>
        </div>
        <div class="review-stat">
            <span id="totalReviews" class="review-stat-number">6</span>
            <span class="review-stat-label">Total Ulasan</span>
        </div>
        <div class="review-stat">
            <span id="customerSatisfaction" class="review-stat-number">98%</span>
            <span class="review-stat-label">Kepuasan Pelanggan</span>
        </div>
    </div>

    <div class="reviews-grid">
        <!-- Review Card 1 -->
        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">A</div>
                <div class="reviewer-info">
                    <h4>Ahmad Rizki</h4>
                    <span class="review-date">2 hari yang lalu</span>
                </div>
            </div>
            <div class="rating">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
            </div>
            <p class="review-text">"Burger Spesial Combo-nya luar biasa! Dagingnya juicy dan kentang gorengnya crispy. Dengan diskon 40%, ini benar-benar worth it!"</p>
            <span class="review-product">Burger Spesial Combo</span>
        </div>

        <!-- Review Card 2 -->
        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">S</div>
                <div class="reviewer-info">
                    <h4>Sari Dewi</h4>
                    <span class="review-date">1 minggu yang lalu</span>
                </div>
            </div>
            <div class="rating">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star">★</span>
            </div>
            <p class="review-text">"Pizza Margherita Jumbo-nya ukurannya besar banget! Kejunya melimpah dan rasanya autentik. Promo 50% off bikin makin hemat."</p>
            <span class="review-product">Pizza Margherita Jumbo</span>
        </div>

        <!-- Review Card 3 -->
        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">B</div>
                <div class="reviewer-info">
                    <h4>Budi Santoso</h4>
                    <span class="review-date">3 hari yang lalu</span>
                </div>
            </div>
            <div class="rating">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
            </div>
            <p class="review-text">"Ayam Goreng Crispy dengan promo BOGO sangat menguntungkan! Ayamnya crispy di luar, tender di dalam. Bumbu rahasianya memang top!"</p>
            <span class="review-product">Ayam Goreng Crispy</span>
        </div>

        <!-- Review Card 4 -->
        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">L</div>
                <div class="reviewer-info">
                    <h4>Linda Maharani</h4>
                    <span class="review-date">5 hari yang lalu</span>
                </div>
            </div>
            <div class="rating">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star">★</span>
            </div>
            <p class="review-text">"Nasi Gudeg Jogja-nya authentic banget! Rasa manisnya pas, ayam dan telurnya empuk. Diskon 35% bikin makin terjangkau."</p>
            <span class="review-product">Nasi Gudeg Jogja</span>
        </div>

        <!-- Review Card 5 -->
        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">R</div>
                <div class="reviewer-info">
                    <h4>Rina Kusuma</h4>
                    <span class="review-date">1 hari yang lalu</span>
                </div>
            </div>
            <div class="rating">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
            </div>
            <p class="review-text">"Paket Keluarga Hemat sangat cocok untuk makan bersama keluarga. Porsinya banyak, rasanya enak, dan harganya sangat terjangkau!"</p>
            <span class="review-product">Paket Keluarga Hemat</span>
        </div>

        <!-- Review Card 6 -->
        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">D</div>
                <div class="reviewer-info">
                    <h4>Doni Pratama</h4>
                    <span class="review-date">4 hari yang lalu</span>
                </div>
            </div>
            <div class="rating">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star">★</span>
            </div>
            <p class="review-text">"Es Krim Sundae Deluxe-nya segar banget! Topping buahnya fresh dan saus coklatnya creamy. Flash sale 50% off bikin happy!"</p>
            <span class="review-product">Es Krim Sundae Deluxe</span>
        </div>
    </div>

    <!-- Review Form -->
    <div class="review-form-section">
        <div class="review-form-header">
            <h3>✍️ Berikan Ulasan Anda</h3>
            <p>Bagikan pengalaman Anda dengan promo-promo FoodMarket</p>
        </div>
        <form class="review-form" id="reviewForm">
            <div class="form-group">
                <label for="reviewerName">Nama Lengkap</label>
                <input type="text" id="reviewerName" name="reviewerName" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="form-group">
                <label for="productSelect">Produk yang Diulas</label>
                <select id="productSelect" name="productSelect" required>
                    <option value="">Pilih produk yang ingin diulas</option>
                    <option value="Burger Spesial Combo">Burger Spesial Combo</option>
                    <option value="Pizza Margherita Jumbo">Pizza Margherita Jumbo</option>
                    <option value="Ayam Goreng Crispy">Ayam Goreng Crispy</option>
                    <option value="Nasi Gudeg Jogja">Nasi Gudeg Jogja</option>
                    <option value="Paket Keluarga Hemat">Paket Keluarga Hemat</option>
                    <option value="Es Krim Sundae Deluxe">Es Krim Sundae Deluxe</option>
                </select>
            </div>
            <div class="form-group">
                <label>Rating</label>
                <div class="rating-input" id="ratingInput">
                    <span class="star" data-rating="1">★</span>
                    <span class="star" data-rating="2">★</span>
                    <span class="star" data-rating="3">★</span>
                    <span class="star" data-rating="4">★</span>
                    <span class="star" data-rating="5">★</span>
                </div>
            </div>
            <div class="form-group">
                <label for="reviewText">Ulasan Anda</label>
                <textarea id="reviewText" name="reviewText" placeholder="Ceritakan pengalaman Anda dengan produk ini..." required></textarea>
            </div>
            <button type="submit" class="submit-btn">Kirim Ulasan</button>
        </form>
    </div>
</section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-links">
                <a href="/">Beranda</a>
                <a href="/menu">Menu</a>
                <a href="/promo">Promo</a>
                <a href="/tentang">Tentang Kami</a>
                <a href="/kontak">Kontak</a>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 FoodMarket. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
// Loading Overlay
window.addEventListener('load', function() {
    setTimeout(() => {
        document.getElementById('loadingOverlay').classList.add('hidden');
    }, 2000);
});

// Scroll Animation
const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate');
        }
    });
}, observerOptions);
document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));

// ========= FORM ULASAN =========
let selectedRating = 0;

// Klik bintang
document.querySelectorAll('#ratingInput .star').forEach(star => {
    star.addEventListener('click', function() {
        selectedRating = parseInt(this.getAttribute('data-rating'));

        // reset semua bintang
        document.querySelectorAll('#ratingInput .star').forEach(s => s.classList.remove('filled'));

        // isi sesuai rating yang dipilih
        for (let i = 0; i < selectedRating; i++) {
            document.querySelectorAll('#ratingInput .star')[i].classList.add('filled');
        }
    });
});

// ================= Tambahan: Variabel rating =================
let totalReviews = parseInt(document.querySelectorAll(".reviews-grid .review-card").length); 
let sumRatings = 0;

// Ambil rating awal dari review yang sudah ada
document.querySelectorAll(".reviews-grid .review-card").forEach(card => {
    let filledStars = card.querySelectorAll(".rating .star.filled").length;
    sumRatings += filledStars;
});

// Update statistik rating
function updateReviewStats(newRating) {
    totalReviews++;
    sumRatings += newRating;

    let avgRating = (sumRatings / totalReviews).toFixed(1);

    document.querySelector(".review-stat:nth-child(1) .review-stat-number").textContent = avgRating;
    document.querySelector(".review-stat:nth-child(2) .review-stat-number").textContent = totalReviews.toLocaleString();
}

// ================= Submit ulasan =================
document.getElementById("reviewForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const nama = document.getElementById("reviewerName").value.trim();
    const produk = document.getElementById("productSelect").value;
    const ulasan = document.getElementById("reviewText").value.trim();

    if (!nama || !produk || !ulasan || selectedRating === 0) {
        alert("Harap isi semua field dan pilih rating!");
        return;
    }

    // ambil huruf pertama untuk avatar
    const avatar = nama.charAt(0).toUpperCase();

    // buat elemen review baru
    const reviewContainer = document.querySelector(".reviews-grid");
    const reviewCard = document.createElement("div");
    reviewCard.classList.add("review-card");

    // bintang rating
    let stars = "";
    for (let i = 1; i <= 5; i++) {
        stars += i <= selectedRating
            ? `<span class="star filled">★</span>`
            : `<span class="star">★</span>`;
    }

    reviewCard.innerHTML = `
        <div class="review-header">
            <div class="reviewer-avatar">${avatar}</div>
            <div class="reviewer-info">
                <h4>${nama}</h4>
                <span class="review-date">Baru saja</span>
            </div>
        </div>
        <div class="rating">${stars}</div>
        <p class="review-text">"${ulasan}"</p>
        <span class="review-product">${produk}</span>
    `;

    // Tambahkan ke atas list ulasan
    reviewContainer.prepend(reviewCard);

    // ================= Tambahan: update rating =================
    updateReviewStats(selectedRating);

    // Reset form
    document.getElementById("reviewForm").reset();
    selectedRating = 0;
    document.querySelectorAll('#ratingInput .star').forEach(s => s.classList.remove('filled'));
});

   
 </script>
</body>
</html>
