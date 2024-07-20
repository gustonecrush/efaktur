<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\BahanMentahController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangJasaKenaPajakController;
use App\Http\Controllers\BarangPemesananController;
use App\Http\Controllers\FakturPajakController;
use App\Http\Controllers\HasilProduksiController;
use App\Http\Controllers\HotelMadinahController;
use App\Http\Controllers\HotelMekahController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\MitrasController;
use App\Http\Controllers\PaketUmrahController;
use App\Http\Controllers\PembeliKenaPajakController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengusahaKenaPajakController;
use App\Http\Controllers\PesawatController;
use App\Http\Controllers\SupplierController;
use App\Models\HasilProduksi;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

// =============================== ADMIN ===============================
Route::get('/admin/login', [AdminController::class, 'loginPage'])->name('admin.loginPage');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [AdminController::class, 'dashboardPage'])->name('admin.dashboardPage');



Route::get('/admin/pengusaha-kena-pajak', [AdminController::class, 'pengusahaKenaPajakPage'])->name('admin.pengusaha');
Route::post('/admin/pengusaha-kena-pajak', [PengusahaKenaPajakController::class, 'store'])->name('admin.pengusaha.store');
Route::put('/admin/pengusaha-kena-pajak', [PengusahaKenaPajakController::class, 'update'])->name('admin.pengusaha.update');
Route::delete('/admin/pengusaha-kena-pajak', [PengusahaKenaPajakController::class, 'destroy'])->name('admin.pengusaha.destroy');

Route::get('/admin/pembeli-kena-pajak', [AdminController::class, 'pembeliKenaPajakPage'])->name('admin.pembeli');
Route::post('/admin/pembeli-kena-pajak', [PembeliKenaPajakController::class, 'store'])->name('admin.pembeli.store');
Route::put('/admin/pembeli-kena-pajak', [PembeliKenaPajakController::class, 'update'])->name('admin.pembeli.update');
Route::delete('/admin/pembeli-kena-pajak', [PembeliKenaPajakController::class, 'destroy'])->name('admin.pembeli.destroy');

Route::get('/admin/faktur', [AdminController::class, 'fakturPajakPage'])->name('admin.faktur');
Route::post('/admin/faktur', [FakturPajakController::class, 'store'])->name('admin.faktur.store');
Route::put('/admin/faktur', [FakturPajakController::class, 'update'])->name('admin.faktur.update');
Route::delete('/admin/faktur', [FakturPajakController::class, 'destroy'])->name('admin.faktur.destroy');

Route::get('/admin/faktur/{id}', [AdminController::class, 'fakturPajakDetailPage']);

Route::post('/admin/barang', [BarangJasaKenaPajakController::class, 'store'])->name('admin.barang.store');
Route::put('/admin/barang', [BarangJasaKenaPajakController::class, 'update'])->name('admin.barang.update');
Route::delete('/admin/barang', [BarangJasaKenaPajakController::class, 'destroy'])->name('admin.barang.destroy');
