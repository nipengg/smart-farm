<?php

use App\Http\Controllers\API\ApiController;
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
Route::get('/get', [ApiController::class, 'getData']);
Route::post('/post', [ApiController::class, 'storeData']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
