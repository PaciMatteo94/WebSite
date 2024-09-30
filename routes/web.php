<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

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

Route::get('/',[PublicController::class, 'showHome'])->name('Home');

Route::get('/info', [PublicController::class, 'showInfo'])->name('Info');

Route::get('/posizione', [PublicController::class, 'showPosition'])->name('Posizione');