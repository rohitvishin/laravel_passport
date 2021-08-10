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

Route::get('/', [AdminController::class,'index']);
Route::post('/', [AdminController::class,'index']);
Route::get('/login', [AdminController::class,'login']);
Route::post('/adminLogin', [AdminController::class,'adminLogin']);
Route::get('/dashboard',[AdminController::class,'dashboard']);

Route::get('/settings',[AdminController::class,'getGeneralSettings']);

//start Agent Route
Route::get('/AgentRegister',[AdminController::class,'AgentRegister']);
Route::post('saveAgent',[AdminController::class,'saveAgent']);
Route::get('/AgentList',[AdminController::class,'AgentList']);
Route::get('EditAgent/{id}',[AdminController::class,'EditAgent']);
Route::post('EditAgent/updateAgent/{id}',[AdminController::class,'updateAgent']);
Route::get('DeleteAgent/{id}',[AdminController::class,'DeleteAgent']);
//End Agent Route
