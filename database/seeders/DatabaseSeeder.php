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
            'email' => 'admin@hima-aksiunsika.com',
            'role' => 'admin',
            'password' => bcrypt('Admin!!HimaAksi2324'),
        ]);
        User::create([
            'name' => 'Zaky Ramadhan',
            'email' => 'zakyramadhan@hima-aksiunsika.com',
            'role' => 'user',
            'password' => bcrypt('12345678'),
        ]);
    }
}