<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FieldController;

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

Route::as('api.v1.')->prefix('v1')->group(function () {
    Route::get('fields', [FieldController::class, 'index']);
    Route::get('fields/{id}', [FieldController::class, 'show']);
    Route::post('fields', [FieldController::class, 'store']);
    Route::put('fields/{id}', [FieldController::class, 'update']);
    Route::delete('fields/{id}', [FieldController::class, 'destroy']);
});

// remember to run php artisan optimize when updating these routes
