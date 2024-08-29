<?php

use Illuminate\Support\Facades\Route;

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

