<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/info', [PublicController::class, 'info'])->name('info');

Route::get('/where', [PublicController::class, 'where'])->name('where');

//Route::get('/login', [PublicController::class, 'login'])->name('login');

Route::get('/catalog', [PublicController::class, 'catalog'])->name('catalog');

Route::get('/product/{id}/{name?}', [PublicController::class, 'show'])->name('product.show');

require __DIR__.'/auth.php'; 
//require = parola chiave php -> specifica che il file deve essere caricato sennò si avrà errore
// _DIR_ = costante magica di php che restituisce il persorso della directory in cui si trova il file corrente 
// il . dopo _DIR_ è un punto di concatenazione per unire le stringhe