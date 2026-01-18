@extends('layouts.app')
@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Tambah User Baru</h3>
                <p class="text-sm text-gray-500 mt-1">Tambahkan pengguna baru ke sistem</p>
            </div>
            <a href="{{ route('users.index') }}"
                class="bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-xl flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                <span>Kembali</span>
            </a>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                <p class="font-medium mb-2">Terjadi kesalahan:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <form method="POST" action="{{ route('users.store') }}" class="space-y-6">
                @csrf

                <!-- Personal Information -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pribadi</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                placeholder="Masukkan nama lengkap" required>
                            @error('nama')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                placeholder="contoh@email.com" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Telepon -->
                        <div>
                            <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon
                            </label>
                            <input type="tel" id="telepon" name="telepon" value="{{ old('telepon') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                placeholder="0812-3456-7890">
                            @error('telepon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                                Alamat
                            </label>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Account Information -->
                <div class="border-b border-gray-200 pb-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Informasi Akun</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                    placeholder="Minimal 8 karakter" required>
                                <button type="button" onclick="togglePassword('password')"
                                    class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                Konfirmasi Password <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                    placeholder="Ulangi password" required>
                                <button type="button" onclick="togglePassword('password_confirmation')"
                                    class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Role & Status -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Role & Status</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Role -->
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                                Role <span class="text-red-500">*</span>
                            </label>
                            <select id="role" name="role"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                required>
                                <option value="">Pilih Role</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super Admin
                                </option>
                            </select>
                            <div class="mt-2 text-sm text-gray-500">
                                <ul class="list-disc list-inside">
                                    <li><span class="font-semibold text-purple-600">Super Admin:</span> Akses penuh sistem
                                    </li>
                                    <li><span class="font-semibold text-blue-600">Admin:</span> Akses terbatas</li>
                                    <li><span class="font-semibold text-gray-600">User:</span> Akses dasar</li>
                                </ul>
                            </div>
                            @error('role')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status Akun <span class="text-red-500">*</span>
                            </label>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input type="radio" id="status_active" name="is_active" value="1"
                                        {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                                        class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                                    <label for="status_active" class="ml-3 flex items-center">
                                        <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                        <span class="text-sm font-medium text-gray-700">Aktif</span>
                                        <span class="text-sm text-gray-500 ml-2">(Dapat login)</span>
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="status_inactive" name="is_active" value="0"
                                        {{ old('is_active') == '0' ? 'checked' : '' }}
                                        class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300">
                                    <label for="status_inactive" class="ml-3 flex items-center">
                                        <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                                        <span class="text-sm font-medium text-gray-700">Tidak Aktif</span>
                                        <span class="text-sm text-gray-500 ml-2">(Tidak dapat login)</span>
                                    </label>
                                </div>
                            </div>
                            @error('is_active')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('users.index') }}"
                        class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-8 py-3 rounded-lg font-medium transition-all duration-300 shadow-md hover:shadow-xl flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Simpan User</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }
    </script>
@endsection
