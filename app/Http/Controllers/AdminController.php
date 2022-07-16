<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function index()
    {

        $id = Auth::user()->id;
        $admin = User::find($id);

        return view('admin.index', compact('admin'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $admin = User::find($id);

        return view('admin.admin_profile', compact('admin'));
    }

    public function changePass()
    {
        $id = Auth::user()->id;
        $admin = User::find($id);


        return view('auth.change-password', compact('admin'));
    }

    public function updatePass(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|different:old_password',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $users = User::find(Auth::id());

            $users->password = bcrypt($request->new_password);

            $users->save();

            session()->flash('message', 'Password Updated Successfully');

            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $admin = User::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;

        if ($request->file('profile_img')) {
            $file = $request->file('profile_img');
            $filename = $file->getClientOriginalName();

            $pathinfo = pathinfo($filename);

            $base = $pathinfo['filename'];

            $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);

            $base = mb_substr($base, 0, 255);

            $filename = ucwords($base . "." . Str::lower($pathinfo['extension']));

            $counter = 1;

            $destination = public_path("uploads/admin_img/$filename");

            while (file_exists($destination)) {
                $filename = ucwords($base . "-$counter." . $pathinfo['extension']);
                $destination = public_path("uploads/admin_img/$filename");

                $counter++;
            }

            if ($destination) {
                $destination = $file->move(public_path("uploads/admin_img"), $filename);
                $admin->profile_image = $filename;
            }
        }

        $admin->save();

        $notification = ['message' => 'Admin Profile updated successfully!', 'alert-type' => 'success'];

        return redirect()->route('admin.profile')->with($notification);
    }
}
