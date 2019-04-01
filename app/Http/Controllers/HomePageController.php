<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $categories = Category::whereRaw('up_id is null')->get();
        $products_slider = ProductDetail::where('show_slider',1)->take(5)->get();
        $products_opportunity = ProductDetail::where('show_opportunity',1)->take(1)->get();
        $products_featured = ProductDetail::where('show_featured', 1)->take(4)->get();
        $products_bestselling = ProductDetail::where('show_bestselling', 1)->take(4)->get();
        $products_reduced = ProductDetail::where('show_reduced', 1)->take(4)->get();

    	return view('homepage', compact('categories', 'products_slider',
            'products_opportunity', 'products_featured', 'products_bestselling', 'products_reduced'));
    }
}
