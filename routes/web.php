<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\HomeController;

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
Route::get('/login', [HomeController::class,'login'])->name('auth.login');
Route::get('/registrar', [HomeController::class,'registrar'])->name('auth.registrar');

Route::post('/login', [HomeController::class,'login'])->name('auth.login');
Route::post('/registrar', [HomeController::class,'store'])->name('auth.store');

Route::get('/artista/{cuenta}', [ArtistasController::class,'index'])->name('artistas.index');

// Route::get('/artista/{cuenta}', [ArtistasController::class, 'index'])->name('artistas.show');


