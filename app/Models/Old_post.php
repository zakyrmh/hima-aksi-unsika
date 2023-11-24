<?php

namespace App\Models;

class Post
{
    private static $blog_post = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "urlImage" => "https://1.bp.blogspot.com/-lTJvQzNtTRw/XMTxH9UGFCI/AAAAAAAAPFQ/iVfu94tODOQ_AVuG1m-zN1Hl4NcipaCIACLcBGAs/s1600/event.png",
            "author" => "Zaky",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit."
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "urlImage" => "https://1.bp.blogspot.com/-lTJvQzNtTRw/XMTxH9UGFCI/AAAAAAAAPFQ/iVfu94tODOQ_AVuG1m-zN1Hl4NcipaCIACLcBGAs/s1600/event.png",
            "author" => "Dauzan",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit."
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
