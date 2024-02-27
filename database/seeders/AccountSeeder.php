<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'Akun Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('123456')
            ],

            [
                'username' => 'user1',
                'name' => 'Akun User1',
                'email' => 'user1@gmail.com',
                'role' => 'user',
                'password' => Hash::make('123456')
            ],
            [
                'username' => 'user2',
                'name' => 'Akun User2',
                'email' => 'user2@gmail.com',
                'role' => 'user',
                'password' => Hash::make('123456')
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}