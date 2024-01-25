<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function getAll(){
        $authors = Author::all();
        return $authors;
    }
}
