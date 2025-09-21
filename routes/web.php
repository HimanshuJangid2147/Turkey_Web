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

Route::get('/packages', function() {
    return view('user.pages.packagedetails');
});

Route::get('/outbound', function() {
    return view('user.pages.outbound');
});

Route::get('/select-dates', function() {
    return view('user.pages.selectdates');
});

Route::get('/vlogs', function() {
    return view('user.pages.vlogs');
});
