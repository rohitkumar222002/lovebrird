<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('welcome');
});
Route::get('admin/login', [AdminController::class, 'showLoginForm']);
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('profilee', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::put('profilee', [AdminController::class, 'AdminProfileUpdate'])->name(name: 'admin.profileupdate');
    Route::get('general/setting', [AdminController::class, 'GeneralSetting'])->name('admin.generalsetting');
    Route::POST('general/setting', [AdminController::class, 'GeneralSettingUpdate'])->name('admin.generalsettingUpdate');
    
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
