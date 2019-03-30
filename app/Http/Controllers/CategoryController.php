<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($slug_category_name)
    {
        $category = Category::where('slug', $slug_category_name)->firstOrFail();
        $low_categories = Category::where('up_id', $category->id)->get();
        return view('category', compact('category', 'low_categories'));
    }
}
