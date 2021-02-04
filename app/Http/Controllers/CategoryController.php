<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = category::all();

        dd($categories);

        return view('category.index', ['categories' => $categories]);
    }
}
