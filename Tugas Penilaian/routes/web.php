<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;

// Redirect root sesuai status login
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('home')
        : redirect()->route('login');
});

// Routes untuk login & register (guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Routes untuk user yang sudah login
Route::middleware('auth')->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/stats', [DashboardController::class, 'getStats'])->name('dashboard.stats');

    // Group admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/laporan', [ReportController::class, 'index'])->name('laporan');
        Route::get('/laporan/export', [ReportController::class, 'exportPdf'])->name('laporan.export');

        Route::get('/pengaturan', [SettingsController::class, 'index'])->name('pengaturan');
        Route::post('/update-profile', [SettingsController::class, 'updateProfile'])->name('update-profile');
        Route::post('/update-settings', [SettingsController::class, 'updateSettings'])->name('update-settings');
        Route::post('/update-notifications', [SettingsController::class, 'updateNotifications'])->name('update-notifications');
        Route::post('/change-password', [SettingsController::class, 'changePassword'])->name('change-password');

        // Admin melihat semua favorites
        Route::get('/favorites', [FavoriteController::class, 'adminIndex'])->name('favorites');

        // Admin Messages routes
        Route::get('/messages', [MessageController::class, 'adminIndex'])->name('messages'); 
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show'); 
        Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply'); 
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        // Rute untuk manajemen karir (Admin)
        Route::resource('career', AdminCareerController::class);
    });

    // Messages routes untuk user
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages', function() {
        return view('messager');
    });

    // User melihat pesan mereka sendiri
    Route::get('/my-messages', [MessageController::class, 'userMessages'])->name('user.messages');
    Route::get('/my-messages/{message}', [MessageController::class, 'userMessageDetail'])->name('user.messages.show');

    // Halaman user statis
    Route::view('/home', 'home')->name('home');
    Route::view('/ai', 'ai');
    Route::view('/kontak', 'kontak');
    Route::view('/promo', 'promo');
    Route::view('/beli', 'beli');
    Route::view('/pengantaran', 'pengantaran')->name('pengantaran');
    Route::view('/profil-perusahaan', 'company_profile')->name('company.profile');
    
    // Halaman keunggulan perusahaan
    Route::view('/technology', 'technology')->name('technology');
    Route::view('/team', 'team')->name('team');
    Route::view('/quality', 'quality')->name('quality');
    Route::view('/service', 'service')->name('service');
    Route::view('/environment', 'environment')->name('environment');
    Route::view('/innovation', 'innovation')->name('innovation');

    // Rute untuk halaman karir publik
    Route::get('/career', [CareerController::class, 'index'])->name('career');
    Route::get('/career/{id}', [CareerController::class, 'show'])->name('career.show');

    // Menu melalui controller
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');

    // Order routes
    Route::post('/beli', [OrderController::class, 'store'])->name('order.store');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/orders/recent', [OrderController::class, 'getRecentOrders'])->name('orders.recent');

    // User favorites
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites/check/{menuId}', [FavoriteController::class, 'check'])->name('favorites.check');
    Route::get('/my-favorites', [FavoriteController::class, 'index'])->name('my-favorites');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
