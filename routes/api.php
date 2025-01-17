<?php

use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user',function (Request $request) {
    return $request->user();
});

Route::apiResource("v1/estudiantes",EstudiantesController::class);
Route::apiResource("v1/usuarios",UserController::class);