<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function recipeByCategory($category){
        $recipes = Category::find($category)->recipes()->orderBy('published_date', 'desc')->get();
        foreach($recipes as $recipe){
            $newDesc = substr($recipe->description, 0, 100);
            $newDesc = $newDesc . '...';
            $recipe->description = $newDesc;
        }
        $category = $recipes[0]->category->name;
        return view('category', ['recipes' => $recipes, 'category' => $category]);
    }
    public function getAll(){
        $categories = Category::all();
        return $categories;
    }
}
