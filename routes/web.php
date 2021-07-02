<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\BarangsController;
use App\Http\Controllers\LelangsController;
use App\Http\Controllers\PelelangsController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// untuk multi user
// Route::get('administrator', [App\Http\Controllers\AdministratorController::class, 'administrator'])->middleware('checkRole:administrator');
// Route::get('petugas', [App\Http\Controllers\PetugasController::class, 'petugas'])->middleware(['checkRole:petugas,administrator']);
// Route::get('masyarakat', [App\Http\Controllers\MasyarakatController::class, 'index'])->middleware(['checkRole:masyarakat,administrator']);
// Route::get('masyarakat', [App\Http\Controllers\MasyarakatController::class, 'masyarakat']);
// untuk akhir multi user

// untuk administrator
// untuk user
Route::get('administrator/administrator', [App\Http\Controllers\AdministratorController::class, 'administrator'])->middleware('checkRole:administrator');
Route::get('administrator',[App\Http\Controllers\AdministratorController::class, 'index'])->middleware('checkRole:administrator');
Route::get('administrator.create',[App\Http\Controllers\AdministratorController::class, 'create'])->middleware('checkRole:administrator');
Route::post('administrator/store',[App\Http\Controllers\AdministratorController::class, 'store'])->middleware('checkRole:administrator');
Route::get('administrator/edit/{user}',[App\Http\Controllers\AdministratorController::class, 'edit'])->middleware('checkRole:administrator');
Route::put('administrator/update/{id}',[App\Http\Controllers\AdministratorController::class, 'update'])->middleware('checkRole:administrator');
Route::delete('administrator/delete/{id}',[App\Http\Controllers\AdministratorController::class, 'delete'])->middleware('checkRole:administrator');
// end user
// for barang
Route::get('barangs',[App\Http\Controllers\BarangsController::class, 'index'])->middleware('checkRole:administrator');
Route::get('barangs.create',[App\Http\Controllers\BarangsController::class, 'create'])->middleware('checkRole:administrator');
Route::post('barangs/store',[App\Http\Controllers\BarangsController::class, 'store'])->middleware('checkRole:administrator');
Route::get('/barangs/{barangs}', [App\Http\Controllers\BarangsController::class, 'show'])->middleware('checkRole:administrator');
Route::get('barangs/edit/{barangs}',[App\Http\Controllers\BarangsController::class, 'edit'])->middleware('checkRole:administrator');
Route::put('barangs/update/{id}',[App\Http\Controllers\BarangsController::class, 'update'])->middleware('checkRole:administrator');
Route::delete('barangs/destroy/{id}',[App\Http\Controllers\BarangsController::class, 'destroy'])->middleware('checkRole:administrator');
// end barang
// end administrator

// untuk petugas
Route::get('petugas', [App\Http\Controllers\PetugasController::class, 'petugas'])->middleware(['checkRole:petugas,administrator']);
// untuk lelang
Route::get('lelang',[App\Http\Controllers\LelangsController::class, 'index'])->middleware(['checkRole:petugas,administrator']);
Route::get('lelang.create',[App\Http\Controllers\LelangsController::class, 'create'])->middleware(['checkRole:petugas,administrator']);
Route::post('lelang/store',[App\Http\Controllers\LelangsController::class, 'store'])->middleware(['checkRole:petugas,administrator']);
Route::get('lelang/{lelang}',[App\Http\Controllers\LelangsController::class, 'show']);
Route::get('lelang/edit/{id}',[App\Http\Controllers\LelangsController::class, 'edit'])->middleware(['checkRole:petugas,administrator']);
Route::patch('lelang/update/{id}',[App\Http\Controllers\LelangsController::class, 'update'])->middleware(['checkRole:petugas,administrator']);
Route::delete('lelang/destroy/{id}',[App\Http\Controllers\LelangsController::class, 'destroy'])->middleware(['checkRole:petugas,administrator']);
// end lelang
// end petugas

// untuk masyarakat
// untuk middleware : Route::get('masyarakat', [App\Http\Controllers\MasyarakatController::class, 'index'])->middleware(['checkRole:masyarakat,administrator']);
Route::get('masyarakat', [App\Http\Controllers\MasyarakatController::class, 'masyarakat']);
// untuk pelelang
Route::get('pelelang', [App\Http\Controllers\PelelangsController::class, 'index']);
Route::get('pelelang.pelelang', [App\Http\Controllers\PelelangsController::class, 'pelelang'])->middleware(['checkRole:petugas,administrator']);
Route::get('pelelang/search', [App\Http\Controllers\PelelangsController::class, 'search'])->middleware(['checkRole:petugas,administrator']);
Route::post('pelelang/store', [App\Http\Controllers\PelelangsController::class, 'store']);
Route::delete('pelelang/destroy/{id}', [App\Http\Controllers\PelelangsController::class, 'destroy'])->middleware(['checkRole:petugas,administrator']);
// end pelelang
// end masyarakat
