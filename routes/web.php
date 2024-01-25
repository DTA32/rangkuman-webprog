<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RecipeController::class, 'home'])->name('home');
Route::get('/category/{category}', [CategoryController::class, 'recipeByCategory'])->name('category');
Route::get('/recipe/manage', [RecipeController::class, 'manage'])->name('recipeManage');
Route::get('/recipe/create', [RecipeController::class, 'createPage'])->name('recipeCreatePage');
Route::post('/recipe/create', [RecipeController::class, 'create'])->name('recipeCreate');
Route::get('/recipe/{id}', [RecipeController::class, 'detail'])->name('recipeDetail');
Route::get('/recipe/{id}/edit', [RecipeController::class, 'editPage'])->name('recipeEditPage');
Route::put('/recipe/{id}/edit', [RecipeController::class, 'edit'])->name('recipeEdit');
Route::delete('/recipe/{id}/delete', [RecipeController::class, 'delete'])->name('recipeDelete');
