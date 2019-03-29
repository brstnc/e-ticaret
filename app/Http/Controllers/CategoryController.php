<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug_category_name)
    {
        return view('category');
    }
}
