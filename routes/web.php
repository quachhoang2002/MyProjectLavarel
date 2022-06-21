<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stu;
use App\Http\Controllers\StudentC;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
Route::group(['prefix'=>'students','as'=>'student.'], function () {
    Route::get('',[StudentC::class,'index'])->name('index');
    Route::post('/store',[StudentC::class,'store'])->name('store');
    Route::get('/edit',[StudentC::class,'edit'])->name('edit');
    Route::patch('/update',[StudentC::class,'update'])->name('update');
    Route::delete('/delete',[StudentC::class,'delete'])->name('delete');
});






