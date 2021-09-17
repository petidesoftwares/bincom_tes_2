<?php

use App\Http\Controllers\v1\AgentController;
use App\Http\Controllers\v1\AnnouncedLgaResultController;
use App\Http\Controllers\v1\AnnouncedPollingUnitResultController;
use App\Http\Controllers\v1\LgaController;
use App\Http\Controllers\v1\PartyController;
use App\Http\Controllers\v1\PollingUnitController;
use App\Http\Controllers\v1\StateController;
use App\Http\Controllers\v1\WardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/agent',[AgentController::class,'index']);
Route::get('/states',[StateController::class,'index']);
Route::get('/lgas',[LgaController::class,'index']);
Route::get('/parties',[PartyController::class,'index']);
Route::get('/lgas/{id}',[LgaController::class,'getLgasByStateID']);
Route::get('/lga/wards/{id}',[WardController::class,'lgaWards']);
Route::get('/wards/pulling-units/{id}',[PollingUnitController::class,'wardUnits']);
Route::get('/unit/result/{id}',[AnnouncedPollingUnitResultController::class,'pullingUnitResult']);
Route::get('/lga/result/sum/{id}', [AnnouncedLgaResultController::class,'sumLgaResult']);
Route::get('/lga/result/sum-total/{id}', [AnnouncedLgaResultController::class,'sumTotalLgaResult']);
Route::post('/upload-result', [AnnouncedPollingUnitResultController::class,'store']);


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
