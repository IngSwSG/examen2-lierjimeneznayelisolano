<?php
// routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::prefix('api')->group(function () {

 // Crear un material nuevo
    Route::post('materiales', [MaterialController::class, 'store']);

  // Listar materiales con su categoría
    Route::get('materiales', [MaterialController::class, 'index']);

 // Actualizar un material existente
    Route::match(['put','patch'], 'materiales/{codigo}', [MaterialController::class, 'update']);
});
