<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register',[AgentController::class,'register']);

Route::post('/login',[AgentController::class,'login']);
Route::get('/login',[AgentController::class,'login'])->name('login');

//Route::get('/index',[AgentController::class,'index']);
Route::middleware('auth:api')->post('/index',[AgentController::class,'index']);

