<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
// use App\helpers.php;
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


Route::get('/helper', function () {
    return test();
});



Route::post('/register',[AgentController::class,'register']);

Route::post('/login',[AgentController::class,'login']);
Route::get('/login',[AgentController::class,'login'])->name('login');

Route::get('/index',[AgentController::class,'index']);


Route::get('/test', function () {
   return 'test';
});


