<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoPoint+ - Solusi Pengelolaan Sampah Berkelanjutan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes wave {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }
        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
        .gradient-text {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .nav-blur {
            backdrop-filter: blur(10px);
            background-color: rgba(16, 185, 129, 0.95);
        }
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        }
        .wave-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        .wave-animation {
            animation: wave 15s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
        }
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .glow-on-hover {
            position: relative;
            overflow: hidden;
        }
        .glow-on-hover::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        .glow-on-hover:hover::before {
            width: 300px;
            height: 300px;
        }
        .pulse-ring {
            animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.8); opacity: 1; }
            100% { transform: scale(1.2); opacity: 0; }
        }
    </style>
</head>
<body class="bg-white overflow-x-hidden">
    <!-- Navigation -->
    <nav class="nav-blur text-white py-4 px-6 shadow-lg fixed w-full top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg relative">
                    <div class="absolute inset-0 bg-green-400 rounded-full pulse-ring"></div>
                    <svg class="w-7 h-7 text-green-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <span class="text-2xl font-bold tracking-tight">EcoPoint+</span>
            </div>
            <div class="hidden md:flex gap-8 items-center">
                <a href="#home" class="hover:text-green-100 transition font-medium hover:scale-105 transform relative group">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                </a>
                <a href="#profil" class="hover:text-green-100 transition font-medium hover:scale-105 transform relative group">
                    Profil
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                </a>
                <a href="#cara-kerja" class="hover:text-green-100 transition font-medium hover:scale-105 transform relative group">
                    Cara Kerja
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                </a>
                <a href="#kontak" class="hover:text-green-100 transition font-medium hover:scale-105 transform relative group">
                    Kontak
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('login') }}" class="bg-white text-green-600 px-6 py-2.5 rounded-full font-semibold hover:bg-green-50 transition shadow-lg hover:shadow-xl transform hover:scale-105 glow-on-hover">
                    Login
                </a>
            </div>
            <button class="md:hidden" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <div id="mobileMenu" class="hidden md:hidden mt-4 space-y-3">
            <a href="#home" class="block hover:text-green-100 transition">Home</a>
            <a href="#profil" class="block hover:text-green-100 transition">Profil</a>
            <a href="#cara-kerja" class="block hover:text-green-100 transition">Cara Kerja</a>
            <a href="#kontak" class="block hover:text-green-100 transition">Kontak</a>
            <a href="{{ route('login') }}" class="block bg-white text-green-600 px-6 py-2 rounded-full font-semibold text-center">Login</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative bg-gradient-to-br from-green-500 via-green-600 to-emerald-700 text-white pt-32 pb-32 px-6 overflow-hidden hero-pattern">
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-white opacity-5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-white opacity-5 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-emerald-400 opacity-10 rounded-full blur-2xl"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="slide-in-left">
                    <div class="inline-flex items-center bg-white bg-opacity-20 backdrop-blur-sm px-5 py-2.5 rounded-full mb-6 border border-white border-opacity-30">
                        <span class="text-2xl mr-2">🌱</span>
                        <span class="text-sm font-semibold">Platform Pengelolaan Sampah #1 di Indonesia</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
                        Ubah Sampah Jadi
                        <span class="block text-yellow-300 mt-2">Poin Berharga!</span>
                    </h1>
                    <p class="text-l md:text-2xl mb-10 text-green-50 leading-relaxed">
                        Kelola sampahmu dengan cerdas, dapatkan reward menarik, dan selamatkan bumi bersama EcoPoint+. Bergabunglah dengan gerakan hijau masa depan!
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="bg-white text-green-600 hover:bg-green-50 px-10 py-5 rounded-full text-lg font-bold transition duration-300 shadow-2xl hover:shadow-green-300/50 transform hover:scale-105 inline-flex items-center gap-3 glow-on-hover">
                            <span>Mulai Sekarang</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <a href="#cara-kerja" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-green-600 px-10 py-5 rounded-full text-lg font-bold transition duration-300 transform hover:scale-105 backdrop-blur-sm">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 mt-16 fade-in-up">
                        <div class="text-center transform hover:scale-110 transition">
                            <div class="text-4xl md:text-5xl font-bold mb-2">10K+</div>
                            <div class="text-sm text-green-100 font-medium">Pengguna Aktif</div>
                        </div>
                        <div class="text-center transform hover:scale-110 transition">
                            <div class="text-4xl md:text-5xl font-bold mb-2">50Ton</div>
                            <div class="text-sm text-green-100 font-medium">Sampah Terolah</div>
                        </div>
                        <div class="text-center transform hover:scale-110 transition">
                            <div class="text-4xl md:text-5xl font-bold mb-2">100+</div>
                            <div class="text-sm text-green-100 font-medium">Bank Sampah</div>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Image -->
                <div class="slide-in-right relative">
                    <div class="float-animation relative">
                        <img 
                            src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=600&h=600&fit=crop" 
                            alt="Recycling Community" 
                            class="w-full max-w-lg mx-auto rounded-3xl shadow-2xl ring-8 ring-white ring-opacity-20"
                        />
                        <!-- Decorative gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-green-500/20 to-transparent rounded-3xl"></div>
                    </div>
                    <!-- Floating Cards -->
                    <div class="absolute -top-6 -right-6 bg-white text-gray-800 p-5 rounded-2xl shadow-2xl hidden lg:block transform hover:scale-105 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-3xl font-bold text-green-600">+250</div>
                                <div class="text-xs text-gray-500 font-semibold">Poin Earned</div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white text-gray-800 p-5 rounded-2xl shadow-2xl hidden lg:block transform hover:scale-105 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-3xl font-bold text-yellow-600">4.9★</div>
                                <div class="text-xs text-gray-500 font-semibold">User Rating</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="profil" class="py-24 px-6 bg-gradient-to-b from-white to-green-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <span class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">Tentang Kami</span>
                <h2 class="text-5xl md:text-6xl font-bold gradient-text mb-6">Siapa Kami?</h2>
            </div>
            <div class="bg-white rounded-3xl shadow-2xl p-12 card-hover border border-green-100">
                <p class="text-center text-gray-700 text-lg md:text-xl max-w-4xl mx-auto leading-relaxed">
                    <span class="font-bold text-green-600">EcoPoint+</span> adalah platform digital inovatif yang mengubah cara Anda memandang sampah. 
                    Kami percaya bahwa setiap sampah memiliki nilai, dan dengan teknologi modern, kami memudahkan Anda untuk 
                    mengumpulkan, mendaur ulang, dan mendapatkan reward dari sampah yang Anda kelola. 
                    <span class="block mt-4 text-green-600 font-semibold">Bergabunglah dengan komunitas peduli lingkungan dan raih manfaat dari setiap tindakan hijau Anda!</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="flex-1 order-2 md:order-1">
                    <div class="relative">
                        <img 
                            src="https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?w=600&h=400&fit=crop" 
                            alt="Waste Management" 
                            class="w-full h-96 object-cover rounded-3xl shadow-2xl"
                        />
                        <div class="absolute inset-0 bg-gradient-to-tr from-green-600/20 to-transparent rounded-3xl"></div>
                        <!-- Decorative element -->
                        <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-green-200 rounded-3xl -z-10"></div>
                        <div class="absolute -top-6 -left-6 w-48 h-48 bg-yellow-200 rounded-3xl -z-10"></div>
                    </div>
                </div>
                <div class="flex-1 order-1 md:order-2">
                    <span class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">Misi Kami</span>
                    <h2 class="text-4xl md:text-5xl font-bold gradient-text mb-10">MISI EcoPoint+</h2>
                    <div class="space-y-8">
                        <div class="flex gap-5 card-hover p-6 rounded-2xl bg-gradient-to-r from-green-50 to-transparent">
                            <div class="flex-shrink-0">
                                <span class="flex items-center justify-center w-12 h-12 bg-green-600 text-white rounded-xl font-bold text-xl shadow-lg">1</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2 text-lg">Edukasi Berkelanjutan</h3>
                                <p class="text-gray-600 leading-relaxed">Menyediakan informasi dan panduan praktis tentang pengelolaan serta daur ulang sampah yang ramah lingkungan.</p>
                            </div>
                        </div>
                        <div class="flex gap-5 card-hover p-6 rounded-2xl bg-gradient-to-r from-green-50 to-transparent">
                            <div class="flex-shrink-0">
                                <span class="flex items-center justify-center w-12 h-12 bg-green-600 text-white rounded-xl font-bold text-xl shadow-lg">2</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2 text-lg">Partisipasi Aktif</h3>
                                <p class="text-gray-600 leading-relaxed">Mendorong masyarakat untuk aktif mengelola sampah melalui sistem penukaran poin dan komunitas peduli lingkungan.</p>
                            </div>
                        </div>
                        <div class="flex gap-5 card-hover p-6 rounded-2xl bg-gradient-to-r from-green-50 to-transparent">
                            <div class="flex-shrink-0">
                                <span class="flex items-center justify-center w-12 h-12 bg-green-600 text-white rounded-xl font-bold text-xl shadow-lg">3</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2 text-lg">Kolaborasi Strategis</h3>
                                <p class="text-gray-600 leading-relaxed">Bekerja sama dengan pemerintah, organisasi, dan bisnis untuk menciptakan ekosistem pengelolaan sampah yang berkelanjutan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 px-6 bg-white" id="cara-kerja">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-green-600 text-center mb-16">Cara Kerja</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Kumpul -->
                <div class="text-center group hover:transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center mb-6">
                        <div class="bg-yellow-100 p-6 rounded-full group-hover:bg-yellow-200 transition">
                            <svg class="w-16 h-16 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Kumpul</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Kumpulkan jenis sampah yang dapat diukurkan di bank sampah, seperti botol plastik, kertas atau kardus, serta kaleng. Pastikan sampah dalam kondisi bersih dan kering agar mudah ditimbang serta memiliki nilai tukar yang lebih baik.
                    </p>
                </div>

                <!-- Tukar -->
                <div class="text-center group hover:transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center mb-6">
                        <div class="bg-yellow-100 p-6 rounded-full group-hover:bg-yellow-200 transition">
                            <svg class="w-16 h-16 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Tukar</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Sampah yang kamu kumpulkan akan ditukarkan sesuai dengan berat dan jenisnya, dan kami akan membantu menghitung nilai tukarnya.
                    </p>
                </div>

                <!-- Reward -->
                <div class="text-center group hover:transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center mb-6">
                        <div class="bg-yellow-100 p-6 rounded-full group-hover:bg-yellow-200 transition">
                            <svg class="w-16 h-16 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Reward</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Poin atau koin yang telah kamu kumpulkan bisa ditukarkan sesuai pilihanmu baik dalam bentuk koin maupun barang ramah lingkungan, seperti tumbler, tas belanja, atau produk daur ulang lainnya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Valuable Waste Section -->
    <section class="py-20 px-6 bg-green-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-green-600 text-center mb-16">Sampah Bernilai</h2>
            <div class="bg-white rounded-2xl shadow-xl p-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="bg-green-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4 hover:bg-green-200 transition">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-2">Botol Plastik</h3>
                        <p class="text-green-600 font-semibold text-xl">5 poin/kg</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4 hover:bg-green-200 transition">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-2">Kertas/Kardus</h3>
                        <p class="text-green-600 font-semibold text-xl">3 poin/kg</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4 hover:bg-green-200 transition">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-2">Kaleng Aluminium</h3>
                        <p class="text-green-600 font-semibold text-xl">8 poin/kg</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4 hover:bg-green-200 transition">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-2">Kaca</h3>
                        <p class="text-green-600 font-semibold text-xl">4 poin/kg</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6 bg-gradient-to-r from-green-500 to-green-600 text-white text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Siap Mulai Perjalanan Hijau Anda?</h2>
            <p class="text-xl md:text-2xl mb-10 text-green-50">
                Bergabunglah dengan ribuan pengguna yang telah merasakan manfaat EcoPoint+
            </p>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="#" class="bg-white text-green-600 hover:bg-green-50 px-10 py-4 rounded-lg text-lg font-bold transition duration-300 shadow-lg">
                    Daftar Gratis
                </a>
                <a href="#" class="bg-green-700 text-white hover:bg-green-800 px-10 py-4 rounded-lg text-lg font-bold transition duration-300 shadow-lg border-2 border-white">
                    Login Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-800 text-white py-12 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">EcoPoint+</h3>
                    <p class="text-gray-400">Solusi Pintar untuk Lingkungan yang Lebih Baik</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-green-400 transition">Home</a></li>
                        <li><a href="#profil" class="text-gray-400 hover:text-green-400 transition">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-green-400 transition">Login</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-green-400 transition">Register</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email: info@ecopoint.id</li>
                        <li>Telp: (021) 1234-5678</li>
                        <li>Alamat: Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-500">© 2024 EcoPoint+. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-2xl');
            } else {
                nav.classList.remove('shadow-2xl');
            }
        });
    </script>
</body>
</html>