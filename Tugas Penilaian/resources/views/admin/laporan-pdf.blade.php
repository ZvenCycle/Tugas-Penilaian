<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #333;
            margin-bottom: 5px;
        }
        .period {
            color: #666;
            font-size: 14px;
        }
        .stats-grid {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }
        .stat-row {
            display: table-row;
        }
        .stat-cell {
            display: table-cell;
            width: 33.33%;
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .stat-value {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .stat-label {
            color: #666;
            font-size: 11px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            color: #666;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN PENJUALAN</h1>
        <p class="period">Periode: {{ date('d/m/Y', strtotime($startDate)) }} - {{ date('d/m/Y', strtotime($endDate)) }}</p>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <!-- Ringkasan Statistik -->
    <div class="section">
        <div class="section-title">RINGKASAN STATISTIK</div>
        <div class="stats-grid">
            <div class="stat-row">
                <div class="stat-cell">
                    <div class="stat-value">{{ number_format($reportData['summary']['total_orders']) }}</div>
                    <div class="stat-label">Total Pesanan</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-value">Rp {{ number_format($reportData['summary']['total_revenue'], 0, ',', '.') }}</div>
                    <div class="stat-label">Total Pendapatan</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-value">{{ $reportData['summary']['completion_rate'] }}%</div>
                    <div class="stat-label">Tingkat Penyelesaian</div>
                </div>
            </div>
            <div class="stat-row">
                <div class="stat-cell">
                    <div class="stat-value">{{ number_format($reportData['summary']['completed_orders']) }}</div>
                    <div class="stat-label">Pesanan Selesai</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-value">{{ number_format($reportData['summary']['pending_orders']) }}</div>
                    <div class="stat-label">Pesanan Pending</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-value">{{ number_format($reportData['summary']['cancelled_orders']) }}</div>
                    <div class="stat-label">Pesanan Dibatalkan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Penjualan Harian -->
    <div class="section">
        <div class="section-title">PENJUALAN HARIAN</div>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th class="text-right">Jumlah Pesanan</th>
                    <th class="text-right">Total Penjualan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportData['daily_sales'] as $sale)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($sale->date)) }}</td>
                    <td class="text-right">{{ number_format($sale->orders) }}</td>
                    <td class="text-right">Rp {{ number_format($sale->total, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Menu Terpopuler -->
    <div class="section">
        <div class="section-title">MENU TERPOPULER</div>
        <table>
            <thead>
                <tr>
                    <th>Menu</th>
                    <th class="text-right">Jumlah Terjual</th>
                    <th class="text-right">Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportData['popular_menus'] as $menu)
                <tr>
                    <td>{{ $menu->menu_item }}</td>
                    <td class="text-right">{{ number_format($menu->total_quantity) }}</td>
                    <td class="text-right">Rp {{ number_format($menu->total_revenue, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Laporan ini digenerate secara otomatis oleh sistem RestoAdmin</p>
    </div>
</body>
</html>