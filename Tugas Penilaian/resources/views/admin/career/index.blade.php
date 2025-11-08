<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Karir</title>
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
        
        .btn-download {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            border: none;
            cursor: pointer;
        }
        
        .btn-download:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
            color: white;
        }
        
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: none;
        }
        
        .alert-success {
            background-color: rgba(76, 201, 240, 0.15);
            border-left: 4px solid var(--success);
            color: #333;
        }
        
        .table-data {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .table-data .head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .table-data .head h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin: 0;
        }
        
        .table-data table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table-data th, .table-data td {
            padding: 15px;
            text-align: left;
        }
        
        .table-data th {
            font-weight: 600;
            color: #333;
            background-color: #f8f9fa;
            position: relative;
        }
        
        .table-data th:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        
        .table-data th:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        
        .table-data tr {
            transition: all 0.3s ease;
        }
        
        .table-data tr:hover {
            background-color: #f8f9fa;
        }
        
        .table-data td {
            border-bottom: 1px solid #eee;
            color: #555;
        }
        
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }
        
        .status.completed {
            background-color: rgba(76, 201, 240, 0.15);
            color: var(--success);
        }
        
        .status.pending {
            background-color: rgba(247, 37, 133, 0.15);
            color: var(--warning);
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .btn-edit, .btn-delete {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-edit {
            color: var(--info);
            background-color: rgba(72, 149, 239, 0.1);
        }
        
        .btn-edit:hover {
            background-color: var(--info);
            color: white;
        }
        
        .btn-delete {
            color: var(--danger);
            background-color: rgba(230, 57, 70, 0.1);
        }
        
        .btn-delete:hover {
            background-color: var(--danger);
            color: white;
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
                    <h1>Manajemen Karir</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li><i class="fas fa-chevron-right"></i></li>
                        <li>
                            <a class="active" href="{{ route('admin.career.index') }}">Manajemen Karir</a>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('admin.career.create') }}" class="btn-download">
                    <i class="fas fa-plus"></i>
                    <span class="text">Tambah Lowongan</span>
                </a>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
            @endif

            <div class="table-data">
                <div class="head">
                    <h3>Daftar Lowongan Kerja</h3>
                    <div>
                        <i class="fas fa-search me-3"></i>
                        <i class="fas fa-filter"></i>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Deadline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vacancies as $key => $vacancy)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($vacancy->photo)
                                    <img src="{{ asset($vacancy->photo) }}" alt="{{ $vacancy->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $vacancy->title }}</td>
                            <td>{{ $vacancy->location }}</td>
                            <td>{{ $vacancy->type }}</td>
                            <td>
                                <span class="status {{ $vacancy->status == 'open' ? 'completed' : 'pending' }}">
                                    {{ $vacancy->status == 'open' ? 'Dibuka' : 'Ditutup' }}
                                </span>
                            </td>
                            <td>{{ $vacancy->deadline->format('d M Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.career.edit', $vacancy->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.career.destroy', $vacancy->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="fas fa-folder-open text-muted mb-3" style="font-size: 2rem;"></i>
                                    <p class="mb-0">Tidak ada data lowongan kerja</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>