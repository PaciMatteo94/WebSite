<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssistanceCenterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MalfunctionController;
use App\Http\Controllers\SolutionController;
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
//ROTTE ADMIN STAFF
Route::get('/admin/staff/insert', [AdminController::class, 'insertStaff']);
Route::get('/admin/staff/change', [AdminController::class, 'changeStaff']);
Route::get('/admin/staff/remove', [AdminController::class, 'removeStaff']);
Route::put('/admin/staff/change/{id}', [AdminController::class, 'update']);
Route::post('/admin/staff/insertOp', [AdminController::class, 'store']);
Route::delete('/admin/staff/deleteOp/{id}', [AdminController::class, 'destroy']);

//ROTTE ADMIN TECNICI
Route::get('/admin/tech/insert', [AdminController::class, 'insertTech']);
Route::get('/admin/tech/change', [AdminController::class, 'changeTech']);
Route::get('/admin/tech/remove', [AdminController::class, 'removeTech']);
Route::put('/admin/tech/change/{id}', [AdminController::class, 'update']);
Route::post('/admin/tech/insertOp', [AdminController::class, 'store']);
Route::delete('/admin/tech/deleteOp/{id}', [AdminController::class, 'destroy']);

//ROTTE ADMIN PRODOTTI
Route::get('/admin/product/insert', [AdminController::class, 'insertProduct']);
Route::get('/admin/product/change', [AdminController::class, 'changeProduct']);
Route::get('/admin/product/change/product/{id}', [AdminController::class, 'viewChangeProduct']);
Route::put('/admin/product/change2/product/{id}', [AdminController::class, 'operationChangeProduct']);
Route::delete('/admin/product/deleteOp/{id}', [AdminController::class, 'productDestroy']);
Route::post('/admin/product/insertOp', [AdminController::class, 'storeProduct']);