<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomePageController extends Controller
{
    public function index()
    {
        $categories = Category::whereRaw('up_id is null')->get();

        $products_slider = Product::select('product.*')
            ->join('product_detail', 'product_detail.product_id', 'product.id')
            ->where('product_detail.show_slider', 1)
            ->orderBy('updated_at', 'desc')
            ->take(5)->get();

        $products_opportunity = Product::select('product.*')
            ->join('product_detail', 'product_detail.product_id', 'product.id')
            ->where('product_detail.show_opportunity', 1)
            ->orderBy('updated_at', 'desc')
            ->first();

        $products_featured = Product::select('product.*')
            ->join('product_detail', 'product_detail.product_id', 'product.id')
            ->where('product_detail.show_featured', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)->get();

        $products_bestselling = Product::select('product.*')
            ->join('product_detail', 'product_detail.product_id', 'product.id')
            ->where('product_detail.show_bestselling', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)->get();

        $products_reduced = Product::select('product.*')
            ->join('product_detail', 'product_detail.product_id', 'product.id')
            ->where('product_detail.show_reduced', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)->get();



    	return view('homepage', compact('categories', 'products_slider',
            'products_opportunity', 'products_featured', 'products_bestselling', 'products_reduced'));
    }
}
