<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/agregarUsuario', [AuthController::class, "agregarUsuario"]);
Route::post('/agregarRol', [RolesController::class, 'store']);

Route::middleware('auth:api')->group(function(){
    
});

