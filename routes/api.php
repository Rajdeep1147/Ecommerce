<?php

use App\Http\Controllers\ApiAdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     $user = $request->user();
//     return response()->json(['user' => $user]);
// });
Route::post('admin-login',[ApiAdminController::class,'login']);


Route::post('user-login',[UserController::class,'login']);


Route::middleware(['auth:sanctum'])->group(function () {
     Route::get('user-details',[UserController::class,'userDetails'])->middleware('auth:sanctum','abilities:user');
});

Route::middleware(['auth:sanctum'])->group(function () {
     Route::get('admin-details',[ApiAdminController::class,'adminDetails'])->middleware('auth:sanctum','abilities:admin');
});

Route::post('hello',[CustomerController::class,'login']);

Route::get('todo-list',[TodoListController::class,'index'])->name('todo-list.store');