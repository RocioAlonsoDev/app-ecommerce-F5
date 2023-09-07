<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/orders', [AdminController::class, 'adminOrders'])->name('admin.orders');
    Route::get('/admin/menu', [AdminController::class, 'adminMenu'])->name('admin.menu');
    Route::get('/admin/admins', [AdminController::class, 'adminAdmins'])->name('admin.admins');
    Route::get('/admin/stats', [AdminController::class, 'adminStats'])->name('admin.stats');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
});

