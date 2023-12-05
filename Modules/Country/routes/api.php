<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Country\app\Http\Controllers\CountryController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    // Route::get('country', fn (Request $request) => $request->user())->name('country');
Route::get('country',[CountryController::class,'index'])->name('country.index');
});
