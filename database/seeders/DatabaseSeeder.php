<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Super Admin
        User::create([
            'nama' => 'Super Admin',
            'username' => 'superadmin',
            'password' => Hash::make('password'),
            'role' => 'super admin',
        ]);

        // Create Admin
        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create User
        User::create([
            'nama' => 'User Demo',
            'username' => 'user',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create Sample Barang
        Barang::create([
            'nama_barang' => 'Laptop Dell Latitude',
            'kode_barang' => 'LPT001',
            'jumlah' => 5,
            'lokasi' => 'Ruang IT - Rak A1',
            'status' => 'tersedia',
        ]);

        Barang::create([
            'nama_barang' => 'Proyektor Epson',
            'kode_barang' => 'PRJ001',
            'jumlah' => 3,
            'lokasi' => 'Ruang Meeting - Lemari B',
            'status' => 'tersedia',
        ]);

        Barang::create([
            'nama_barang' => 'Kamera Canon EOS',
            'kode_barang' => 'CAM001',
            'jumlah' => 2,
            'lokasi' => 'Ruang Multimedia',
            'status' => 'tersedia',
        ]);

        Barang::create([
            'nama_barang' => 'Microphone Wireless',
            'kode_barang' => 'MIC001',
            'jumlah' => 10,
            'lokasi' => 'Ruang Audio - Rak C2',
            'status' => 'tersedia',
        ]);

        Barang::create([
            'nama_barang' => 'Tablet iPad Pro',
            'kode_barang' => 'TAB001',
            'jumlah' => 8,
            'lokasi' => 'Ruang IT - Rak A2',
            'status' => 'tersedia',
        ]);
    }
}
