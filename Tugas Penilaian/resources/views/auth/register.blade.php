<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - FoodMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 50%, #48dbfb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
            padding: 2rem 0;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1.5" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
            animation: slide 30s linear infinite;
        }
        
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100px); }
        }
        
        .register-container {
            position: relative;
            z-index: 1;
        }
        
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15), 0 0 0 1px rgba(255,255,255,0.2);
            padding: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }
        
        .register-card:hover {
            transform: translateY(-5px);
        }
        
        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 15px 35px rgba(255, 107, 107, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .logo-icon i {
            font-size: 2.5rem;
            color: white;
        }
        
        .form-title {
            color: #333;
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-subtitle {
            color: #666;
            font-size: 1.1rem;
        }
        
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(255, 107, 107, 0.1);
            border-radius: 15px;
            padding: 1rem 1rem 1rem 3rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }
        
        .form-control:focus {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
            background: white;
            transform: translateY(-2px);
        }
        
        .form-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #ff6b6b;
            font-size: 1.1rem;
        }
        
        .btn-register {
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            border: none;
            border-radius: 15px;
            padding: 1.2rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 107, 0.4);
            background: linear-gradient(135deg, #ff5252 0%, #ffc107 100%);
        }
        
        .login-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 107, 107, 0.1);
        }
        
        .login-link a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .login-link a:hover {
            color: #feca57;
        }
        
        .alert {
            border-radius: 15px;
            border: none;
            margin-bottom: 1.5rem;
        }
        
        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }
        
        .row.form-row {
            margin-bottom: 0;
        }
        
        .row.form-row .col-md-6 {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .register-card {
                padding: 2rem;
                margin: 1rem;
            }
            
            .form-title {
                font-size: 1.8rem;
            }
            
            .row.form-row .col-md-6 {
                padding-right: 15px;
                padding-left: 15px;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container register-container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="register-card">
                    <div class="logo-section">
                        <div class="logo-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h2 class="form-title">Bergabung Bersama Kami</h2>
                        <p class="form-subtitle">Buat akun FoodMarket dan nikmati pengalaman kuliner terbaik</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-user form-icon"></i>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           placeholder="Nama lengkap" value="{{ old('name') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-envelope form-icon"></i>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           placeholder="Email address" value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-lock form-icon"></i>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Password" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-lock form-icon"></i>
                                    <input type="password" class="form-control" id="password_confirmation" 
                                           name="password_confirmation" placeholder="Konfirmasi password" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fas fa-phone form-icon"></i>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" 
                                   placeholder="Nomor telepon (opsional)" value="{{ old('phone_number') }}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-map-marker-alt form-icon"></i>
                            <textarea class="form-control" id="address" name="address" rows="3" 
                                      placeholder="Alamat lengkap (opsional)" style="padding-left: 3rem;">{{ old('address') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-register">
                            <i class="fas fa-rocket me-2"></i>Daftar Sekarang
                        </button>
                    </form>

                    <div class="login-link">
                        <p class="mb-0">Sudah punya akun? 
                            <a href="{{ route('login') }}">Masuk di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>