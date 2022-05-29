<?php

use App\Http\Controllers\payments\mpesa\MpesaController;
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

Route::get('mpesa-integration-logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('/', [MpesaController::class, 'index']);
Route::get('/get-token', [MpesaController::class, 'getAccessToken']);
Route::post('/registerUrl', [MpesaController::class, 'registerURL']);
Route::post('/simulate', [MpesaController::class, 'simulateTransaction']);
Route::get('/stk-push-view', [MpesaController::class, 'stkPushView']);
Route::get('/stk-push-notification', [MpesaController::class, 'stkPushNotification']);
