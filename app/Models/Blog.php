<?php

namespace App\Models;
use Illuminate\Support\Facades\Cache;

class Blog
{
    public static function find($slug){
        $path = resource_path("blogs/$slug.html");
        if (!file_exists($path)) {
        return redirect("/");
        }
        $blog = Cache::remember("blog.$slug", 5, function () use($path) {
            return file_get_contents($path);
        });
        return $blog;
    }
}

