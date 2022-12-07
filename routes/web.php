<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\Controller::class,'index'])->name('startApp');
Route::get('/accountView/{id}',[\App\Http\Controllers\Controller::class,'accountView'])->name('accountView');
Route::get('/sendMoney',[\App\Http\Controllers\Controller::class,'sendMoney'])->name('moneySender');
Route::get('/transformValue',[\App\Http\Controllers\Controller::class,'transformValue'])->name('transformValue');
Route::get('/listTransaction',[\App\Http\Controllers\Controller::class,'listTransaction'])->name('listTransaction');
Route::post('/sendMoneyApp',[\App\Http\Controllers\Controller::class,'moneySender'])->name('moneySenderApp');


