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

Route::get('/pickdate', [AdminController::class, 'pickdate']);
Route::get('/registration', [AdminController::class, 'registration']);
Route::get('/old', [AdminController::class, 'registration_existing']);
Route::get('/adddate', [AdminController::class, 'formadddate']);
Route::post('/adddate', [AdminController::class, 'adddate']);
Route::post('/submit', [AdminController::class, 'submit']);
Route::post('/submitexist', [AdminController::class, 'submitexist']);
Route::post('/update', [AdminController::class, 'update']);
Route::get('/list', [AdminController::class, 'list']);
Route::get('/listdate', [AdminController::class, 'listdate']);
Route::get('/choosestatus', [AdminController::class, 'choosestatus']);
Route::get('/edit/{Oid}', [AdminController::class, 'edit']);
Route::get('/editdate/{Oid}', [AdminController::class, 'editdate']);
Route::get('/delete/{Oid}',[AdminController::class, 'delete']);
Route::get('/deletedate/{Oid}',[AdminController::class, 'deletedate']);
