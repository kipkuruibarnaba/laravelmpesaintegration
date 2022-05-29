<?php

use App\Http\Controllers\payments\mpesa\MpesaResponsesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/validation', [MpesaResponsesController::class, 'validation']);
Route::post('/confirmation', [MpesaResponsesController::class, 'confirmation']);
Route::post('/stkpush', [MpesaResponsesController::class, 'stkpusk']);

Route::post('/api/queueTimeOutURL', [MpesaResponsesController::class, 'queueTimeOutURL']);
Route::post('/resultUrl', [MpesaResponsesController::class, 'resultUrl']);
