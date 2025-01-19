<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//INPORTAR EL CONTROLADOR
use App\Http\Controllers\UserController;

Route::group(['prefix' => 'user'], function ($router) {
    // NO TOKEN
    Route::get('/', [UserController::class, 'getUser']);
    // TOKEN 
    Route::post('/', [UserController::class, 'createUser']);
    Route::patch('/{id}', [UserController::class, 'updateUser']);
    
    // EL ULTIMO
    Route::delete('/{id}', [UserController::class, 'deleteUser']);
});


 /* // VALIDAR NOT FOUND
Route::fallback(function() {
    return response()->json([
        'message' => 'Api endpoint not found'
    ], 404);
});

Route::any('{any}', function() {
    return response()->json([
        'message' => 'Method not allowed'
    ], 405);
})->where('any', '.*'); */




