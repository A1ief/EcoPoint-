<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .logout-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
            text-align: center;
        }

        .logout-icon {
            font-size: 60px;
            color: #dc3545;
            margin-bottom: 20px;
        }

        .logout-icon i {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        h2 {
            color: #000;
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        p {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 30px;
            font-size: 16px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 140px;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
        }

        .btn-logout:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        .options {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .options p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .options a {
            color: #28a745;
            text-decoration: none;
            margin: 0 10px;
            font-weight: 500;
        }

        .options a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .logout-container {
                padding: 30px 20px;
            }
            
            .button-group {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <div class="logout-icon">
            <i class="fas fa-sign-out-alt"></i>
        </div>
        
        <h2>Anda yakin ingin logout?</h2>
        
        <p>Anda akan keluar dari akun ini dan perlu login kembali untuk mengakses sistem.</p>
        
        <div class="button-group">
            <button class="btn btn-cancel" onclick="batalLogout()">
                <i class="fas fa-times"></i> Batal
            </button>
            <button class="btn btn-logout" onclick="prosesLogout()">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </div>
        
        <div class="options">
            <p>Atau:</p>
            <a href="dashboard">Dashboard</a> | 
            <a href="riwayat-transaksi">Riwayat Transaksi</a> | 
            <a href="dasboard">Poin Saya</a>
        </div>
    </div>

    <script>
        function prosesLogout() {
            // Tampilkan loading
            const logoutBtn = document.querySelector('.btn-logout');
            const originalText = logoutBtn.innerHTML;
            logoutBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            logoutBtn.disabled = true;
            
            // Simulasi proses logout
            setTimeout(() => {
                alert('Logout berhasil! Anda akan dialihkan ke halaman login.');
                // Redirect ke halaman login
                window.location.href = '/';
                
                // Reset tombol
                logoutBtn.innerHTML = originalText;
                logoutBtn.disabled = false;
            }, 1500);
        }

        function batalLogout() {
            if (confirm('Batalkan logout?')) {
                // Kembali ke halaman sebelumnya
                window.history.back();
            }
        }
    </script>
</body>
</html>