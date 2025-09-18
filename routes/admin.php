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
    });
});
