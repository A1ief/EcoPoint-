<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EcoPoint+</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f8fafc; }
        .card-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        .gradient-bg { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .stat-card { transition: transform 0.3s ease; }
        .stat-card:hover { transform: translateY(-5px); }
        .dropdown-menu {
            animation: fadeIn 0.2s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
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
                        Selamat datang, {{ session('user_name', 'User') }}
                    </p>
                </div>
            </div>

            <!-- Right Side: Notifications, User, and Hamburger Menu -->
            <div class="flex items-center space-x-4">
                <!-- Notification Bell -->
                <div class="relative">
                    <i class="fas fa-bell text-xl cursor-pointer"></i>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-xs flex items-center justify-center">3</span>
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
                            <a href="riwayat-transaksi" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-50 text-gray-700">
                                <i class="fas fa-history w-6 text-blue-600"></i>
                                <span>Riwayat Transaksi</span>
                            </a>

                            <!-- Penukaran Poin -->
                            <a href="penukaran-poin" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-yellow-50 text-gray-700">
                                <i class="fas fa-exchange-alt w-6 text-yellow-600"></i>
                                <span>Penukaran Poin</span>
                            </a>

                            <!-- Bank Sampah -->
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 text-gray-700">
                                <i class="fas fa-map-marker-alt w-6 text-purple-600"></i>
                                <span>Bank Sampah Terdekat</span>
                            </a>

                            <div class="border-t my-2"></div>

                            <!-- Profile -->
                            <a href="profil" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 text-gray-700">
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
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dasboard</h1>
            <p class="text-gray-600 mt-2">Selamat datang di dashboard EcoPoint+</p>
        </div>

        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - Stats -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Keterangan Penukaran Sampah Card -->
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Keterangan Penukaran Sampah</h2>
                    
                    <!-- Big Stat -->
                    <div class="text-center mb-8">
                        <div class="text-6xl font-bold text-green-600 mb-2">120</div>
                        <div class="text-gray-600 text-lg">kg</div>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-3 gap-4">
                        <!-- Total Sampah Dilakukan -->
                        <div class="stat-card bg-green-50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-green-700 mb-1">120</div>
                            <div class="text-sm text-gray-600">Total Sampah Dilakukan</div>
                        </div>

                        <!-- Total Transaksi Dilakukan -->
                        <div class="stat-card bg-blue-50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-blue-700 mb-1">13</div>
                            <div class="text-sm text-gray-600">Total Transaksi Dilakukan</div>
                        </div>

                        <!-- Total Poin Berhasil Ditukar -->
                        <div class="stat-card bg-yellow-50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-yellow-700 mb-1">200</div>
                            <div class="text-sm text-gray-600">Total Poin Berhasil Ditukar</div>
                        </div>
                    </div>
                </div>

                <!-- Tukar Sampah Form -->
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Tukar Sampah Sekarang</h2>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Jenis Sampah</label>
                            <select class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500">
                                <option>Pilih jenis sampah</option>
                                <option>Plastik</option>
                                <option>Kertas</option>
                                <option>Kaleng</option>
                                <option>Kaca</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Berat (kg)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500" placeholder="0.5">
                        </div>
                        <button type="submit" class="w-full gradient-bg text-white font-bold py-3 rounded-lg hover:opacity-90 transition">
                            <i class="fas fa-exchange-alt mr-2"></i>Proses Penukaran
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column - Chart & Info -->
            <div class="space-y-6">
                <!-- Poin Card -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl card-shadow p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Poin Anda</h3>
                            <div class="text-4xl font-bold">200 <span class="text-xl">₽</span></div>
                            <p class="text-green-100 mt-2">Tersedia untuk ditukar</p>
                        </div>
                        <div class="w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-coins text-2xl"></i>
                        </div>
                    </div>
                    <button class="w-full mt-6 bg-white text-green-600 font-bold py-2 rounded-lg hover:bg-green-50 transition">
                        Tukar Poin
                    </button>
                </div>

                <!-- Kriteria Sampah Terkumpul -->
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Kriteria Sampah Terkumpul</h2>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 text-gray-700 font-semibold">Name</th>
                                    <th class="text-left py-3 text-gray-700 font-semibold">Persentase</th>
                                    <th class="text-left py-3 text-gray-700 font-semibold">Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Organik -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                            Organik
                                        </div>
                                    </td>
                                    <td class="py-4 font-semibold">49%</td>
                                    <td class="py-4">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-green-500 h-2 rounded-full" style="width: 49%"></div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Non-Organik -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                                            Non Organik
                                        </div>
                                    </td>
                                    <td class="py-4 font-semibold">29%</td>
                                    <td class="py-4">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-500 h-2 rounded-full" style="width: 29%"></div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- B3 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                                            B3
                                        </div>
                                    </td>
                                    <td class="py-4 font-semibold">15%</td>
                                    <td class="py-4">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-red-500 h-2 rounded-full" style="width: 15%"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-info-circle text-green-600 mr-2"></i>
                            Data diperbarui: <span class="update-time"></span>
                        </p>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Info Penting</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3 p-3 bg-green-50 rounded-lg">
                            <i class="fas fa-lightbulb text-green-600 mt-1"></i>
                            <div>
                                <p class="font-medium text-gray-800">Tips Penukaran</p>
                                <p class="text-sm text-gray-600">Pastikan sampah bersih dan kering untuk nilai tukar maksimal</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-calendar-alt text-blue-600 mt-1"></i>
                            <div>
                                <p class="font-medium text-gray-800">Event Mendatang</p>
                                <p class="text-sm text-gray-600">Program "Green Weekend" bonus 20% poin setiap Sabtu-Minggu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-8 p-6 bg-white border-t">
        <div class="max-w-7xl mx-auto text-center text-gray-600">
            <p>© 2024 EcoPoint+. All rights reserved.</p>
            <p class="mt-2 text-sm">Dashboard versi 2.0 - User: {{ session('user_name', 'Guest') }}</p>
        </div>
    </footer>

    <script>
        // Update time real-time
        function updateTime() {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('id-ID', { 
                hour: '2-digit', 
                minute: '2-digit',
                second: '2-digit'
            });
            document.querySelectorAll('.update-time').forEach(el => {
                el.textContent = timeStr;
            });
        }
        setInterval(updateTime, 1000);
        updateTime();

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

        // Close dropdown when clicking a menu item
        dropdownMenu.querySelectorAll('a, button').forEach(item => {
            item.addEventListener('click', function() {
                dropdownMenu.classList.add('hidden');
            });
        });
    </script>
</body>
</html>