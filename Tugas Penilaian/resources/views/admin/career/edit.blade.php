<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Lowongan Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #764ba2;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #f72585;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: #f5f7ff;
            min-height: 100vh;
        }
        
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 280px;
            background: #fff;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .logo h2 {
            color: var(--primary);
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .user-info {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
        }
        
        .user-info h4 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .nav-menu {
            list-style: none;
            padding: 0;
        }
        
        .nav-menu li {
            margin-bottom: 8px;
        }
        
        .nav-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #555;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .nav-menu a:hover, .nav-menu a.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
        }
        
        .nav-menu i {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .main-content {
            flex: 1;
            padding: 30px;
            margin-left: 280px;
        }
        
        .head-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .head-title h1 {
            font-size: 24px;
            color: #333;
            font-weight: 600;
            margin: 0;
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            list-style: none;
            margin: 10px 0 0;
            padding: 0;
        }
        
        .breadcrumb li {
            display: inline-flex;
            align-items: center;
            font-size: 14px;
        }
        
        .breadcrumb a {
            color: #666;
            text-decoration: none;
        }
        
        .breadcrumb a.active {
            color: var(--primary);
            font-weight: 600;
        }
        
        .breadcrumb i {
            margin: 0 8px;
            font-size: 12px;
            color: #999;
        }
        
        .form-container {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
            outline: none;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .text-danger {
            color: var(--danger);
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }
        
        .form-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-primary, .btn-secondary {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }
        
        .btn-primary:hover {
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: #f8f9fa;
            color: #555;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-secondary:hover {
            background: #eee;
        }
        
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                padding: 15px 10px;
            }
            
            .logo h2, .logo p, .user-info h4, .user-info p, .nav-menu span {
                display: none;
            }
            
            .nav-menu i {
                margin-right: 0;
                font-size: 20px;
            }
            
            .nav-menu a {
                justify-content: center;
                padding: 12px;
            }
            
            .main-content {
                margin-left: 70px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <h2>RestoAdmin</h2>
                <p>Karir Panel</p>
            </div>
            
            <div class="user-info">
                <h4>Admin</h4>
                <p>admin@kyouhobbyshop.com</p>
            </div>
            
            <ul class="nav-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.career.index') }}" class="active">
                        <i class="fas fa-briefcase"></i>
                        <span>Karir</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="head-title">
                <div class="left">
                    <h1>Edit Lowongan Kerja</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li><i class="fas fa-chevron-right"></i></li>
                        <li>
                            <a href="{{ route('admin.career.index') }}">Manajemen Karir</a>
                        </li>
                        <li><i class="fas fa-chevron-right"></i></li>
                        <li>
                            <a class="active" href="#">Edit Lowongan</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="form-container">
                <form action="{{ route('admin.career.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Judul Lowongan</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $career->title) }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Lokasi</label>
                                <input type="text" id="location" name="location" value="{{ old('location', $career->location) }}" required>
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Tipe Pekerjaan</label>
                                <select id="type" name="type" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="Full-time" {{ old('type', $career->type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="Part-time" {{ old('type', $career->type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="Contract" {{ old('type', $career->type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                                    <option value="Internship" {{ old('type', $career->type) == 'Internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" required>
                                    <option value="open" {{ old('status', $career->status) == 'open' ? 'selected' : '' }}>Dibuka</option>
                                    <option value="closed" {{ old('status', $career->status) == 'closed' ? 'selected' : '' }}>Ditutup</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $career->deadline->format('Y-m-d')) }}" required>
                                @error('deadline')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto Lowongan</label>
                        @if($career->photo)
                            <div class="current-photo mb-3">
                                <img src="{{ asset('storage/' . $career->photo) }}" alt="Current Photo" style="max-width: 200px; height: auto; border-radius: 8px;">
                                <p class="text-muted mt-2">Foto saat ini</p>
                            </div>
                        @endif
                        <input type="file" id="photo" name="photo" accept="image/*">
                        <small class="form-text text-muted">Upload foto baru untuk lowongan kerja (opsional). Format yang didukung: JPG, PNG, GIF. Maksimal 2MB.</small>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi Pekerjaan</label>
                        <textarea id="description" name="description" rows="5" required>{{ old('description', $career->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="requirements">Persyaratan</label>
                        <textarea id="requirements" name="requirements" rows="5" required>{{ old('requirements', $career->requirements) }}</textarea>
                        @error('requirements')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save me-2"></i>Perbarui
                        </button>
                        <a href="{{ route('admin.career.index') }}" class="btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>