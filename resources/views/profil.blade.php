<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
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
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #000;
            font-size: 28px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .profile-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .profile-header {
            background: linear-gradient(135deg, #28a745, #20c997);
            padding: 30px;
            text-align: center;
            color: white;
            position: relative;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid white;
            margin: 0 auto 15px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            color: #28a745;
            overflow: hidden;
        }

        .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .change-photo {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: white;
            color: #28a745;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .profile-name {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .profile-role {
            font-size: 16px;
            opacity: 0.9;
        }

        .profile-body {
            padding: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .info-label {
            font-size: 14px;
            color: #6c757d;
            font-weight: 500;
        }

        .info-value {
            font-size: 16px;
            color: #333;
            font-weight: 500;
            padding: 10px 15px;
            background-color: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #e9ecef;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            border-left: 4px solid #28a745;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            color: #6c757d;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 25px;
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
            min-width: 150px;
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
        }

        .btn-edit:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .btn-change-pass {
            background-color: #17a2b8;
            color: white;
        }

        .btn-change-pass:hover {
            background-color: #138496;
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

        /* Responsive */
        @media (max-width: 768px) {
            .profile-header {
                padding: 20px;
            }
            
            .profile-body {
                padding: 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .profile-pic {
                width: 100px;
                height: 100px;
                font-size: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-user-circle"></i> PROFIL USER</h1>
        </div>

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-pic">
                    <i class="fas fa-user"></i>
                    <!-- <img src="user-photo.jpg" alt="Foto Profil"> -->
                </div>
                <button class="change-photo" onclick="ubahFoto()">
                    <i class="fas fa-camera"></i>
                </button>
                <h2 class="profile-name">Ahmad Santoso</h2>
                <p class="profile-role">Member sejak: 15 Januari 2024</p>
            </div>

            <div class="profile-body">
                <div class="section-title">
                    <i class="fas fa-info-circle"></i> Informasi Pribadi
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Nama Lengkap</span>
                        <div class="info-value">Ahmad Santoso</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <div class="info-value">ahmad.santoso@email.com</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nomor Telepon</span>
                        <div class="info-value">0812-3456-7890</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Alamat</span>
                        <div class="info-value">Jl. Melati No. 123, Jakarta Selatan</div>
                    </div>
                </div>

                <div class="section-title">
                    <i class="fas fa-chart-line"></i> Statistik
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">1,250</div>
                        <div class="stat-label">Total Poin</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Sampah Diterima</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Sampah Ditolak</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Penukaran Berhasil</div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn btn-edit" onclick="editProfil()">
                        <i class="fas fa-edit"></i> Edit Profil
                    </button>
                    <button class="btn btn-change-pass" onclick="ubahPassword()">
                        <i class="fas fa-key"></i> Ubah Password
                    </button>
                    <button class="btn btn-logout" onclick="logout()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function ubahFoto() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            
            input.onchange = function(event) {
                const file = event.target.files[0];
                if (file) {
                    if (file.size > 2 * 1024 * 1024) { // 2MB
                        alert('Ukuran foto maksimal 2MB');
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const profilePic = document.querySelector('.profile-pic');
                        profilePic.innerHTML = `<img src="${e.target.result}" alt="Foto Profil">`;
                    };
                    reader.readAsDataURL(file);
                    
                    alert('Foto profil berhasil diubah!');
                }
            };
            
            input.click();
        }

        function editProfil() {
            alert('Fitur edit profil akan segera tersedia!');
            // window.location.href = 'edit-profil.html';
        }

        function ubahPassword() {
            alert('Fitur ubah password akan segera tersedia!');
            // window.location.href = 'ubah-password.html';
        }

        function logout() {
            if (confirm('Anda yakin ingin logout?')) {
                alert('Logout berhasil!');
                window.location.href = '/';
            }
        }
    </script>
</body>
</html>