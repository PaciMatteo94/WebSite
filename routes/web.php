<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

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

Route::middleware('can:isPublicOrTech')->group(function () {
    Route::get('/', [PublicController::class, 'home'])->name('home');

    Route::get('/info', [PublicController::class, 'info'])->name('info');

    Route::get('/where', [PublicController::class, 'where'])->name('where');

    Route::get('/catalog', [PublicController::class, 'catalog'])->name('catalog');

    Route::get('/product/{id}/{name?}', [PublicController::class, 'show'])->name('product.show');
});

Route::middleware('can:isStaff')->group(function () {
    
    // Route::get('/staff/remove', [StaffController::class, 'remove'])->name('staff.remove');
    // Route::match(['get', 'post'], '/staff/change', [StaffController::class, 'change'])->name('staff.change');
    // Route::get('/staff/insert', [StaffController::class, 'insert'])->name('staff.insert');

    //rofacimento staff in modo più semplice
    Route::get('/staff', [StaffController::class, 'viewStaffHome'])->name('viewStaffHome');
    Route::get('/staff/catalog', [StaffController::class, 'viewStaffCatalog'])->name('viewStaffCatalog');
    
    //Route::get('/staff/malfunction', [StaffController::class, 'viewStaffMalfunction'])->name('viewStaffMalfunction');
    //Route::get('/staff/solution', [StaffController::class, 'viewStaffSolution'])->name('viewStaffSolution');
});


Route::middleware('can:isAdmin')->group(function () {
    Route::get('/admin', [AdminController::class, 'adminHome'])->name('adminHome');
    Route::get('/admin/product', [AdminController::class, 'viewAdminProduct'])->name('viewAdminProduct');
    // Route::get('/admin/staff', [AdminController::class, 'viewAdminStaff'])->name('viewAdminStaff');
    Route::get('/admin/tech', [AdminController::class, 'viewAdminTech'])->name('viewAdminTech');
    Route::get('/admin/staff', [AdminController::class, 'adminStaff'])->name('viewAdminStaff');
});

require __DIR__ . '/auth.php'; 
//require = parola chiave php -> specifica che il file deve essere caricato sennò si avrà errore
// _DIR_ = costante magica di php che restituisce il persorso della directory in cui si trova il file corrente 
// il . dopo _DIR_ è un punto di concatenazione per unire le stringhe