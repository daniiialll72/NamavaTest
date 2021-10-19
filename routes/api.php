<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/getUsersData', [App\Http\Controllers\UserController::class, 'index']);

Route::any('/cards/add', [App\Http\Controllers\CardController::class, 'generate']);
Route::any('/cards/salesAssign', [App\Http\Controllers\CardController::class, 'saleAssignment']);
Route::any('/cards/shopAssign', [App\Http\Controllers\CardController::class, 'shopAssignment']);
Route::any('/cards/register', [App\Http\Controllers\CardController::class, 'register']);

Route::any('/wallet/index', [App\Http\Controllers\WalletController::class, 'index']);
