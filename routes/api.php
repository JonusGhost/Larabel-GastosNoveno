<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [LoginController::class,'login']);

Route::post('register', [RegisterController::class,'register']);

// Categorias
Route::get   ('categorias',             [CategoriaController::class, 'index']);
Route::post  ('categorias/save',        [CategoriaController::class, 'store']);
Route::get   ('categorias/{id}',        [CategoriaController::class, 'show']); 
Route::put   ('categorias/{id}/update', [CategoriaController::class, 'update']);
Route::delete('categorias/{id}/delete', [CategoriaController::class, 'destroy']); 

// Subcategorias
Route::get   ('subcategorias',            [SubcategoriasController::class, 'index']);
Route::post  ('subcategorias/save',       [SubcategoriasController::class, 'store']);
Route::get   ('subcategorias/{id}',       [SubcategoriasController::class, 'show']); 
Route::put   ('subcategorias/{id}/update',[SubcategoriasController::class, 'update']);
Route::delete('subcategorias/{id}/delete',[SubcategoriasController::class, 'destroy']); 