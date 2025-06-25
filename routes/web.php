<?php
// routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::prefix('api')->group(function () {

    // Crear un material nuevo
    Route::post('materiales', [MaterialController::class, 'store']);

 
});
