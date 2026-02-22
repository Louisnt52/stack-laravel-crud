<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;

Route::prefix('v1')->group(function () {
    
    // Rutas para productos
    Route::get('/productos', [ProductoController::class, 'index']);        // Listar
    Route::get('/productos/{id}', [ProductoController::class, 'show']);    // Mostrar uno
    Route::post('/productos', [ProductoController::class, 'store']);       // Crear
    Route::put('/productos/{id}', [ProductoController::class, 'update']);  // Actualizar
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy']); // Eliminar
    
});