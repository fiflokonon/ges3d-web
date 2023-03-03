<?php

use App\Http\Controllers\API\Auth;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ListeAlertController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[AuthController::class,'login']);
Route::get('/alerts', [ListeAlertController::class,'liste']);
Route::get('/admin_satatut/{id}', [ListeAlertController::class,'valider']);
Route::get('/admin_attribuer', [ListeAlertController::class,'attribuer']);
Route::get('/argent_statut/{id}', [ListeAlertController::class,'change_statut']);
