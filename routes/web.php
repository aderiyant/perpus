<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthController;
use App\Http\Middleware\CekLevel;
use App\Http\Controllers\BukuControllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\RentLogsController;
use App\Http\Controllers\LoanController;

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
    return view('login.login');
})->name('login');

Route::get('/layouts', function () {
    return view('layouts.dasboard');
})->middleware('auth');

Route  ::group(['middleware' => ['auth' ,'CekLevel:admin']], function (){

    
    Route::get('/siswa', [UserController::class, 'index'])->name('siswa');
    Route::get('/pengembalian', [BookRentController::class, 'pengembalian']);
    
    

});

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route  ::group(['middleware' => ['auth']], function (){

    Route::get('/buku', [BukuController::class, 'index'])->name('buku');
    Route::get('/tambah_siswa', [UserController::class, 'tambah_siswa'])->name('tambah_siswa');
    Route::post('/insert_siswa', [UserController::class, 'insert_siswa'])->name('insert_siswa');
    Route::get('/tampilkan_siswa/{id}', [UserController::class, 'tampilkan_siswa'])->name('tampilkan_siswa');
    Route::post('/update_siswa/{id}', [UserController::class, 'update_siswa'])->name('update_siswa');
    Route::get('/delete_siswa/{id}', [UserController::class, 'delete_siswa'])->name('delete_siswa');
    //form tambah buku
    Route::get('/tambah_buku', [BukuController::class, 'tambah_buku'])->name('tambah_buku');
    Route::post('/insert_buku', [BukuController::class, 'insert_buku'])->name('insert_buku');

    Route::get('/tampilkan_buku/{id}', [BukuController::class, 'tampilkan_buku'])->name('tampilkan_buku');
    Route::post('/update_buku/{id}', [BukuController::class, 'update_buku'])->name('update_buku');

    Route::get('/delete_buku/{id}', [BukuController::class, 'delete_buku'])->name('delete_buku');

    Route::get('/book-rent', [BookRentController::class, 'index']);
    Route::post('/book-rent', [BookRentController::class, 'store']);

    Route::get('/rent-logs', [RentLogsController::class, 'index']);

    Route::post('/pengembalian', [BookRentController::class, 'simpanpengembalian']);
    Route::get('/delete/{id}', [RentLogsController::class, 'delete'])->name('delete');
});
