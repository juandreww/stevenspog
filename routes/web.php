<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/registration', [AdminController::class, 'registration']);
Route::post('/submit', [AdminController::class, 'submit']);
Route::post('/update/{Oid}', [AdminController::class, 'update']);
Route::get('/list', [AdminController::class, 'list']);
Route::get('/edit/{Oid}', [AdminController::class, 'edit']);
Route::get('/delete/{Oid}',[AdminController::class, 'delete']);
