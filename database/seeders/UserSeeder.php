<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     function run()
    {
        User::create([
            'username' => "admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('1234'),
            'nama_lengkap' => "admin",
            'role' => "admin",
            'alamat' => "sukabumi"
        ]);
        User::create([
            'username' => "user",
            'email' => "user@gmail.com",
            'password' => bcrypt('1234'),
            'nama_lengkap' => "user",
            'role' => "user",
            'alamat' => "sukabumi"
        ]);
    }
}