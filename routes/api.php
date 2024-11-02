<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssistanceCenterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MalfunctionController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Malfunction;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/assistance_center', [AssistanceCenterController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/getInfo', [ProductController::class, 'getInfo']);

Route::get('/getInfoProduct/{id}', [ProductController::class, 'getMalfuntionsAndSolutions']);

Route::delete('/malfunctions/delete/{id}', [MalfunctionController::class, 'destroy']);

Route::delete('/solutions/delete/{id}', [SolutionController::class, 'destroy']);

Route::put('/malfunctions/update/{id}', [MalfunctionController::class, 'update']);

Route::put('/solutions/update/{id}', [SolutionController::class, 'update']);

Route::get('/malfunctions/index/{id}', [MalfunctionController::class, 'index']);

Route::get('/solutions/index/{id}', [SolutionController::class, 'index']);

Route::post('/malfunctions/insert/{id}', [MalfunctionController::class, 'store']);

Route::post('/solutions/insert/{id}', [SolutionController::class, 'store']);

//ROTTE STAFF
Route::get('/staff/info', [ProductController::class, 'index']);
//view malfunction
Route::get('/staff/product/{id}/malfunction', [StaffController::class, 'listMalfuntions']);
Route::get('/staff/malfunction/insertView', [StaffController::class, 'viewInsertMalfunction']);
Route::get('/staff/malfunction/{id}', [StaffController::class, 'viewMalfunction']);
Route::get('/staff/malfunction/{id}/change', [StaffController::class, 'changeMalfunction']);
//view solution

Route::get('/staff/malfunction/{id}/solution', [StaffController::class, 'listSolutions']);
Route::get('/staff/solution/insertView', [StaffController::class, 'viewInsertSolution']);
Route::get('/staff/solution/{id}', [StaffController::class, 'viewSolution']);
Route::get('/staff/solution/{id}/change', [StaffController::class, 'changeSolution']);


//operazioni malfunction
Route::delete('/staff/malfunction/{id}/delete', [MalfunctionController::class, 'destroy']);
Route::post('/staff/malfunction/{id}/change', [MalfunctionController::class, 'update']);
Route::post('/staff/product/{id}/malfunction/store', [MalfunctionController::class, 'store']);

//operazioni solution
Route::post('/staff/solution/{id}/change', [SolutionController::class, 'update']);
Route::post('/staff/malfunction/{id}/solution/store', [SolutionController::class, 'store']);
Route::delete('/staff/solution/{id}/delete', [SolutionController::class, 'destroy']);


//ROTTE ADMIN STAFF
Route::get('/admin/staff', [AdminController::class, 'listStaff']);
Route::get('/admin/staff/insertView', [AdminController::class, 'insertView']);
Route::get('/admin/staff/show/{id}', [AdminController::class, 'show']);
Route::get('/admin/staff/change/{id}', [AdminController::class, 'change']);
Route::delete('/admin/staff/remove/{id}', [UserController::class, 'destroy']);





// Route::get('/admin/staff/insert', [AdminController::class, 'insertStaff']);
// Route::get('/admin/staff/change', [AdminController::class, 'changeStaff']);
// Route::get('/admin/staff/remove', [AdminController::class, 'removeStaff']);
// Route::put('/admin/staff/change/{id}', [AdminController::class, 'update']);
// Route::post('/admin/staff/insertOp', [AdminController::class, 'store']);
// Route::delete('/admin/staff/deleteOp/{id}', [AdminController::class, 'destroy']);

//ROTTE ADMIN TECNICI
Route::get('/admin/tech/insert', [AdminController::class, 'insertTech']);
Route::get('/admin/tech/change', [AdminController::class, 'changeTech']);
Route::get('/admin/tech/remove', [AdminController::class, 'removeTech']);
Route::put('/admin/tech/change/{id}', [AdminController::class, 'update']);
Route::post('/admin/tech/insertOp', [AdminController::class, 'store']);
Route::delete('/admin/tech/deleteOp/{id}', [AdminController::class, 'destroy']);

//ROTTE ADMIN PRODOTTI
Route::get('/admin/category', [AdminController::class, 'listCategory']);
Route::get('/admin/category/{id}/product', [AdminController::class, 'listProduct']);
Route::get('/admin/category/insertView', [AdminController::class, 'viewInsertCategory']);
Route::get('/admin/product/insertView', [AdminController::class, 'viewInsertProduct']);
Route::get('/admin/category/{id}/info', [AdminController::class, 'viewCategory']);
Route::get('/admin/product/{id}/info', [AdminController::class, 'viewProduct']);
Route::get('/admin/category/{id}/change', [AdminController::class, 'changeViewCategory']);
Route::get('/admin/product/{id}/change', [AdminController::class, 'changeViewProduct']);


Route::delete('/admin/category/{id}/remove', [CategoryController::class, 'destroy']);
Route::delete('/admin/product/{id}/remove', [ProductController::class, 'destroy']);
Route::post('/admin/category/add', [CategoryController::class, 'store']);
Route::post('/admin/category/{id}/product/add', [ProductController::class, 'store']);
Route::post('/admin/category/{id}/change', [CategoryController::class, 'update']);
Route::post('/admin/product/{id}/change', [ProductController::class, 'update']);











Route::get('/admin/product/insert', [AdminController::class, 'insertProduct']);
Route::get('/admin/product/change', [AdminController::class, 'changeProduct']);
Route::get('/admin/product/change/product/{id}', [AdminController::class, 'viewChangeProduct']);
Route::put('/admin/product/change2/product/{id}', [AdminController::class, 'operationChangeProduct']);
Route::delete('/admin/product/deleteOp/{id}', [AdminController::class, 'productDestroy']);
Route::post('/admin/product/insertOp', [AdminController::class, 'storeProduct']);