<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/blog/{blog}",function($slug){
    $path = __DIR__."/../resources/blogs/$slug.html";

    if (!file_exists($path)) {
       return redirect("/");
    }
    $blog = Cache::remember("blog.$slug", 5, function () use($path) {
        return file_get_contents($path);
    });
    // dd($blog);
    // $blog = file_get_contents($path);

    return view('blog',[
        "blog" => $blog
    ]);
})->where('blog','[A-z\d\-_]+');

