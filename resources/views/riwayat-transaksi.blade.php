<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - EcoPoint+</title>
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
        .status-success { background-color: #d1fae5; color: #065f46; }
        .status-pending { background-color: #fef3c7; color: #92400e; }
        .status-cancelled { background-color: #fee2e2; color: #991b1b; }
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
                        Riwayat Transaksi
                    </p>
                </div>
            </div>

            <!-- Right Side: Notifications, User, and Hamburger Menu -->
            <div class="flex items-center space-x-4">
                <!-- Notification Bell -->
                <div class="relative">
                    <i class="fas fa-bell text-xl cursor-pointer"></i>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-xs flex items-center justify-center">2</span>
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

                            <!-- Riwayat Transaksi (Active) -->
                            <a href="/riwayat-transaksi" class="flex items-center space-x-3 p-3 rounded-lg bg-green-50 text-green-700">
                                <i class="fas fa-history w-6 text-green-600"></i>
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
                    <h1 class="text-3xl font-bold text-gray-900">Riwayat Transaksi</h1>
                    <p class="text-gray-600 mt-2">Catatan semua transaksi penukaran sampah dan poin Anda</p>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-3">
                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                        <i class="fas fa-download mr-2"></i> Ekspor Data
                    </button>
                    <button class="px-4 py-2 border border-green-600 text-green-600 rounded-lg hover:bg-green-50 transition flex items-center">
                        <i class="fas fa-filter mr-2"></i> Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl card-shadow p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm">Total Transaksi</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">13</h3>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-exchange-alt text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl card-shadow p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm">Total Poin Didapat</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">1,250</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-coins text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl card-shadow p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm">Total Sampah (kg)</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">120</h3>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-weight text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl card-shadow p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm">Transaksi Bulan Ini</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">4</h3>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction Table -->
        <div class="bg-white rounded-xl card-shadow overflow-hidden">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-800">Daftar Transaksi Terbaru</h2>
                <p class="text-gray-600 text-sm mt-1">Menampilkan 10 transaksi terakhir</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 text-gray-700 font-semibold">ID Transaksi</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-semibold">Tanggal</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-semibold">Jenis Sampah</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-semibold">Berat (kg)</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-semibold">Poin</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-semibold">Status</th>
                            <th class="text-left py-4 px-6 text-gray-700 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- Transaction 1 -->
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">#ECP-2024-001</div>
                                <div class="text-sm text-gray-500">Penukaran Sampah</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium">15 Jan 2024</div>
                                <div class="text-sm text-gray-500">10:30 WIB</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-wine-bottle text-green-600"></i>
                                    </div>
                                    <span>Botol Plastik</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium">5.2 kg</td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-yellow-500 mr-2"></i>
                                    <span class="font-bold text-gray-800">26 poin</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-medium status-success">
                                    <i class="fas fa-check-circle mr-1"></i> Selesai
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <button class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>

                        <!-- Transaction 2 -->
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">#ECP-2024-002</div>
                                <div class="text-sm text-gray-500">Penukaran Hadiah</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium">12 Jan 2024</div>
                                <div class="text-sm text-gray-500">14:20 WIB</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-gift text-blue-600"></i>
                                    </div>
                                    <span>Tukar Poin</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium">-</td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-yellow-500 mr-2"></i>
                                    <span class="font-bold text-red-600">-150 poin</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-medium status-success">
                                    <i class="fas fa-check-circle mr-1"></i> Selesai
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <button class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>

                        <!-- Transaction 3 -->
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">#ECP-2024-003</div>
                                <div class="text-sm text-gray-500">Penukaran Sampah</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium">10 Jan 2024</div>
                                <div class="text-sm text-gray-500">09:15 WIB</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-newspaper text-yellow-600"></i>
                                    </div>
                                    <span>Kertas/Kardus</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium">8.5 kg</td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-yellow-500 mr-2"></i>
                                    <span class="font-bold text-gray-800">25.5 poin</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-medium status-success">
                                    <i class="fas fa-check-circle mr-1"></i> Selesai
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <button class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>

                        <!-- Transaction 4 -->
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">#ECP-2024-004</div>
                                <div class="text-sm text-gray-500">Penukaran Sampah</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium">05 Jan 2024</div>
                                <div class="text-sm text-gray-500">16:45 WIB</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-beer text-red-600"></i>
                                    </div>
                                    <span>Kaleng Aluminium</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium">3.0 kg</td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-yellow-500 mr-2"></i>
                                    <span class="font-bold text-gray-800">24 poin</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-medium status-pending">
                                    <i class="fas fa-clock mr-1"></i> Proses
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <button class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>

                        <!-- Transaction 5 -->
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">#ECP-2023-125</div>
                                <div class="text-sm text-gray-500">Penukaran Sampah</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium">28 Des 2023</div>
                                <div class="text-sm text-gray-500">11:10 WIB</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-glass-whiskey text-gray-600"></i>
                                    </div>
                                    <span>Kaca</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium">6.2 kg</td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-yellow-500 mr-2"></i>
                                    <span class="font-bold text-gray-800">24.8 poin</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-medium status-cancelled">
                                    <i class="fas fa-times-circle mr-1"></i> Dibatalkan
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <button class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="p-6 border-t flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="text-gray-600 text-sm">
                    Menampilkan 1-5 dari 13 transaksi
                </div>
                <div class="mt-4 md:mt-0 flex space-x-2">
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg">1</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Activity Timeline -->
            <div class="bg-white rounded-xl card-shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Aktivitas Terbaru</h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-coins text-green-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Poin bertambah +25</p>
                            <p class="text-sm text-gray-600">Dari penukaran 5kg kertas</p>
                            <p class="text-xs text-gray-500 mt-1">2 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-gift text-blue-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Hadiah diklaim</p>
                            <p class="text-sm text-gray-600">Tumbler stainless steel</p>
                            <p class="text-xs text-gray-500 mt-1">1 hari yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-truck text-yellow-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Penjemputan sampah</p>
                            <p class="text-sm text-gray-600">Jadwal untuk besok, 10:00 WIB</p>
                            <p class="text-xs text-gray-500 mt-1">2 hari yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary -->
            <div class="bg-white rounded-xl card-shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Ringkasan Transaksi</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Poin masuk (Januari):</span>
                        <span class="font-bold text-green-600">+350 poin</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Poin keluar (Januari):</span>
                        <span class="font-bold text-red-600">-150 poin</span>
                    </div>
                    <div class="flex justify-between items-center pt-4 border-t">
                        <span class="text-gray-600">Saldo poin saat ini:</span>
                        <span class="font-bold text-gray-800">200 poin</span>
                    </div>
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-info-circle text-green-600 mr-2"></i>
                            Poin tidak akan kadaluarsa. Tukarkan kapan saja!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-8 p-6 bg-white border-t">
        <div class="max-w-7xl mx-auto text-center text-gray-600">
            <p>© 2024 EcoPoint+. All rights reserved.</p>
            <p class="mt-2 text-sm">Halaman Riwayat Transaksi</p>
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

        // Close dropdown when clicking a menu item
        dropdownMenu.querySelectorAll('a, button').forEach(item => {
            item.addEventListener('click', function() {
                dropdownMenu.classList.add('hidden');
            });
        });

        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Fitur filter akan segera tersedia!');
            });
        });
    </script>
</body>
</html>