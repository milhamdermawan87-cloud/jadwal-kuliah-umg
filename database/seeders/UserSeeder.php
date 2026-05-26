<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin UMG',
            'email' => 'admin@umg.ac.id',
            'nim' => '2024010001',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Mahasiswa UMG',
            'email' => 'mahasiswa@umg.ac.id',
            'nim' => '2024010002',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
    }
}
