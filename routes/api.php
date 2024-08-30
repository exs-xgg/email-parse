<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuccessfulEmailsController;
use App\Http\Middleware\ApiKeyMiddleware;

Route::middleware([ApiKeyMiddleware::class])->group(function () {

    Route::get('/email', [SuccessfulEmailsController::class, 'index']);
    Route::get('/email/{id}', [SuccessfulEmailsController::class, 'show']);
    
    Route::post('/email', [SuccessfulEmailsController::class, 'store']);
    
    Route::put('/email/{id}', [SuccessfulEmailsController::class, 'update']);
    
    Route::delete('/email/{id}', [SuccessfulEmailsController::class, 'destroy']);

});
   

