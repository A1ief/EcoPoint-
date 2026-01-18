@extends('layouts.app')
@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Edit Data Sampah</h3>
                <p class="text-sm text-gray-500 mt-1">Form untuk mengubah data sampah</p>
                <div class="flex items-center space-x-2 mt-2">
                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">ID: #123</span>
                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Dibuat: 15/03/2024</span>
                </div>
            </div>
            <a href="{{ route('rubbish') }}"
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
            <form method="POST" action="#" enctype="multipart/form-data" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Pemilik -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Pemilik <span class="text-red-500">*</span>
                        </label>
                        <select name="id_user"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <option value="">Pilih Pemilik</option>
                            <option value="1" selected>John Doe</option>
                            <option value="2">Jane Smith</option>
                            <option value="3">Bob Johnson</option>
                        </select>
                    </div>

                    <!-- Berat -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Berat (kg) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="berat" step="0.01" min="0" value="5.00"
                                placeholder="Masukkan berat dalam kg"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <!-- Jenis -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Sampah <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <option value="">Pilih Jenis Sampah</option>
                            <option value="plastik" selected>Plastik</option>
                            <option value="kertas">Kertas</option>
                            <option value="logam">Logam</option>
                            <option value="kaca">Kaca</option>
                            <option value="organik">Organik</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <!-- Kriteria -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Kriteria <span class="text-red-500">*</span>
                        </label>
                        <textarea name="kriteria" rows="3" placeholder="Contoh: Plastik botol PET warna hijau, kondisi bersih"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">Plastik Botol Bekas</textarea>
                        <p class="text-xs text-gray-500 mt-1">Deskripsikan sampah secara detail</p>
                    </div>

                    <!-- Current Photo Preview -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Foto Saat Ini
                        </label>
                        <div class="flex items-center space-x-4">
                            <div class="border border-gray-200 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-2">Tidak ada foto tersedia</p>
                                <p class="text-xs text-gray-500">Upload foto baru untuk mengganti</p>
                            </div>
                            <div class="text-sm text-gray-600">
                                <span class="text-yellow-600">*</span> Kosongkan jika tidak ingin mengubah foto
                            </div>
                        </div>
                    </div>

                    <!-- New Photo Upload -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Upload Foto Baru
                        </label>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-500 transition-colors">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class="text-sm text-gray-600 mb-2">
                                <span class="font-medium text-green-600 hover:text-green-500 cursor-pointer">
                                    Pilih file baru
                                </span>
                                atau drag and drop
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                            <input type="file" name="foto" class="hidden" accept="image/*">
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('rubbish') }}"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-gradient-to-r from-yellow-600 to-amber-600 hover:from-yellow-700 hover:to-amber-700 text-white px-8 py-3 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-xl flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Update Data</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Danger Zone -->
        <div class="bg-white rounded-xl shadow-md border border-red-200 overflow-hidden">
            <div class="bg-red-50 px-6 py-4 border-b border-red-200">
                <h4 class="text-lg font-semibold text-red-800">Zona Bahaya</h4>
                <p class="text-sm text-red-600 mt-1">Hati-hati dengan tindakan di bawah ini</p>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="font-medium text-gray-800">Hapus Data Sampah</h5>
                        <p class="text-sm text-gray-600 mt-1">Setelah dihapus, data tidak dapat dikembalikan</p>
                    </div>
                    <form action="#" method="POST" class="inline"
                        onsubmit="return confirm('Yakin ingin menghapus data sampah ini? Tindakan ini tidak dapat dibatalkan.')">
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            <span>Hapus Data</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
