<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElementosController;
use App\Http\Controllers\IngresoElementosController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RolPersonasController;
use App\Http\Controllers\SalidasController;
use App\Http\Controllers\TiposController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/agregarUsuario', [AuthController::class, "agregarUsuario"]);

Route::post('/asignarRol', [RolPersonasController::class, 'asignarRol']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/listarRoles', [RolesController::class, 'listarRoles'])->middleware('role:admin,vigilante');
    Route::post('/agregarRol', [RolesController::class, 'store'])->middleware('role:admin');
    Route::get('/personaPorDocumento/{documento}', [PersonasController::class, 'personaPorDocumento'])->middleware('role:admin');
    Route::post('/agregarElemento', [ElementosController::class,'store'])->middleware('role:admin');
    Route::post('/agregarTipo', [TiposController::class, 'store'])->middleware('role:admin');
    Route::post('/ingreso', [IngresosController::class, 'store'])->middleware('role:admin');
    Route::post('/ingresoElemento',[IngresoElementosController::class, 'store'])->middleware('role:admin');
    Route::post('/salida',[SalidasController::class, 'store'])->middleware('role:admin');
    Route::get('/ingresosElementos', [IngresoElementosController::class, 'index'])->middleware('role:admin');
    Route::get('/listarTipos',[TiposController::class, 'index'])->middleware('role:admin');
});

