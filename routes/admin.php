<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\HeroSliderController;

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
        Route::get('/hero-slider', [HeroSliderController::class, 'index'])->name('admin.heroslider');
        Route::get('/hero-slider/create', [HeroSliderController::class, 'create'])->name('admin.heroslider.create');
        Route::post('/hero-slider', [HeroSliderController::class, 'store'])->name('admin.heroslider.store');
        Route::get('/hero-slider/{id}/edit', [HeroSliderController::class, 'edit'])->name('admin.heroslider.edit');
        Route::delete('/hero-slider/{id}/destroy', [HeroSliderController::class, 'destroy'])->name('admin.heroslider.destroy');
        Route::put('/hero-slider/{id}', [HeroSliderController::class, 'update'])->name('admin.heroslider.update');
        Route::patch('/hero-slider/{id}/toggle-status', [HeroSliderController::class, 'toggleStatus'])->name('admin.heroslider.toggle-status');
        Route::get('/hero-slider/{id}', [HeroSliderController::class, 'show'])->name('admin.heroslider.view');
        Route::get('/hero-slider/data', [HeroSliderController::class, 'data'])->name('admin.heroslider.data');
    });
});
