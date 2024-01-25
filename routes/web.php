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
Route::get('/recipe/{id}', [RecipeController::class, 'detail'])->name('recipeDetail');
