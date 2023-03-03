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

// Authenticate
Route::post('/login',[AuthController::class,'login']);



Route::get('/alerts-agent-standby/{id}', [ListeAlertController::class,'alertsAgentStandBy']);
Route::get('/alerts-agent-accepted/{id}', [ListeAlertController::class,'alertsAgentAccepted']);
Route::get('/alerts-agent-close/{id}', [ListeAlertController::class,'alertsAgentClose']);
Route::get('/alerts/{id}/poids/{poids}', [ListeAlertController::class,'closeAlerts']);
Route::get('/agents/{agent_id}/alerts/{alert_id}', [ListeAlertController::class,'change_statut']);
