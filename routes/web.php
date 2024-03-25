<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// rotas dos livros

Route::get('/', [LivroController::class, 'mostrarCincoLivros']);
Route::get('/livros', [LivroController::class,'index']);
Route::get('/livros/{livro}', [LivroController::class,'show']);
Route::post('/requisitar/{livro}', [LivroController::class,'requisitar'])->middleware(['auth']);
Route::get('/gerir', [LivroController::class,'gerir'])->middleware(['auth', 'verificarPerfilFuncionario']);
Route::get('/desativarAtivar/{livro}', [LivroController::class,'desativarAtivar'])->middleware(['auth', 'verificarPerfilFuncionario']);
Route::get('/adicionar', [LivroController::class,'create'])->middleware(['auth', 'verificarPerfilFuncionario']);
Route::post('/registar', [LivroController::class,'store'])->middleware(['auth','verificarPerfilFuncionario']);
Route::get('/alterar/{livro}', [LivroController::class,'edit'])->middleware(['auth','verificarPerfilFuncionario']);
Route::put('/atualizar/{livro}', [LivroController::class,'update'])->middleware(['auth', 'verificarPerfilFuncionario']);

// rota dos generos

Route::get('/generos', [GeneroController::class,'index']);
Route::get('/generos/{genero}', [GeneroController::class,'show']);
Route::get('/gerirGeneros', [GeneroController::class,'gerirGeneros'])->middleware(['auth', 'verificarPerfilChefe']);
Route::get('/adicionarGenero', [GeneroController::class, 'create'])->middleware(['auth', 'verificarPerfilChefe']);
Route::post('/registarGenero', [GeneroController::class, 'store'])->middleware(['auth', 'verificarPerfilChefe']);
Route::get('/alterarGenero/{genero}', [GeneroController::class,'edit'])->middleware(['auth', 'verificarPerfilChefe']);
Route::put('/atualizarGenero/{genero}', [GeneroController::class,'update'])->middleware(['auth', 'verificarPerfilChefe']);

// rotas dos utilizadores

Route::get('/registar', [UserController::class,'create'])->middleware('guest');
Route::post('/registarUtilizador', [UserController::class,'store'])->middleware('guest');
Route::get('/login', [UserController::class,'login'])->middleware('guest')->name('login');
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');
Route::post('/autenticarUtilizador', [UserController::class,'autenticar']);
Route::get('/utilizadores/{User}', [UserController::class,'show']);
Route::get('/adicionarFuncionario', [UserController::class,'createFuncionario'])->middleware(['auth', 'verificarPerfilChefe']);
Route::post('/registarFuncionario', [UserController::class,'storeFuncionario'])->middleware(['auth', 'verificarPerfilChefe']);

Route::get('/gerirClientes', [UserController::class,'gerirClientes'])->middleware(['auth', 'verificarPerfilFuncionario']);
Route::get('/gerirFuncionarios', [UserController::class,'gerirFuncionarios'])->middleware(['auth', 'verificarPerfilChefe']);
Route::get('/desativarAtivarUsers/{User}', [UserController::class,'desativarAtivar']);
Route::get('/verperfil', [UserController::class,'verperfil'])->middleware('auth');
Route::put('/alterarPerfil', [UserController::class,'update'])->middleware('auth');

// rotas dos autores
Route::get('/autores', [AutorController::class,'index']);
Route::get('/autores/{autor}', [AutorController::class,'show']);
Route::get('/gerirAutores', [AutorController::class,'gerirAutores'])->middleware(['auth', 'verificarPerfilChefe']);
Route::get('/adicionarAutor', [AutorController::class, 'create'])->middleware(['auth', 'verificarPerfilChefe']);
Route::post('/registarAutor', [AutorController::class, 'store'])->middleware(['auth', 'verificarPerfilChefe']);
Route::get('/alterarAutor/{autor}', [AutorController::class,'edit'])->middleware(['auth', 'verificarPerfilChefe']);
Route::put('/atualizarAutor/{autor}', [AutorController::class,'update'])->middleware(['auth', 'verificarPerfilChefe']);

Route::get('/desativarAtivarAutores/{autor}', [AutorController::class,'desativarAtivar']);
