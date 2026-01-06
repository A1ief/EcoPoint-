<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create SuperAdmin
        User::create([
            'nama' => 'Super Administrator',
            'email' => 'superadmin@sampah.com',
            'alamat' => 'Jl. Administrator No. 1',
            'password' => Hash::make('super123'),
            'role' => 'superadmin',
            'is_active' => true,
        ]);

        // Create Admin
        User::create([
            'nama' => 'Admin1',
            'email' => 'admin@sampah.com',
            'alamat' => 'Jl. Admin No. 2',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}
