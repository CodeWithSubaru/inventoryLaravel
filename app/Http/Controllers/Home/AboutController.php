<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\User;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::findOrFail(1);
        $images = MultiImage::all();
        return view('frontend.about', compact('about', 'images'));
    }

    public function update(Request $request)
    {
        $aboutImageId =  $request->id;
        $image = $request->file('about_image');

        if ($image) {
            $generateNameImage = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $destination = 'uploads/about/' . $generateNameImage;

            Image::make($image)->resize(523, 605)->save($destination);

            About::findOrFail($aboutImageId)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $generateNameImage,
            ]);
        } else {
            About::findOrFail($aboutImageId)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);
        }
        session()->flash('message', 'About Updated Successfully');
        return redirect('admin/about');
    }

    public function about()
    {
        $id = Auth::user()->id;
        $admin = User::find($id);

        $about = About::find(1);
        return view('admin.includes.about', compact('admin', 'about'));
    }
}
