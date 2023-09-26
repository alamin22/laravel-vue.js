<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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
Route::post('/register2',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::post('/add-book',[AuthController::class,'addNewBook']);
Route::get('/getall',[AuthController::class,'getData']);
Route::post('/delete/{id}',[AuthController::class,'delete']);
Route::post('/edit/{id}',[AuthController::class,'edit']);
Route::post('/edit-store/{id}',[AuthController::class,'editStore']);
Route::post('/search',[AuthController::class,'search']);
