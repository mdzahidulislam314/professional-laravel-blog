<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return redirect()->back()->with('success', 'Profile Updated Successfully!');

    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);


        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->back();
            }else
            {
                return redirect()->back()->with('error', 'New pass cannot be same old password!');
            }
        }else
        {
            return redirect()->back()->with('error', 'Old Password cannot be match!');
        }

    }
}
