<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\User_Details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


    public function index()
    {
        $list = User::orderbyDesc('created_at')->paginate(8);
        return view('admin.user.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new User;
        if($id>0) {
            $entry = User::find($id);
        }
        return view('admin.user.form', compact('entry'));
    }

    public function save($id = 0)
    {
        $this->validate(request(), [
            'name_lastname' => 'required',
            'email' => 'required|email'
        ]);

        $data = request()->only('name_lastname', 'email');
        $data['admin'] = request()->has('admin') ? 1 : 0;

        if ($id>0) {
            $entry = User::where('id', $id)->firstOrFail();
            $entry->update($data);

            User_Details::updateOrCreate(
                ['user_id' => $id],
                [
                    'address' => request('address'),
                    'tel_number' => request('tel'),
                    'mob_tel_number' => request('mob_tel')
                ]
            );
        }

        return redirect()->route('admin.user.update', $entry->id);
    }

    public function delete($id)
    {
        $entry = User::where('id', $id)->firstOrFail();
        $entry->Delete();
        return redirect()->route('admin.user');
    }
}
