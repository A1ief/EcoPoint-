<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tukar Sampah</title>
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
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 25px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #28a745;
        }
        
        .header h1 {
            color: #000;
            font-size: 24px;
            font-weight: 700;
        }
        
        .form-section {
            margin-bottom: 25px;
        }
        
        .form-section h2 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #000;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        select, input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 16px;
            background-color: white;
            color: #333;
        }
        
        select:focus, input[type="number"]:focus {
            outline: none;
            border-color: #28a745;
            box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.2);
        }
        
        .upload-section {
            text-align: center;
            margin-top: 20px;
        }
        
        .upload-btn {
            display: inline-block;
            padding: 15px 25px;
            margin: 10px;
            background-color: #f8f9fa;
            border: 2px dashed #ced4da;
            border-radius: 8px;
            color: #6c757d;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            width: 180px;
        }
        
        .upload-btn:hover {
            background-color: #e9ecef;
            border-color: #28a745;
            color: #28a745;
        }
        
        .upload-btn i {
            display: block;
            font-size: 24px;
            margin-bottom: 8px;
        }
        
        .button-group {
            display: flex;
            justify-content: space-between;
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
        }
        
        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-cancel:hover {
            background-color: #5a6268;
        }
        
        .btn-save {
            background-color: #28a745;
            color: white;
        }
        
        .btn-save:hover {
            background-color: #218838;
        }
        
        .info-note {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 6px;
            font-size: 14px;
            color: #6c757d;
            border-left: 4px solid #28a745;
        }
        
        .info-note p {
            margin-bottom: 5px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>♻️ TUKAR SAMPAH</h1>
        </div>
        
        <div class="form-section">
            <h2>Kriteria Sampah</h2>
            
            <div class="form-group">
                <label for="jenisSampah">Jenis Sampah:</label>
                <select id="jenisSampah">
                    <option value="" disabled selected>Pilih Jenis Sampah</option>
                    <option value="plastik">Plastik</option>
                    <option value="kertas">Kertas</option>
                    <option value="botol">Botol</option>
                    <option value="kaleng">Kaleng</option>
                    <option value="kaca">Kaca</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="beratSampah">Berat (kg):</label>
                <input type="number" id="beratSampah" min="1" max="50" placeholder="Masukkan berat">
            </div>
        </div>
        
        <div class="form-section">
            <h2>Upload Foto</h2>
            <div class="upload-section">
                <div class="upload-btn" onclick="uploadFoto(1)">
                    <i class="fas fa-cloud-upload-alt"></i>
                    UPLOAD FOTO 1
                </div>
                <div class="upload-btn" onclick="uploadFoto(2)">
                    <i class="fas fa-cloud-upload-alt"></i>
                    UPLOAD FOTO 2
                </div>
            </div>
        </div>
        
        <div class="button-group">
            <button class="btn btn-cancel" onclick="cancelForm()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="btn btn-save" onclick="simpanForm()">
                <i class="fas fa-check"></i> Simpan
            </button>
        </div>
        
        <div class="info-note">
            <p><strong>Catatan:</strong></p>
            <p>• Sampah dengan berat ≥ 3 kg akan diproses</p>
            <p>• Upload foto maksimal 2 file (format JPG/PNG)</p>
            <p>• Status penukaran dapat dilihat di Riwayat Transaksi</p>
        </div>
    </div>
    
    <script>
        function uploadFoto(num) {
            // Simulasi upload file
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/jpeg, image/png';
            
            input.onchange = function(event) {
                const file = event.target.files[0];
                if (file) {
                    alert(`Foto ${num} berhasil diupload: ${file.name}`);
                    
                    // Ganti tampilan tombol upload
                    const uploadBtn = document.querySelectorAll('.upload-btn')[num-1];
                    uploadBtn.innerHTML = `
                        <i class="fas fa-check-circle" style="color:#28a745"></i>
                        ${file.name.substring(0, 15)}...
                    `;
                    uploadBtn.style.border = "2px solid #28a745";
                    uploadBtn.style.backgroundColor = "#e8f5e9";
                }
            };
            
            input.click();
        }
        
        function simpanForm() {
            const jenis = document.getElementById('jenisSampah').value;
            const berat = document.getElementById('beratSampah').value;
            
            if (!jenis || !berat) {
                alert('Harap lengkapi semua data!');
                return;
            }
            
            if (berat < 1) {
                alert('Berat sampah minimal 1 kg!');
                return;
            }
            
            alert('Data berhasil disimpan! Penukaran sampah sedang diproses.');
            // Redirect ke riwayat transaksi atau dashboard
            // window.location.href = 'riwayat.html';
        }
        
        function cancelForm() {
            if (confirm('Apakah Anda yakin ingin membatalkan? Data yang sudah diisi akan hilang.')) {
                // Redirect ke dashboard
                // window.location.href = 'dashboard.html';
                alert('Form dibatalkan.');
            }
        }
    </script>
</body>
</html>