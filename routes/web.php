<?php

use App\Http\Controllers\fastprintController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[fastprintController::class, 'index'])->name('home');
Route::get('/tambah',[fastprintController::class, 'index_tambah'])->name('home-tambah');
Route::post('/',[fastprintController::class, 'store'])->name('tambah');
Route::put('/',[fastprintController::class, 'edit'])->name('edit');
Route::delete('/',[fastprintController::class,'destroy'])->name('hapus');