<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AsistenController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/test', [DashboardController::class, 'index']);
Route::post('/checkin', [AbsensiController::class, 'absensi'])->name('check-in');
Route::get('/checkout', [AbsensiController::class, 'checkout'])->name('check-out');
Route::get('/riwayat', [AbsensiController::class, 'riwayat'])->name('riwayat');


Route::prefix('report')->middleware(['admin'])->group(function () {
    Route::get('/', [AbsensiController::class, 'report'])->name('report');
    Route::get('/period', [AbsensiController::class, 'reportPeriod'])->name('reportPeriod');
    Route::get('/export', [AbsensiController::class, 'exportExcel'])->name('reportExport');
});

Route::prefix('asisten')->middleware(['admin'])->group(function () {
    Route::get('/', [AsistenController::class, 'index'])->name('asisten');
    Route::get('/create', [AsistenController::class, 'create'])->name('create-asisten');
    Route::post('/store', [AsistenController::class, 'store'])->name('store-asisten');
    Route::get('/{id}/edit', [AsistenController::class, 'edit'])->name('edit-asisten');
    Route::post('/{id}/update', [AsistenController::class, 'update'])->name('update-asisten');
    Route::post('/delete', [AsistenController::class, 'delete'])->name('delete-asisten');
});

Route::prefix('kelas')->middleware(['admin'])->group(function () {
    Route::get('/', [KelasController::class, 'index'])->name('kelas');
    Route::get('/create', [KelasController::class, 'create'])->name('create-kelas');
    Route::post('/store', [KelasController::class, 'store'])->name('store-kelas');
    Route::get('/{id}/edit', [KelasController::class, 'edit'])->name('edit-kelas');
    Route::post('/{id}/update', [KelasController::class, 'update'])->name('update-kelas');
    Route::post('/delete', [KelasController::class, 'delete'])->name('delete-kelas');
});

Route::prefix('materi')->middleware(['admin'])->group(function () {
    Route::get('/', [MateriController::class, 'index'])->name('materi');
    Route::get('/create', [MateriController::class, 'create'])->name('create-materi');
    Route::post('/store', [MateriController::class, 'store'])->name('store-materi');
    Route::get('/{id}/edit', [MateriController::class, 'edit'])->name('edit-materi');
    Route::post('/{id}/update', [MateriController::class, 'update'])->name('update-materi');
    Route::post('/delete', [MateriController::class, 'delete'])->name('delete-materi');
});

Route::prefix('code')->group(function () {
    Route::get('/', [CodeController::class, 'index'])->name('code');
    Route::get('/generate', [CodeController::class, 'getCode'])->name('generate-code');
});




