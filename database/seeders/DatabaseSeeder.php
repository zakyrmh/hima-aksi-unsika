<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Zaky Ramadhan',
            'email' => 'zakyramadhan@gmail.com',
            'role' => 'user',
            'password' => bcrypt('12345678'),
        ]);
    }
}