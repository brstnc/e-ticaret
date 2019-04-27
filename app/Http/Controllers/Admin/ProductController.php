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

        if ($id>0) {
            $entry = Product::where('id', $id)->firstOrFail();
            $entry->update($data);

        } else {
            $entry = Product::create($data);
        }


        return redirect()->route('admin.product.update', $entry->id);
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.product');
    }
}
