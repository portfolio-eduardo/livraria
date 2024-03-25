<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// todas as rotas tem automaticamente "api" antes do nome exemplo: Rota chama-se "estudante" o caminho será "/api/estudante"

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
