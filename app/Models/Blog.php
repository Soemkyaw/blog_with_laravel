<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $show;
    public $body;

    public function __construct($title,$slug,$show,$body){
        $this->title = $title;
        $this->slug = $slug;
        $this->show = $show;
        $this->body = $body;
    }

    public static function all(){
        $files =File::files(resource_path("blogs"));
        $blogs = [];
        foreach ($files as $file) {
            $obj = YamlFrontMatter::parseFile($file);
            $blog = new Blog($obj->title,$obj->slug,$obj->show,$obj->body());
            $blogs[] = $blog;
        }
        return $blogs;
    }


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

