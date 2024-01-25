<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function home(){
        $recipes = Recipe::orderBy('published_date', 'desc')->take(3)->get();
        foreach($recipes as $recipe){
            $newDesc = substr($recipe->description, 0, 100);
            $newDesc = $newDesc . '...';
            $recipe->description = $newDesc;
        }
        return view('home', ['recipes' => $recipes]);
    }
    public function perCategory($category){
        $recipes = Recipe::where('category_id', $category)->orderBy('published_date', 'desc')->get();
        foreach($recipes as $recipe){
            $newDesc = substr($recipe->description, 0, 100);
            $newDesc = $newDesc . '...';
            $recipe->description = $newDesc;
        }
        $category = $recipes[0]->category->name;
        return view('category', ['recipes' => $recipes, 'category' => $category]);
    }
    public function detail($id){
        $recipe = Recipe::find($id);
        return view('recipeDetail', ['recipe' => $recipe]);
    }
}
