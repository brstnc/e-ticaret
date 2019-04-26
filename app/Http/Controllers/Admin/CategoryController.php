<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($id=0)
    {

        $list = Category::orderbyDesc('id')->paginate(8);

        return view('admin.category.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new Category();
        if($id>0) {
            $entry = Category::find($id);
        }

        $categories = Category::all()->where('up_id', null);

        return view('admin.category.form', compact('entry', 'categories'));
    }

    public function save($id = 0)
    {
        $this->validate(request(), [
            'category_name' => 'required'
        ]);


        $data = request()->only('category_name', 'slug', 'up_id');

        if ($id>0) {
            $entry = Category::where('id', $id)->firstOrFail();
            $entry->update($data);

        } else {
            $entry = Category::create($data);
        }


        return redirect()->route('admin.category.update', $entry->id);
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.category');
    }
}
