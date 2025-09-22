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

Route::get('/inbound-tour', function() {
    return view('user.pages.inbound');
});

Route::get('/packages', function() {
    return view('user.pages.packagedetails');
});


Route::get('/outbound-tours', function() {
    return view('user.pages.outbound');
});

Route::get('/select-dates', function() {
    return view('user.pages.selectdates');
});

Route::get('selectdates', function () {
    return view('user.pages.selectdates');
})->name('selectdates');

Route::get('vlogs', function () {
    return view('user.pages.vlogs');
})->name('vlogs');

// Destination Pages
Route::get('/destinations/categories', function () {
    return view('user.pages.destination-categories');
})->name('destination-categories');

Route::get('/destinations/popular', function () {
    return view('user.pages.popular-destinations');
})->name('popular-destinations');

Route::get('/destinations/{slug}', function ($slug) {
    return view('user.pages.destination-details-info', compact('slug'));
})->name('destination-details');
