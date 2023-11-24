<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Zaky Ramadhan',
        //     'email' => 'zaxxy@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Dauzanda Irlando',
        //     'email' => 'dauzan@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'News',
            'slug' => 'news'
        ]);

        Category::create([
            'name' => 'Event',
            'slug' => 'event'
        ]);

        Category::create([
            'name' => 'None',
            'slug' => 'none'
        ]);

        // Post::create([
        //     'title' => 'Judul Post Pertama',
        //     'image_url' => 'https://cdn0-production-images-kly.akamaized.net/xYEcqMdBWw6pN0mFBFD5_5uIjz8=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3396365/original/023706600_1615209973-concert-768722_1280.jpg',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Post Kedua',
        //     'image_url' => 'https://cdn0-production-images-kly.akamaized.net/xYEcqMdBWw6pN0mFBFD5_5uIjz8=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3396365/original/023706600_1615209973-concert-768722_1280.jpg',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Post Ketiga',
        //     'image_url' => 'https://cdn0-production-images-kly.akamaized.net/xYEcqMdBWw6pN0mFBFD5_5uIjz8=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3396365/original/023706600_1615209973-concert-768722_1280.jpg',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus, blanditiis neque eaque beatae et reprehenderit expedita perferendis nisi fugiat corporis?</p>',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        User::factory(5)->create();
        Post::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
