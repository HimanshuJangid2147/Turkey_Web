<?php

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

Route::get('/admin', function () {
    return view('admin.pages.dashboard');
});

Route::get('/admin/login', function () {
    return view('admin.pages.login');
});

Route::get('/admin/profile', function () {
    return view('admin.pages.profile');
});
