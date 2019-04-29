<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($id=0)
    {

        $list = Product::orderbyDesc('id')->paginate(8);

        return view('admin.product.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new Product();
        $product_categories = [];
        if($id>0) {
            $entry = Product::find($id);
            $product_categories = $entry->categories()->pluck('category_id')->all();
        }
        $categories = Category::all();

        return view('admin.product.form', compact('entry', 'categories', 'product_categories'));
    }

    public function save($id = 0)
    {
        $this->validate(request(), [
            'product_name' => 'required',
            'price' => 'required'
        ]);


        $data = request()->only('slug', 'product_name', 'comment', 'price');
        $data_detail = request()->only('show_slider', 'show_opportunity', 'show_featured',
            'show_bestselling', 'show_reduced') ;

        $categories = request('categories');

        if ($id>0) {
            $entry = Product::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->detail()->update($data_detail);
            $entry->categories()->sync($categories);

        } else {
            $entry = Product::create($data);
            $entry->detail()->create($data_detail);
            $entry->categories()->attach($categories);
        }

        return redirect()->route('admin.product.update', $entry->id);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->categories()->detach();
        $product->detail()->delete();
        $product->delete();

        return redirect()->route('admin.product');
    }
}
