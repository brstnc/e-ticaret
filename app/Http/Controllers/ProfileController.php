<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Details;

class ProfileController extends Controller
{
    public function profile()
    {
        $entry = User::find(auth()->id());
        return view('profile', compact('entry'));
    }

    public function form($id = 0)
    {
        $entry = new User;
        if($id>0) {
            $entry = User::find($id);
        }
        return view('profile', compact('entry'));
    }

    public function save($id = 0)
    {
        $this->validate(request(), [
            'name_lastname' => 'required',
            'email' => 'required|email'
        ]);

        $data = request()->only('name_lastname', 'email');
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

        return redirect()->route('profile.update', $entry->id);
    }
}