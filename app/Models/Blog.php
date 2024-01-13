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
    public $date;

    public function __construct($title,$slug,$show,$body,$date){
        $this->title = $title;
        $this->slug = $slug;
        $this->show = $show;
        $this->body = $body;
        $this->date = $date;
    }

    public static function all(){
        $files =File::files(resource_path("blogs"));
        return collect($files)->map(function($file){
            $obj = YamlFrontMatter::parseFile($file);
            return new Blog($obj->title,$obj->slug,$obj->show,$obj->body(),$obj->date);
        })->sortByDesc('date');
    }


    public static function find($slug){
        $blogs = static::all();
        return $blogs->firstWhere('slug',$slug);
    }
}

