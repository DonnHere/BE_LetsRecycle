<?php
use App\Http\Controllers\pelaporancontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // panggil controllernya
use App\Http\Controllers\super_admin; // panggil controllernya
use App\Http\Controllers\AuthController; // panggil controllernya
use App\Http\Controllers\DataSampahController;

Route::get('/', function () {
return view('welcome');
});

// bagian auth
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
Route::get('/api/usersadmin', [AuthController::class, 'index'])->name('users.index');
Route::put('/api/auth/users/update/{id}', [AuthController::class, 'update'])->middleware('auth:sanctum')->name('update');
Route::delete('/api/auth/users/delete/{id}', [AuthController::class, 'deleteUser'])->middleware('auth:sanctum')->name('delete');

//bagian laporan
Route::post('/api/laporan/create', [pelaporancontroller::class, 'create'])->name('laporan.create');
Route::get('/api/laporan', [pelaporancontroller::class, 'index'])->name('laporan.index');
Route::get('/api/laporan/{id}', [pelaporancontroller::class, 'show'])->name('laporan.show');
Route::put('/api/laporan/update/{id}', [pelaporancontroller::class, 'update'])->name('laporan.update');
Route::delete('/api/laporan/delete/{id}', [pelaporancontroller::class, 'delete'])->name('laporan.destroy');

// bagian data sampah
Route::get('/api/data-sampah', [DataSampahController::class, 'index'])->name('index');

// bagian data admin
Route::post('/api/admin', [AdminController::class, 'login']);
Route::post('/api/admin/create', [AdminController::class, 'store']);
Route::get('/api/data/admin', [AdminController::class, 'index']);
Route::get('/api/admin/{id}', [AdminController::class, 'show']);
Route::put('/api/admin/update/{id}', [AdminController::class, 'update']);
Route::delete('/api/admin/delete/{id}', [AdminController::class, 'destroy']);

// bagian data superadmin
Route::post('/api/superadmin', [super_admin::class, 'login']);
Route::post('/api/superadmin/create', [super_admin::class, 'store']);
Route::get('/api/data/superadmin', [super_admin::class, 'index']);
Route::get('/api/superadmin/{id}', [super_admin::class, 'show']);
Route::put('/api/superadmin/update/{id}', [super_admin::class, 'update']);
Route::delete('/api/superadmin/delete/{id}', [super_admin::class, 'destroy']);
