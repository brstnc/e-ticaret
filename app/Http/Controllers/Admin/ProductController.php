<?php

namespace App\Http\Controllers\Admin;

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
        if($id>0) {
            $entry = Product::find($id);
        }

        $products = Product::all()->where('up_id', null);

        return view('admin.product.form', compact('entry', 'products'));
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

        if ($id>0) {
            $entry = Product::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->detail()->update($data_detail);

        } else {
            $entry = Product::create($data);
            $entry->detail()->create($data_detail);
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
