<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penukaran Poin - EcoPoint+</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f8fafc; }
        .card-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        .gradient-bg { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .dropdown-menu {
            animation: fadeIn 0.2s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .reward-card {
            transition: all 0.3s ease;
        }
        .reward-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .category-btn {
            transition: all 0.3s ease;
        }
        .category-btn.active {
            background-color: #10b981;
            color: white;
        }
    </style>
</head>
<body class="font-sans text-gray-800">
    <!-- Header -->
    <header class="gradient-bg text-white p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo & Brand -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-recycle text-green-600"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">EcoPoint+</h1>
                    <p class="text-sm text-green-100">
                        Penukaran Poin
                    </p>
                </div>
            </div>

            <!-- Right Side: Notifications, User, and Hamburger Menu -->
            <div class="flex items-center space-x-4">
                <!-- Notification Bell -->
                <div class="relative">
                    <i class="fas fa-bell text-xl cursor-pointer"></i>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-xs flex items-center justify-center">5</span>
                </div>

                <!-- User Avatar -->
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-green-600"></i>
                    </div>
                    <span class="font-medium hidden md:inline">{{ session('user_name', 'User') }}</span>
                </div>

                <!-- Hamburger Menu Button (3 lines) -->
                <div class="relative">
                    <button id="hamburgerBtn" class="p-2 rounded-lg hover:bg-white/20 transition">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 hidden z-50 dropdown-menu">
                        <div class="p-4 border-b">
                            <p class="font-bold text-gray-800">{{ session('user_name', 'User') }}</p>
                            <p class="text-sm text-gray-600">Pengguna Aktif EcoPoint+</p>
                        </div>
                        
                        <div class="p-2">
                            <!-- Dashboard -->
                            <a href="/dashboard" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-green-50 text-gray-700">
                                <i class="fas fa-tachometer-alt w-6 text-green-600"></i>
                                <span>Dashboard</span>
                            </a>

                            <!-- Riwayat Transaksi -->
                            <a href="/riwayat-transaksi" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-50 text-gray-700">
                                <i class="fas fa-history w-6 text-blue-600"></i>
                                <span>Riwayat Transaksi</span>
                            </a>

                            <!-- Penukaran Poin (Active) -->
                            <a href="/penukaran-poin" class="flex items-center space-x-3 p-3 rounded-lg bg-green-50 text-green-700">
                                <i class="fas fa-exchange-alt w-6 text-green-600"></i>
                                <span>Penukaran Poin</span>
                            </a>

                            <!-- Bank Sampah -->
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 text-gray-700">
                                <i class="fas fa-map-marker-alt w-6 text-purple-600"></i>
                                <span>Bank Sampah Terdekat</span>
                            </a>

                            <div class="border-t my-2"></div>

                            <!-- Profile -->
                            <a href="/profil" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 text-gray-700">
                                <i class="fas fa-user-circle w-6 text-gray-600"></i>
                                <span>Profil Saya</span>
                            </a>

                            <!-- Settings -->
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 text-gray-700">
                                <i class="fas fa-cog w-6 text-gray-600"></i>
                                <span>Pengaturan</span>
                            </a>

                            <div class="border-t my-2"></div>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-50 text-red-600 w-full text-left">
                                    <i class="fas fa-sign-out-alt w-6"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Penukaran Poin</h1>
                    <p class="text-gray-600 mt-2">Tukarkan poin Anda dengan hadiah menarik</p>
                </div>
                <div class="mt-4 md:mt-0 flex items-center space-x-4">
                    <!-- Balance Card -->
                    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                <i class="fas fa-coins"></i>
                            </div>
                            <div>
                                <p class="text-sm">Poin Anda</p>
                                <p class="text-2xl font-bold">200 <span class="text-lg">₽</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Filter -->
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Kategori Hadiah</h2>
            <div class="flex flex-wrap gap-3">
                <button class="category-btn active px-5 py-2 bg-green-600 text-white rounded-full">
                    Semua
                </button>
                <button class="category-btn px-5 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200">
                    <i class="fas fa-utensils mr-2"></i>Voucher Makanan
                </button>
                <button class="category-btn px-5 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200">
                    <i class="fas fa-shopping-bag mr-2"></i>Produk Eco
                </button>
                <button class="category-btn px-5 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200">
                    <i class="fas fa-ticket-alt mr-2"></i>Voucher Belanja
                </button>
                <button class="category-btn px-5 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200">
                    <i class="fas fa-mobile-alt mr-2"></i>Pulsa & Data
                </button>
                <button class="category-btn px-5 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200">
                    <i class="fas fa-donate mr-2"></i>Donasi
                </button>
            </div>
        </div>

        <!-- Rewards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Reward 1 -->
            <div class="reward-card bg-white rounded-xl card-shadow overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" 
                         alt="Tumbler Stainless Steel" 
                         class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        -150 poin
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Tumbler Stainless Steel</h3>
                    <p class="text-gray-600 text-sm mb-4">Ramah lingkungan, bisa dipakai berkali-kali</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-500 text-sm">Stok: <span class="font-bold">25</span></p>
                            <p class="text-gray-500 text-sm">Tersedia sampai: 30 Feb 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-600">150 <span class="text-lg">₽</span></p>
                        </div>
                    </div>
                    
                    <button class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                        <i class="fas fa-exchange-alt mr-2"></i>Tukar Sekarang
                    </button>
                </div>
            </div>

            <!-- Reward 2 -->
            <div class="reward-card bg-white rounded-xl card-shadow overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1528323273322-d81458248d40?w=400&h=250&fit=crop" 
                         alt="Tas Belanja Canvas" 
                         class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        -80 poin
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Tas Belanja Canvas</h3>
                    <p class="text-gray-600 text-sm mb-4">Tas belanja reusable dengan desain menarik</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-500 text-sm">Stok: <span class="font-bold">42</span></p>
                            <p class="text-gray-500 text-sm">Tersedia sampai: 15 Mar 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-600">80 <span class="text-lg">₽</span></p>
                        </div>
                    </div>
                    
                    <button class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                        <i class="fas fa-exchange-alt mr-2"></i>Tukar Sekarang
                    </button>
                </div>
            </div>

            <!-- Reward 3 -->
            <div class="reward-card bg-white rounded-xl card-shadow overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w-400&h=250&fit=crop" 
                         alt="Voucher GoFood Rp 50.000" 
                         class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        -200 poin
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Voucher GoFood Rp 50.000</h3>
                    <p class="text-gray-600 text-sm mb-4">Bisa digunakan untuk pesan makanan online</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-500 text-sm">Stok: <span class="font-bold">Tidak terbatas</span></p>
                            <p class="text-gray-500 text-sm">Berlaku: 30 hari setelah penukaran</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-600">200 <span class="text-lg">₽</span></p>
                        </div>
                    </div>
                    
                    <button class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                        <i class="fas fa-exchange-alt mr-2"></i>Tukar Sekarang
                    </button>
                </div>
            </div>

            <!-- Reward 4 -->
            <div class="reward-card bg-white rounded-xl card-shadow overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=250&fit=crop" 
                         alt="Paket Pulsa 10GB" 
                         class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        -120 poin
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Paket Data 10GB</h3>
                    <p class="text-gray-600 text-sm mb-4">Internet 10GB berlaku 30 hari semua operator</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-500 text-sm">Stok: <span class="font-bold">Tidak terbatas</span></p>
                            <p class="text-gray-500 text-sm">Aktif dalam 1x24 jam</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-600">120 <span class="text-lg">₽</span></p>
                        </div>
                    </div>
                    
                    <button class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                        <i class="fas fa-exchange-alt mr-2"></i>Tukar Sekarang
                    </button>
                </div>
            </div>

            <!-- Reward 5 -->
            <div class="reward-card bg-white rounded-xl card-shadow overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1556228578-9c360e1d8d34?w=400&h=250&fit=crop" 
                         alt="Bibit Tanaman" 
                         class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        -50 poin
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Paket Bibit Tanaman</h3>
                    <p class="text-gray-600 text-sm mb-4">5 jenis bibit tanaman hias dan herbal</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-500 text-sm">Stok: <span class="font-bold">18</span></p>
                            <p class="text-gray-500 text-sm">Gratis ongkir Jabodetabek</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-600">50 <span class="text-lg">₽</span></p>
                        </div>
                    </div>
                    
                    <button class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                        <i class="fas fa-exchange-alt mr-2"></i>Tukar Sekarang
                    </button>
                </div>
            </div>

            <!-- Reward 6 -->
            <div class="reward-card bg-white rounded-xl card-shadow overflow-hidden">
                <div class="relative">
                    <div class="w-full h-48 bg-purple-100 flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-purple-500 text-6xl"></i>
                    </div>
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        -100 poin
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Donasi Lingkungan</h3>
                    <p class="text-gray-600 text-sm mb-4">Donasi untuk program penanaman 10 pohon</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-500 text-sm">Organisasi: <span class="font-bold">Green Earth</span></p>
                            <p class="text-gray-500 text-sm">Akan ditanam di Kalimantan</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-600">100 <span class="text-lg">₽</span></p>
                        </div>
                    </div>
                    
                    <button class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700 transition flex items-center justify-center">
                        <i class="fas fa-heart mr-2"></i>Donasi Sekarang
                    </button>
                </div>
            </div>
        </div>

        <!-- How to Redeem -->
        <div class="bg-white rounded-xl card-shadow p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Cara Menukarkan Poin</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-green-600">1</span>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">Pilih Hadiah</h3>
                    <p class="text-gray-600 text-sm">Pilih hadiah yang ingin ditukar dari katalog</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-green-600">2</span>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">Konfirmasi Penukaran</h3>
                    <p class="text-gray-600 text-sm">Pastikan poin mencukupi dan konfirmasi</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-green-600">3</span>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">Terima Hadiah</h3>
                    <p class="text-gray-600 text-sm">Hadiah akan dikirim atau dikirim kodenya</p>
                </div>
            </div>
        </div>

        <!-- Terms & Conditions -->
        <div class="bg-gray-50 rounded-xl p-6">
            <h3 class="font-bold text-gray-800 mb-4">
                <i class="fas fa-info-circle text-green-600 mr-2"></i>Ketentuan Penukaran
            </h3>
            <ul class="space-y-2 text-sm text-gray-600">
                <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    Poin tidak dapat ditransfer ke akun lain
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    Hadiah fisik akan dikirim dalam 3-7 hari kerja
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    Voucher digital akan dikirim via email dalam 1x24 jam
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    Penukaran poin tidak dapat dibatalkan setelah diproses
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    Poin tidak memiliki nilai tunai
                </li>
            </ul>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-8 p-6 bg-white border-t">
        <div class="max-w-7xl mx-auto text-center text-gray-600">
            <p>© 2024 EcoPoint+. All rights reserved.</p>
            <p class="mt-2 text-sm">Halaman Penukaran Poin - Saldo: 200 poin</p>
        </div>
    </footer>

    <script>
        // Hamburger Menu Toggle
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const dropdownMenu = document.getElementById('dropdownMenu');

        hamburgerBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdownMenu.contains(e.target) && !hamburgerBtn.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Category buttons
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.category-btn').forEach(b => {
                    b.classList.remove('active', 'bg-green-600', 'text-white');
                    b.classList.add('bg-gray-100', 'text-gray-700');
                });
                
                // Add active class to clicked button
                this.classList.remove('bg-gray-100', 'text-gray-700');
                this.classList.add('active', 'bg-green-600', 'text-white');
            });
        });

        // Redeem buttons
        document.querySelectorAll('.reward-card button').forEach(btn => {
            btn.addEventListener('click', function() {
                const rewardTitle = this.closest('.reward-card').querySelector('h3').textContent;
                const pointCost = this.closest('.reward-card').querySelector('.text-2xl').textContent;
                
                if(confirm(`Konfirmasi penukaran:\n\n${rewardTitle}\n\nDengan poin: ${pointCost}\n\nLanjutkan?`)) {
                    alert('Penukaran berhasil! Detail akan dikirim ke email Anda.');
                }
            });
        });
    </script>
</body>
</html>