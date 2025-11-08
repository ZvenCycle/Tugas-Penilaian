<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .dashboard-container { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; box-shadow: 2px 0 10px rgba(0,0,0,0.1); }
        .main-content { flex: 1; padding: 20px; overflow-y: auto; }
        .header { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .orders-container { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .orders-table { width: 100%; border-collapse: collapse; }
        .orders-table th, .orders-table td { padding: 12px; text-align: left; border-bottom: 1px solid #e0e0e0; }
        .orders-table th { background: #f8f9fa; font-weight: 600; color: #333; }
        .status-select { padding: 8px; border: 1px solid #ddd; border-radius: 5px; background: white; }
        .btn { padding: 8px 16px; border: none; border-radius: 5px; cursor: pointer; font-weight: 600; }
        .btn-primary { background: linear-gradient(135deg, #667eea, #764ba2); color: white; }
        .btn-success { background: linear-gradient(135deg, #43e97b, #38f9d7); color: white; }
        .status-badge { padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 500; }
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-completed { background: #d1fae5; color: #065f46; }
        .status-cancelled { background: #fee2e2; color: #991b1b; }
        .bulk-actions { margin-bottom: 20px; display: flex; gap: 10px; align-items: center; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar sama seperti dashboard -->
        <div class="sidebar">
            <!-- ... sidebar content ... -->
        </div>
        
        <div class="main-content">
            <div class="header">
                <h1>Manajemen Pesanan</h1>
                <p>Kelola dan update status pesanan pelanggan</p>
            </div>
            
            <div class="orders-container">
                <div class="bulk-actions">
                    <select id="bulkStatus" class="status-select">
                        <option value="">Pilih Status</option>
                        <option value="confirmed">Dikonfirmasi</option>
                        <option value="preparing">Diproses</option>
                        <option value="ready">Siap</option>
                        <option value="delivering">Dikirim</option>
                        <option value="completed">Selesai</option>
                        <option value="cancelled">Dibatalkan</option>
                    </select>
                    <button class="btn btn-primary" onclick="bulkUpdateStatus()">Update Status Terpilih</button>
                    <button class="btn btn-success" onclick="markAllCompleted()">Tandai Semua Selesai</button>
                </div>
                
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>ID Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Menu</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td><input type="checkbox" class="order-checkbox" value="{{ $order->id }}"></td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->menu_item }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td>
                                <select class="status-select" onchange="updateOrderStatus({{ $order->id }}, this.value)">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                                    <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>Diproses</option>
                                    <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>Siap</option>
                                    <option value="delivering" {{ $order->status == 'delivering' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <button class="btn btn-success" onclick="markCompleted({{ $order->id }})">Selesai</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div style="margin-top: 20px;">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function updateOrderStatus(orderId, status) {
            fetch(`/admin/orders/${orderId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('Status pesanan berhasil diupdate!', 'success');
                    location.reload();
                } else {
                    showNotification('Gagal update status pesanan!', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Terjadi kesalahan!', 'error');
            });
        }
        
        function markCompleted(orderId) {
            updateOrderStatus(orderId, 'completed');
        }
        
        function markAllCompleted() {
            const checkboxes = document.querySelectorAll('.order-checkbox:checked');
            const orderIds = Array.from(checkboxes).map(cb => cb.value);
            
            if (orderIds.length === 0) {
                alert('Pilih pesanan terlebih dahulu!');
                return;
            }
            
            bulkUpdate(orderIds, 'completed');
        }
        
        function bulkUpdateStatus() {
            const status = document.getElementById('bulkStatus').value;
            const checkboxes = document.querySelectorAll('.order-checkbox:checked');
            const orderIds = Array.from(checkboxes).map(cb => cb.value);
            
            if (!status) {
                alert('Pilih status terlebih dahulu!');
                return;
            }
            
            if (orderIds.length === 0) {
                alert('Pilih pesanan terlebih dahulu!');
                return;
            }
            
            bulkUpdate(orderIds, status);
        }
        
        function bulkUpdate(orderIds, status) {
            fetch('/admin/orders/bulk-update-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ order_ids: orderIds, status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('Status pesanan berhasil diupdate!', 'success');
                    location.reload();
                } else {
                    showNotification('Gagal update status pesanan!', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Terjadi kesalahan!', 'error');
            });
        }
        
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed; top: 20px; right: 20px; z-index: 9999;
                padding: 15px; border-radius: 5px; color: white;
                background: ${type === 'success' ? '#10b981' : '#ef4444'};
            `;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // Select all functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.order-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    </script>
</body>
</html>