<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.pages.hero');
});

Route::get('/contact', function () {
    return view('user.pages.contact');
})->name('contact');

Route::get('/about', function () {
    return view('user.pages.aboutus');
})->name('aboutus');

Route::get('/privacy-policy', function () {
    return view('user.pages.privacypolicy');
})->name('privacypolicy');

Route::get('/terms-and-conditions', function () {
    return view('user.pages.terms');
})->name('terms-and-conditions');

Route::get('/inbound-tour', function() {
    return view('user.pages.inbound');
})->name('inbound-tour');

Route::get('/packages', function() {
    return view('user.pages.packagedetails');
})->name('packages');


Route::get('/outbound-tours', function() {
    return view('user.pages.outbound');
})->name('outbound-tours');

Route::get('/select-dates', function() {
    return view('user.pages.selectdates');
})->name('select-dates');

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

Route::get('/destinations-details', function () {
    return view('user.pages.destination-details-info');
})->name('destination-details');

Route::get('/best-deals', function () {
    return view('user.pages.best-deals');
})->name('best-deals');

Route::get('/faq', function () {
    return view('user.pages.faq');
})->name('faq');

Route::get('/safe-travel', function () {
    return view('user.pages.safe-travel');
})->name('safe-travel');

Route::get('/travel-alerts', function () {
    return view('user.pages.travel-alerts');
})->name('travel-alerts');

Route::get('/terms-and-conditions', function () {
    return view('user.pages.terms');
})->name('terms-and-conditions');
?>
