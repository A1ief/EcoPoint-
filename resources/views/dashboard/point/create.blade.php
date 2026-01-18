@extends('layouts.app')
@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Tambah Transaksi Poin</h3>
                <p class="text-sm text-gray-500 mt-1">Form untuk menambahkan transaksi poin baru</p>
            </div>
            <a href="#"
                class="bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-xl flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                <span>Kembali</span>
            </a>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <form method="POST" action="#" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- User Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            User <span class="text-red-500">*</span>
                        </label>
                        <select name="id_user"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <option value="">Pilih User</option>
                            <option value="1">John Doe (ID: 1)</option>
                            <option value="2">Jane Smith (ID: 2)</option>
                            <option value="3">Bob Johnson (ID: 3)</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Pilih user pemilik sampah</p>
                    </div>

                    <!-- Sampah Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Sampah <span class="text-red-500">*</span>
                        </label>
                        <select name="id_sampah"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <option value="">Pilih Sampah</option>
                            <option value="1">Plastik Botol (5 kg) - John Doe</option>
                            <option value="2">Kertas Koran (3 kg) - Jane Smith</option>
                            <option value="3">Logam Besi (2 kg) - Bob Johnson</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Pilih sampah yang akan ditukar</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>

                    <!-- Berat -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Berat (kg) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="berat" step="0.01" min="0" value=""
                                placeholder="Masukkan berat dalam kg"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                </path>
                            </svg>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Berat sampah dalam kilogram</p>
                    </div>

                    <!-- Aksi -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Aksi
                        </label>
                        <textarea name="aksi" rows="3"
                            placeholder="Contoh: Penukaran sampah plastik untuk poin, Tukar sampah kertas dengan voucher..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors"></textarea>
                        <p class="text-xs text-gray-500 mt-1">Deskripsi singkat tentang transaksi poin ini</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="#"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-8 py-3 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-xl flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Simpan Transaksi</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Info Section -->
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h4 class="font-semibold text-blue-800">Informasi Penting</h4>
                    <ul class="mt-2 space-y-1 text-sm text-blue-700">
                        <li>• Status "Pending" berarti transaksi menunggu persetujuan</li>
                        <li>• Status "Approved" berarti transaksi telah disetujui dan poin telah ditambahkan</li>
                        <li>• Status "Rejected" berarti transaksi ditolak dan poin tidak ditambahkan</li>
                        <li>• Berat sampah akan digunakan untuk menghitung poin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
