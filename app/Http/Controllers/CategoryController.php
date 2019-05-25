<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($slug_category_name)
    {
        $category = Category::where('slug', $slug_category_name)->firstOrFail();
        $low_categories = Category::where('up_id', $category->id)->get();
        $products = $category->products()->paginate(4);
        return view('category', compact('category', 'low_categories', 'products'));
    }
}
