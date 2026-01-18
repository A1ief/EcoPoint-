@extends('layouts.app')
@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Daftar Sampah</h3>
                <p class="text-sm text-gray-500 mt-1">Total: <span
                        class="font-semibold text-green-600">{{ $totalSampah ?? 0 }}</span> data sampah</p>
                <p class="text-sm text-gray-500 mt-1">Total Berat: <span
                        class="font-semibold text-blue-600">{{ $totalBerat ?? 0 }} kg</span></p>
            </div>
            <a href="{{ route('rubbishCreate') }}"
                class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-xl flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                <span>Tambah Data Sampah</span>
            </a>
        </div>

        <!-- Filter & Search -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <form method="GET" action="" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cari Data</label>
                    <div class="relative">
                        <input type="text" name="search" value=""
                            placeholder="Cari berdasarkan kriteria atau jenis..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Jenis Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Sampah</label>
                    <select name="jenis"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Semua Jenis</option>
                        <option value="plastik">Plastik</option>
                        <option value="kertas">Kertas</option>
                        <option value="logam">Logam</option>
                        <option value="kaca">Kaca</option>
                        <option value="organik">Organik</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- User Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pemilik</label>
                    <select name="id_user"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Semua Pemilik</option>
                        <!-- User options will be populated here -->
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex items-end">
                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-green-600 to-emerald-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Pemilik</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Kriteria</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Berat (kg)</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Jenis</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Foto</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Tanggal</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Data rows will be populated here -->
                        <tr class="hover:bg-green-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-800">1</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                        <span class="text-green-700 font-bold text-sm">JD</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">John Doe</p>
                                        <p class="text-xs text-gray-500">ID: 1</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Plastik Botol Bekas</td>
                            <td class="px-6 py-4 text-sm text-gray-800 font-semibold">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                    5 kg
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                    Plastik
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-gray-400 text-sm">-</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                15/03/2024 14:30
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- Detail -->
                                    <a href="#"
                                        class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors"
                                        title="Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('rubbishEdit') }}"
                                        class="p-2 bg-yellow-100 hover:bg-yellow-200 text-yellow-600 rounded-lg transition-colors"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Delete -->
                                    <form action="#" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data sampah ini?')">
                                        <button type="submit"
                                            class="p-2 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg transition-colors"
                                            title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Empty state -->
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                                <p class="text-lg font-medium">Tidak ada data sampah</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                <!-- Pagination links will be added here -->
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari
                        <span class="font-medium">50</span> data
                    </div>
                    <div class="flex space-x-2">
                        <button
                            class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Sebelumnya</button>
                        <button class="px-3 py-1 bg-green-600 text-white rounded-lg">1</button>
                        <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">2</button>
                        <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">3</button>
                        <button
                            class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
