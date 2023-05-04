<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/send', [NotificationController::class, 'selectTypeNotification']);
Route::post('/changing_settings', [UserSettingsController::class, 'changeDateOfBirth']);

