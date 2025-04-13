<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
})->name('home');


Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);

//praktikum 2.6
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route::get('/', [WelcomeController::class, 'index']);
//Jobsheet 7 prak 1
Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store_user'])->name('store_user');

Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu
    Route::get('/', [WelcomeController::class, 'index']);
});

Route::middleware(['authorize:ADMIN, MNG, STF'])->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);         // menampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']);    // menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']);        // menyimpan data user baru
        //route ajax
        Route::get('/create_ajax', [UserController::class, 'create_ajax']);  // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']);        // Menyimpan data user baru ajax
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);        // Menampilkan halaman form edit user Ajax
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);    // Menyimpan perubahan data user Ajax
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax

        Route::get('/{id}', [UserController::class, 'show']);        // menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']);    // menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']);      // menyimpan perubahan data user
        Route::delete('/{id}', [UserController::class, 'destroy']);  // menghapus data user
        Route::post('/data', [UserController::class, 'getUsers'])->name('user.data');
    });
});

Route::middleware(['authorize:ADMIN, MNG'])->group(function () {
    Route::group(['prefix' => 'level'], function () {
        Route::get('/',[LevelController::class, 'index']);
        Route::post('/list',[LevelController::class, 'list']);
        Route::get('/create',[LevelController::class, 'create']);
        Route::post('/',[LevelController::class, 'store']);

        //route ajax
        Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
        Route::post('/ajax', [LevelController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);

        Route::get('/{id}',[LevelController::class, 'show']);
        Route::get('/{id}/edit',[LevelController::class, 'edit']);
        Route::put('/{id}',[LevelController::class, 'update']);
        Route::delete('/{id}',[LevelController::class, 'destroy']);
    });
});

Route::middleware(['authorize:ADMIN, MNG'])->group(function () {
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/',[KategoriController::class, 'index']);
        Route::post('/list',[KategoriController::class, 'list']);
        Route::get('/create',[KategoriController::class, 'create']);
        Route::post('/',[KategoriController::class, 'store']);

        //route ajax
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);

        Route::get('/{id}',[KategoriController::class, 'show']);
        Route::get('/{id}/edit',[KategoriController::class, 'edit']);
        Route::put('/{id}',[KategoriController::class, 'update']);
        Route::delete('/{id}',[KategoriController::class, 'destroy']);
    });
});

Route::middleware(['authorize:ADMIN, MNG'])->group(function () {
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/',[SupplierController::class, 'index']);
        Route::post('/list',[SupplierController::class, 'list']);
        Route::get('/create',[SupplierController::class, 'create']);
        Route::post('/',[SupplierController::class, 'store']);

        //route ajax
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);

        Route::get('/{id}',[SupplierController::class, 'show']);
        Route::get('/{id}/edit',[SupplierController::class, 'edit']);
        Route::put('/{id}',[SupplierController::class, 'update']);
        Route::delete('/{id}',[SupplierController::class, 'destroy']);
    });
});


    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () { //hanya level admin,manager,staff yang dapat mengakses menu barang
        Route::get('/barang', [BarangController::class, 'index']);              // Menampilkan halaman awal barang
        Route::post('/barang/list', [BarangController::class, 'list']);          // Menampilkan data barang dalam bentuk json untuk datatables
        Route::get('/barang/create', [BarangController::class, 'create']);       // Menampilkan halaman form tambah barang
        Route::post('/barang', [BarangController::class, 'store']);             // Menyimpan data barang baru
        Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']);    // Menampilkan halaman form tambah barang Ajax
        Route::post('/barang/ajax', [BarangController::class, 'store_ajax']);          // Menyimpan data barang baru Ajax
        Route::get('/barang/{id}', [BarangController::class, 'show']);           // Menampilkan detail barang
        Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);      // Menampilkan halaman form edit barang
        Route::put('/barang/{id}', [BarangController::class, 'update']);         // Menyimpan perubahan data barang
        Route::get('/barang/{id}/show_ajax', [BarangController::class, 'show_ajax']);     // Menampilkan halaman form barang Ajax
        Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);     // Menampilkan halaman form edit barang Ajax
        Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']);  // Menyimpan perubahan data barang Ajax
        Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete barang Ajax
        Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus data barang Ajax
        Route::delete('/barang/{id}', [BarangController::class, 'destroy']);     // Menghapus data barang
        Route::get('/barang/import', [BarangController::class, 'import']); // ajax form upload excel
        Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
        Route::get('/barang/export_excel',[BarangController::class, 'export_excel']); //export excel
    });