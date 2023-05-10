<?php

use App\Http\Controllers\CashController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasTransaksi;
use App\Http\Controllers\KasTransaksiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\BulanTagihanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Kas Transaksi
    Route::get('/data-cash', [BulanTagihanController::class, 'index'])->name('admin.data.cash');
    Route::get('/create-bulan-tagihan', [BulanTagihanController::class, 'createBulanTagihan'])->name('admin.create.bulan.tagihan');
    Route::post('/create-bulan-tagihan', [BulanTagihanController::class, 'storeBulanTagihan'])->name('admin.store.bulan.tagihan');
    Route::get('/data-bulan-tagihan/{id}', [BulanTagihanController::class, 'show'])->name('admin.data.tagihan');
    Route::post('/create-tagihan-mingguan/{id}', [KasTransaksiController::class, 'storeTagihanMingguan'])->name('admin.store.tagihan.mingguan');
    Route::get('detail-tagihan-mingguan/{kasTransaksi}', [BulanTagihanController::class, 'detailTagihanMingguan'])->name('detail.tagihan.mingguan');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

