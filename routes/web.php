<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stu;
use App\Http\Controllers\StudentC;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\checklogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['checklogin'])->group(function () {
    Route::group(['prefix'=>'students','as'=>'student.'], function () {
        Route::get('',[StudentC::class,'index'])->name('index');
        Route::post('/store',[StudentC::class,'store'])->name('store');
        Route::get('/edit',[StudentC::class,'edit'])->name('edit');
        Route::patch('/update',[StudentC::class,'update'])->name('update');
        Route::delete('/delete',[StudentC::class,'delete'])->name('delete');
    });
});
Route::controller(UserController::class)->group(function(){
    Route::get('/register','create')->name('register');
    Route::post('/registerStore','store')->name('user.store');
});




