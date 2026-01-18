<aside class="w-64 bg-gradient-to-b from-green-700 to-emerald-800 shadow-2xl flex flex-col">
    <!-- Logo -->
    <div class="p-6 border-b border-green-600">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center shadow-lg">
                <span class="text-green-700 font-bold text-2xl">E+</span>
            </div>
            <div>
                <h1 class="text-xl font-bold text-white">Ecopoint++</h1>
                <p class="text-xs text-green-200">Superadmin Panel</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 overflow-y-auto py-6 px-4">
        <div class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('superadmin.dashboard') ? 'bg-green-600 text-white shadow-md' : 'text-green-100 hover:bg-green-600 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <!-- Kelola User -->
            <a href="{{ route('users.index') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('superadmin.users.*') ? 'bg-green-600 text-white shadow-md' : 'text-green-100 hover:bg-green-600 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span class="font-medium">Kelola User</span>
            </a>

            <!-- Kelola Admin -->
            <a href="#" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('superadmin.admins.*') ? 'bg-green-600 text-white shadow-md' : 'text-green-100 hover:bg-green-600 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span class="font-medium">Kelola Admin</span>
            </a>

            <!-- Kelola Sampah -->
            <a href="{{ route('rubbish') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('superadmin.sampah.*') ? 'bg-green-600 text-white shadow-md' : 'text-green-100 hover:bg-green-600 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span class="font-medium">Kelola Sampah</span>
            </a>

            <!-- Kelola Poin -->
            <a href="{{ route('point') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('superadmin.poin.*') ? 'bg-green-600 text-white shadow-md' : 'text-green-100 hover:bg-green-600 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">Kelola Poin</span>
            </a>

            <div class="my-4 border-t border-green-600"></div>

            <!-- Laporan -->
            <a href="#" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('superadmin.laporan.*') ? 'bg-green-600 text-white shadow-md' : 'text-green-100 hover:bg-green-600 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="font-medium">Laporan</span>
            </a>

            <!-- Pengaturan -->
            <a href="#" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('superadmin.settings.*') ? 'bg-green-600 text-white shadow-md' : 'text-green-100 hover:bg-green-600 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="font-medium">Pengaturan</span>
            </a>
        </div>
    </nav>

    <!-- User Info at Bottom -->
    <div class="p-4 border-t border-green-600">
        <div class="flex items-center space-x-3 mb-3">
            <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                <span class="text-white font-bold">{{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}</span>
            </div>
            <div class="flex-1">
                <p class="text-white text-sm font-semibold truncate">{{ auth()->user()->nama }}</p>
                <p class="text-green-200 text-xs">{{ ucfirst(auth()->user()->role) }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>