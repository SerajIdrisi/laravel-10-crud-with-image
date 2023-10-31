<?php

use App\Http\Controllers\StudentsController;
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

Route::get('/student', function () {
    return view('students');
});

Route::post('/studentdata', [StudentsController::class, 'create'])->name('firstpage');
Route::get('/storedata', [StudentsController::class, 'store'])->name('storedata');
Route::get('/images', [StudentsController::class,'imageupload'])->name('imagedata');
Route::get('/editdata/{id}', [StudentsController::class, 'edit'])->name('editdata');
Route::post('/updatedata/{id}', [StudentsController::class, 'update'])->name('updatedata');
Route::get('/delete/{id}', [StudentsController::class, 'delete'])->name('delete');

