<?php

use App\Http\Controllers\AssistanceCenterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MalfunctionController;
use App\Http\Controllers\SolutionController;
use App\Models\Malfunction;
use App\Models\Solution;
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




