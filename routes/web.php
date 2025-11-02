<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorRegistrationController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\ProductShowController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| File ini berisi semua route utama aplikasi Campify.
| Urutan diatur agar pengguna diarahkan ke halaman login terlebih dahulu,
| sebelum bisa mengakses halaman lain seperti dashboard atau vendor panel.
|
*/

// 🟣 1. Halaman Utama → Redirect langsung ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 🟣 2. Autentikasi (Login, Register, Forgot Password, Verify Email)
require __DIR__ . '/auth.php';

// 🟣 3. Dashboard (setelah login dan verifikasi email)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // 🟣 4. Profil User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🟣 5. Pendaftaran Vendor (hanya user yang sudah login & verifikasi)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/become-vendor', [VendorRegistrationController::class, 'create'])
        ->name('vendor.register.create');
    Route::post('/become-vendor', [VendorRegistrationController::class, 'store'])
        ->name('vendor.register.store');
});

// 🟣 6. Panel Vendor (khusus user dengan role vendor)
Route::middleware(['auth', 'is.vendor'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard'); // pastikan file resources/views/dashboard.blade.php ada
})->middleware('auth')->name('dashboard');


// 🟣 7. Halaman Publik: Detail Produk
Route::get('/product/{product}', ProductShowController::class)
    ->name('product.show');

    Route::post('/register/step2', [RegisterController::class, 'postStep2'])->name('register.step2.post');
