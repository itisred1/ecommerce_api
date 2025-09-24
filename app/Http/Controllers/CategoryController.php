<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function groupByCategory()
    {
        $categories = Category::with('products')->get();

        return response()->json($categories);
    }
}
