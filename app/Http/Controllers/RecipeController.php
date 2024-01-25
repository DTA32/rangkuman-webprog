<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

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
    public function detail($id){
        $recipe = Recipe::find($id);
        return view('recipe.detail', ['recipe' => $recipe]);
    }
    public function manage(){
        $recipes = Recipe::orderBy('id', 'desc')->get();
        // dd($recipes);
        return view('recipe.manage', ['recipes' => $recipes]);
    }
    public function createPage(){
        $authorController = new AuthorController();
        $authors = $authorController->getAll();
        $categoryController = new CategoryController();
        $categories = $categoryController->getAll();
        return view('recipe.create', ['authors' => $authors, 'categories' => $categories]);
    }
    public function create(Request $request){
        $rawData = $request->validate([
            'title' => 'required|min:5',
            'author' => 'required',
            'category' => 'required',
            'published_date' => 'required',
            'description' => 'required|min:10|max:500',
            'image' => 'required',
        ]);
        $recipe = Recipe::create(
            [
                'title' => $rawData['title'],
                'author_id' => $rawData['author'],
                'category_id' => $rawData['category'],
                'published_date' => $rawData['published_date'],
                'description' => $rawData['description'],
                'image' => '',
            ]
        );
        $file = $request->file('image');
        $subdirectory = 'images';
        $fileExt = $file->getClientOriginalExtension();
        $filename = $recipe->id . '.' . $fileExt;
        $file->storeAs($subdirectory, $filename, 'public');
        $recipe->image = $filename;
        $recipe->save();
        return redirect()->route('recipeManage')->with('message', 'Recipe created successfully');
    }
    public function editPage($id){
        $recipe = Recipe::find($id);
        $authorController = new AuthorController();
        $authors = $authorController->getAll();
        $categoryController = new CategoryController();
        $categories = $categoryController->getAll();
        return view('recipe.edit', ['recipe' => $recipe, 'authors' => $authors, 'categories' => $categories]);
    }
    public function edit(Request $request, $id){
        $rawData = $request->validate([
            'title' => 'required|min:5',
            'author' => 'required',
            'category' => 'required',
            'published_date' => 'required',
            'description' => 'required|min:10|max:500',
        ]);
        $recipe = Recipe::find($id);
        $recipe->title = $rawData['title'];
        $recipe->author_id = $rawData['author'];
        $recipe->category_id = $rawData['category'];
        $recipe->published_date = $rawData['published_date'];
        $recipe->description = $rawData['description'];
        if($request->hasFile('image')){
            Storage::delete('public/images/' . $recipe->image);
            $file = $request->file('image');
            $subdirectory = 'images';
            $fileExt = $file->getClientOriginalExtension();
            $filename = $recipe->id . '.' . $fileExt;
            $file->storeAs($subdirectory, $filename, 'public');
            $recipe->image = $filename;
            $recipe->save();
        }
        $recipe->save();
        return redirect()->route('recipeManage')->with('message', 'Recipe edited successfully');
    }
    public function delete($id){
        $recipe = Recipe::find($id);
        $image = $recipe->image;
        $recipe->delete();
        Storage::delete('public/images/' . $image);
        return redirect()->route('recipeManage')->with('message', 'Recipe deleted successfully');
    }
}
