<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.pages.hero');
});

Route::get('/contact', function () {
    return view('user.pages.contact');
});

Route::get('/about', function () {
    return view('user.pages.aboutus');
});

Route::get('/privacy-policy', function () {
    return view('user.pages.privacypolicy');
});

Route::get('/destinations', function() {
    return view('user.pages.alldestinations');
});
