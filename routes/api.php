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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('save-property', [App\Http\Controllers\PropertyController::class, 'saveProperty']);

Route::post('save-admin-property', [App\Http\Controllers\PropertyController::class, 'savePropAdmin']);

Route::get('get-property/{data_from}', [App\Http\Controllers\PropertyController::class, 'getProperty']);

Route::post('delete-property', [App\Http\Controllers\PropertyController::class, 'deleteAdminProp']);

Route::get('get-property-by-id/{id}', [App\Http\Controllers\PropertyController::class, 'getPropertyById']);





