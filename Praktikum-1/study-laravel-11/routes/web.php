<?php

use Illuminate\Support\Facades\Route;

//Rute GET sederhana

Route ::get('/hello', function () {
    return 'Hello, World!';
});

// //Rute dengan parameter
// Route ::get('/user/{id}', function ($id) {
//     return "User ID: " . $id;
// });

//Rute dengan parameter optional
Route ::get('/user/{name?}', function($name = 'Guest'){
    return "Selamat datang, ". $name;});

//Rute dengan nama
Route::get('/profile', function(){
    return "Halaman Profile";
})->name('profile');

//Menggunakan rute bernama untuk pengalihan
Route::get('/redirect-to-profile', function(){
    return redirect()->route('profile');
});

//Rute Group
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){
        return 'Admin Dashboard';
    });

    Route::get('/profile', function(){
        return 'Admin Profile';
    });
});

//Rute Middleware
Route::get('/dashboard', function(){
    return 'Welcome to dashboard';
})->middleware('auth');

//Rute Resource
Route::resource('Post', 'PostController');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about', [
        "nama" => "Tegar Wisnukurnia Aji",
        "npm" => "2010631170035",
        "email" => "tegarwisnu01@gmail.com"
    ]
);
});

Route::get('/blog', function () {
    return view('posts');
});

