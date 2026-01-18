@extends('layouts.app')
@section('content')
   <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Main Content Area -->
      <main class="flex-1 overflow-y-auto p-6">
         <!-- Welcome Banner -->
         <div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-2xl shadow-xl p-8 mb-6 text-white">
            <div class="flex items-center justify-between">
               <div>
                  <h3 class="text-3xl font-bold mb-2">Selamat Datang! 👋</h3>
                  <p class="text-green-100">Kelola sistem Ecopoint++ dengan mudah dari panel superadmin</p>
               </div>
               <div class="hidden lg:block">
                  <svg class="w-24 h-24 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20">
                     <path
                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                     </path>
                  </svg>
               </div>
            </div>
         </div>

         <!-- Stats Grid -->
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Stat Card 1 -->
            <div
               class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-green-600 transform hover:-translate-y-1">
               <div class="flex items-center justify-between">
                  <div>
                     <p class="text-gray-500 text-sm font-medium mb-1">Total Users</p>
                     <h3 class="text-3xl font-bold text-gray-800">1,234</h3>
                     <p class="text-green-600 text-xs mt-1">+12% dari bulan lalu</p>
                  </div>
                  <div class="bg-green-100 p-3 rounded-lg">
                     <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                     </svg>
                  </div>
               </div>
            </div>

            <!-- Stat Card 2 -->
            <div
               class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-emerald-600 transform hover:-translate-y-1">
               <div class="flex items-center justify-between">
                  <div>
                     <p class="text-gray-500 text-sm font-medium mb-1">Total Admin</p>
                     <h3 class="text-3xl font-bold text-gray-800">45</h3>
                     <p class="text-emerald-600 text-xs mt-1">+3 admin baru</p>
                  </div>
                  <div class="bg-emerald-100 p-3 rounded-lg">
                     <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                     </svg>
                  </div>
               </div>
            </div>

            <!-- Stat Card 3 -->
            <div
               class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-teal-600 transform hover:-translate-y-1">
               <div class="flex items-center justify-between">
                  <div>
                     <p class="text-gray-500 text-sm font-medium mb-1">Total Sampah</p>
                     <h3 class="text-3xl font-bold text-gray-800">8,567 Kg</h3>
                     <p class="text-teal-600 text-xs mt-1">Bulan ini</p>
                  </div>
                  <div class="bg-teal-100 p-3 rounded-lg">
                     <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                     </svg>
                  </div>
               </div>
            </div>

            <!-- Stat Card 4 -->
            <div
               class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border-l-4 border-lime-600 transform hover:-translate-y-1">
               <div class="flex items-center justify-between">
                  <div>
                     <p class="text-gray-500 text-sm font-medium mb-1">Total Poin</p>
                     <h3 class="text-3xl font-bold text-gray-800">456,789</h3>
                     <p class="text-lime-600 text-xs mt-1">Terdistribusi</p>
                  </div>
                  <div class="bg-lime-100 p-3 rounded-lg">
                     <svg class="w-8 h-8 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                     </svg>
                  </div>
               </div>
            </div>
         </div>

         <!-- Charts & Activity -->
         <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Activity Chart -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-green-600">
               <h4 class="text-lg font-bold text-gray-800 mb-4">Aktivitas Terkini</h4>
               <div class="space-y-4">
                  <div class="flex items-start space-x-3 pb-3 border-b">
                     <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                     <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">User baru terdaftar</p>
                        <p class="text-xs text-gray-500">5 menit yang lalu</p>
                     </div>
                  </div>
                  <div class="flex items-start space-x-3 pb-3 border-b">
                     <div class="w-2 h-2 bg-emerald-500 rounded-full mt-2"></div>
                     <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Transaksi sampah disetujui</p>
                        <p class="text-xs text-gray-500">15 menit yang lalu</p>
                     </div>
                  </div>
                  <div class="flex items-start space-x-3 pb-3 border-b">
                     <div class="w-2 h-2 bg-teal-500 rounded-full mt-2"></div>
                     <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Poin ditukarkan</p>
                        <p class="text-xs text-gray-500">1 jam yang lalu</p>
                     </div>
                  </div>
                  <div class="flex items-start space-x-3">
                     <div class="w-2 h-2 bg-lime-500 rounded-full mt-2"></div>
                     <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Admin baru ditambahkan</p>
                        <p class="text-xs text-gray-500">2 jam yang lalu</p>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-green-600">
               <h4 class="text-lg font-bold text-gray-800 mb-4">Statistik Hari Ini</h4>
               <div class="space-y-4">
                  <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                     <span class="text-sm font-medium text-gray-700">Transaksi Baru</span>
                     <span class="text-lg font-bold text-green-600">24</span>
                  </div>
                  <div class="flex items-center justify-between p-3 bg-emerald-50 rounded-lg">
                     <span class="text-sm font-medium text-gray-700">Sampah Terkumpul</span>
                     <span class="text-lg font-bold text-emerald-600">156 Kg</span>
                  </div>
                  <div class="flex items-center justify-between p-3 bg-teal-50 rounded-lg">
                     <span class="text-sm font-medium text-gray-700">Poin Terdistribusi</span>
                     <span class="text-lg font-bold text-teal-600">3,450</span>
                  </div>
                  <div class="flex items-center justify-between p-3 bg-lime-50 rounded-lg">
                     <span class="text-sm font-medium text-gray-700">User Aktif</span>
                     <span class="text-lg font-bold text-lime-600">89</span>
                  </div>
               </div>
            </div>
         </div>
      </main>
   </div>
@endsection
