<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function ProfileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ]);

        $image = $request->file('image');
        $user   = User::findOrFail(Auth::id());

        if ($image) {
//            unlink($user->image);
            $slug   = Str::slug($request->name);
            $imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $directory = './profile-image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
        } else {
            $imageUrl = $user->image;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->image = $imageUrl;
        $user->about = $request->about;
        $user->save();
        return redirect()->back();

    }
}
