<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'name' => 'Admin',
            'password' => Hash::make('admin123')
        ]);

        \App\Models\Admin::create([
            'username' => 'direktur',
            'email' => 'direktur@gmail.com',
            'role' => 'Direktur',
            'name' => 'Direktur',
            'password' => Hash::make('direktur123')
        ]);

        \App\Models\Admin::create([
            'username' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'role' => 'Karyawan',
            'name' => 'Karyawan',
            'password' => Hash::make('karyawan123')
        ]);
    }
}
