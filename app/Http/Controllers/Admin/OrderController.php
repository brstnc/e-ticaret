<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index($id=0)
    {

        $list = Order::orderbyDesc('id')->paginate(8);

        return view('admin.order.index', compact('list'));
    }

    public function form($id)
    {
        $entry = Order::find($id);

        return view('admin.order.form', compact('entry'));
    }

    public function save($id)
    {

        $this->validate(request(), [
            'name_lastname' => 'required',
            'address' => 'required',
            'mob_tel_number' => 'required'
        ]);

        $data = request()->only('name_lastname', 'tel_number', 'mob_tel_number', 'address', 'status');

        $entry = Order::where('id', $id)->firstOrFail();

        $entry->update($data);
        dd($entry);


        return redirect()->route('admin.order.update', $entry->id);
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('admin.order');
    }
}
