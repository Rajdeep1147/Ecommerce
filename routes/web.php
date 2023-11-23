<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact',function(){
    return view('contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', 'App\Http\Controllers\PostController@index');

Route::get('posts/create','App\Http\Controllers\PostController@create')->middleware('role:writer|admin'); 

Route::get('posts/edit','App\Http\Controllers\PostController@edit')->middleware('permission:edit post'); 

Route::get('/test-info', function(){
    $user = [
        'name' => 'test1',
        'email' => 'test1@lawsikho.in',
        'password' => bcrypt(123456),
        'status' => App\Enum\UserStatusEnum::DEACTIVE,
    ];
    User::create($user);


});

Route::get('student/create',[StudentController::class,'create'])->name('student.create');
Route::post('student/store',[StudentController::class,'store'])->name('student.store');

Route::get('student/show',[StudentController::class,'index'])->name('student.show');

Route::get('student/edit/{id}',[StudentController::class,'edit'])->name('student.edit');

Route::put('student/update/{id}',[StudentController::class,'update'])->name('student.update');

Route::delete('student/delete/{id}',[StudentController::class,'destroy'])->name('student.delete');

Route::get('/download', [StudentController::class,'download'])->name('student.download');


