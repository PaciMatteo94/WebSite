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

Route::get('/',[PublicController::class, 'home'])->name('Home');

Route::get('/info', [PublicController::class, 'info'])->name('Info');

Route::get('/where', [PublicController::class, 'where'])->name('Where');

Route::get('/login', [PublicController::class, 'login'])->name('Login');

Route::get('/catalog', [PublicController::class, 'catalog'])->name('Catalog');