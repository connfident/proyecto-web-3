<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImagenesController;

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
Route::get('/', [HomeController::class,'hub'])->name('index.welcome');
Route::get('/search', [HomeController::class,'search']);
Route::get('/login', [HomeController::class,'login'])->name('auth.login');
Route::get('/registrar', [HomeController::class,'registrar'])->name('auth.registrar');
Route::post('/registrar', [HomeController::class,'store'])->name('auth.store');

Route::post('/cuenta/login',[CuentasController::class,'autenticar'])->name('artista.login');
Route::get('/cuenta/logout',[CuentasController::class,'logout'])->name('artista.logout');

Route::delete('/cuenta/{cuenta}',[CuentasController::class,'destroy'])->name('cuenta.destroy');

Route::get('/artista/{cuenta}', [ArtistasController::class,'index'])->name('artistas.index');
Route::get('/artista/{cuenta}/fotosban', [ArtistasController::class, 'indexban'])->name('artistas.indexban');


Route::delete('/artista/{imagen}', [ImagenesController::class,'destroy'])->name('artistas.destroy');
Route::put('/artista/{imagen}', [ImagenesController::class,'update'])->name('artistas.update');

Route::put('/artista/{imagen}/ban', [ImagenesController::class,'banear'])->name('artistas.banear');


Route::post('/artista/enviar', [ImagenesController::class,'storage'])->name('artistas.storage');

Route::get('/admin/{cuenta}', [AdminController::class,'index'])->name('admin.index');
Route::get('/admin/lista/artistas', [AdminController::class,'listarArtistas'])->name('admin.artistaslista');


