<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk membuat akun default.
     */
    public function run(): void
    {
        // Hapus admin lama jika ada
        User::where('email', 'admin@example.com')->delete();

        // Buat akun Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin1@example.com',
            'password' => 'admin123', // ganti sesuai kebutuhan
            'role' => 'admin',
        ]);

        // Buat contoh akun User biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
