<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

// Admin Routes
Route::prefix('admin')->group(function () {
    // Routes for guests (not logged in)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    });

    // Routes for authenticated admins
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.dashboard');
        })->name('admin.dashboard');

        Route::get('/profile', [AdminAuthController::class, 'showProfileForm'])->name('admin.profile');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // Hero Slider
        Route::get('/hero-slider', [App\Http\Controllers\HeroSliderController::class, 'index'])->name('admin.heroslider');
        Route::get('/hero-slider/create', [App\Http\Controllers\HeroSliderController::class, 'create'])->name('admin.heroslider.create');
        Route::post('/hero-slider', [App\Http\Controllers\HeroSliderController::class, 'store'])->name('admin.heroslider.store');
        Route::get('/hero-slider/{id}/edit', [App\Http\Controllers\HeroSliderController::class, 'edit'])->name('admin.heroslider.edit');
        Route::put('/hero-slider/{id}', [App\Http\Controllers\HeroSliderController::class, 'update'])->name('admin.heroslider.update');
        Route::get('/hero-slider/{id}', [App\Http\Controllers\HeroSliderController::class, 'show'])->name('admin.heroslider.view');
    });
});
