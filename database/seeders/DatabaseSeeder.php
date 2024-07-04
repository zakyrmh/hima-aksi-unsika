<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MemberCategory;
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

        MemberCategory::create([
            'title' => 'Badan Pengurus Harian',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/No_Image_Available.png'
        ]);
        MemberCategory::create([
            'title' => 'Bidang Pendidikan',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/Bidang Pendidikan.png'
        ]);
        MemberCategory::create([
            'title' => 'Devisi Pengajian Akuntansi',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/No_Image_Available.png'
        ]);
        MemberCategory::create([
            'title' => 'Devisi Kewirausahaan',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/Devisi Kewirausahaan.png'
        ]);
        MemberCategory::create([
            'title' => 'Bidang Penelitian & Pengembangan',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/Bidang Penelitian & Pengembangan.png'
        ]);
        MemberCategory::create([
            'title' => 'Divisi Komunikasi Dan Informasi',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/Divisi Komunikasi Dan Informasi.png'
        ]);
        MemberCategory::create([
            'title' => 'Divisi Pengembangan Sumber Daya Organisasi',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/Divisi Pengembangan Sumber Daya Organisasi.png'
        ]);
        MemberCategory::create([
            'title' => 'Bidang Pengabdian',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/Bidang Pengabdian.png'
        ]);
        MemberCategory::create([
            'title' => 'Divisi Minat Dan Bakat',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/Devisi Minat dan Bakat.png'
        ]);
        MemberCategory::create([
            'title' => 'Divisi Pengabdian Masyarakat',
            'description' => '',
            'period' => '2023',
            'background' => 'assets/images/member_categories/Devisi Pengabdian Masyarakat.png'
        ]);
    }
}