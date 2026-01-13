<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
=======
use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> 44fc51f (push)

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
=======
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
>>>>>>> 44fc51f (push)
        ]);
    }
}
