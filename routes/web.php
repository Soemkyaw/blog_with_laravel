<?php

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

Route::get("/blog/{blog}",function($fileName){
    $path = __DIR__."/../resources/blogs/$fileName.html";

    if (!file_exists($path)) {
       return redirect("/");
    }
    $blog = file_get_contents($path);

    return view('blog',[
        "blog" => $blog
    ]);
})->where('blog','[A-z\d\-_]+');

