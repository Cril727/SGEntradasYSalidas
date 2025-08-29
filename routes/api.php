<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RolPersonasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/agregarUsuario', [AuthController::class, "agregarUsuario"]);

Route::post('/asignarRol', [RolPersonasController::class, 'asignarRol']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::get('/listarRoles', [RolesController::class, 'listarRoles'])->middleware('role:vigilante');
    Route::post('/agregarRol', [RolesController::class, 'store'])->middleware('role:vigilante');
});

