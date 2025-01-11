<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\TentangController;

Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

Route::get('/', function () {
    return redirect()->route('tentang');
});

Route::get('/superadmin/users', [UsersController::class, 'index'])->name('superadmin.users.index');
Route::get('/superadmin/users/create', [UsersController::class, 'create'])->name('superadmin.users.create');
Route::post('/superadmin/users', [UsersController::class, 'store'])->name('superadmin.users.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::get('login', 'AuthController@showLoginForm')->name('login');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::get('register', 'AuthController@showRegistrationForm')->name('register');
Route::post('register', 'AuthController@register');

// Rute untuk dashboard
Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

// Rute untuk surat (menampilkan semua, tambah, edit, hapus surat)
Route::resource('surat', 'SuratController')->middleware('auth');

// Rute untuk pencarian surat
Route::get('surat/search', 'SuratController@search')->name('surat.search');

// Add these routes within the superadmin user management routes (inside the auth middleware group)
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin/users', [UsersController::class, 'index'])->name('superadmin.users.index');
    Route::get('/superadmin/users/create', [UsersController::class, 'create'])->name('superadmin.users.create');
    Route::post('/superadmin/users', [UsersController::class, 'store'])->name('superadmin.users.store');
    Route::get('/superadmin/users/{user}/edit', [UsersController::class, 'edit'])->name('superadmin.users.edit');
    Route::put('/superadmin/users/{user}', [UsersController::class, 'update'])->name('superadmin.users.update');
    Route::delete('/superadmin/users/{user}', [UsersController::class, 'destroy'])->name('superadmin.users.destroy');
});

Route::get('/surat/export_excel/{action}', [SuratController::class, 'export_excel'])->name('surat.export_excel');
Route::get('/surat/export_pdf/{action}', [SuratController::class, 'export_pdf'])->name('surat.export_pdf');

Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');

Route::middleware(['auth'])->group(function () {
    Route::get('suratmasuk', [SuratMasukController::class, 'index'])->name('suratmasuk.index');
    Route::get('suratkeluar', [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
    // Tambahkan rute lainnya jika diperlukan
});

Route::get('/suratmasuk', [SuratMasukController::class, 'index'])->name('suratmasuk.index');
Route::get('/suratmasuk/create', [SuratMasukController::class, 'create'])->name('suratmasuk.create');
Route::get('/suratmasuk', [SuratMasukController::class, 'index'])->name('suratmasuk.index');
Route::get('/suratmasuk/create', [SuratMasukController::class, 'create'])->name('suratmasuk.create');
Route::post('/suratmasuk', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
Route::get('/suratmasuk/{id}/edit', [SuratMasukController::class, 'edit'])->name('suratmasuk.edit');
Route::put('/suratmasuk/{id}', [SuratMasukController::class, 'update'])->name('suratmasuk.update');
Route::delete('/suratmasuk/{id}', [SuratMasukController::class, 'destroy'])->name('suratmasuk.destroy');
Route::get('/suratmasuk/export-pdf/{action}', [SuratMasukController::class, 'export_pdf'])->name('suratmasuk.export_surat_masuk_pdf');
Route::get('/suratmasuk/export_excel/{action}', [SuratMasukController::class, 'export_excel'])->name('suratmasuk.export_masuk_excel');
Route::get('suratmasuk/import', [SuratMasukController::class, 'importForm'])->name('suratmasuk.importForm');
Route::post('suratmasuk/import', [SuratMasukController::class, 'import'])->name('suratmasuk.import');

Route::get('/suratkeluar', [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
Route::get('/suratkeluar/create', [SuratKeluarController::class, 'create'])->name('suratkeluar.create');
Route::get('/suratkeluar', [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
Route::get('/suratkeluar/create', [SuratKeluarController::class, 'create'])->name('suratkeluar.create');
Route::post('/suratkeluar', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');
Route::get('/suratkeluar/{id}/edit', [SuratKeluarController::class, 'edit'])->name('suratkeluar.edit');
Route::put('/suratkeluar/{id}', [SuratKeluarController::class, 'update'])->name('suratkeluar.update');
Route::delete('/suratkeluar/{id}', [SuratKeluarController::class, 'destroy'])->name('suratkeluar.destroy');
Route::get('/suratkeluar/export-pdf/{action}', [SuratKeluarController::class, 'export_pdf'])->name('suratkeluar.export_surat_keluar_pdf');
Route::get('/suratkeluar/export_excel/{action}', [SuratKeluarController::class, 'export_excel'])->name('suratkeluar.export_keluar_excel');
Route::get('suratkeluar/import', [SuratKeluarController::class, 'importForm'])->name('suratkeluar.importForm');
Route::post('suratkeluar/import', [SuratKeluarController::class, 'import'])->name('suratkeluar.import');
