<?php

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

Route::get('/laravel1', [\App\Http\Controllers\Login\IndexController::class,'login']);

Route::get('/laravel1/register', [\App\Http\Controllers\Login\IndexController::class,'register']);

