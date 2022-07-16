<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\User;
use App\Models\About;
use App\Models\HomeSlide;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Admin
    public function home()
    {
        $id = Auth::user()->id;
        $admin = User::find($id);

        $homeslide = HomeSlide::find(1);
        $about = About::find(1);

        return view('frontend.index', compact('homeslide', 'admin', 'about'));
    }

    public function index()
    {
        $id = Auth::user()->id;
        $admin = User::find($id);

        $homeslide = HomeSlide::find(1);

        return view('admin.includes.homeslide', compact('homeslide', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSlide  $homeSlide
     * @return \Illuminate\Http\Response
     */
    public function updateHome(Request $request)
    {
        $homeslideId =  $request->id;
        $image = $request->file('home_slide_image');

        if ($image) {
            $generateNameImage = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $destination = 'uploads/home_slide/' . $generateNameImage;

            Image::make($image)->resize(1020, 519)->save($destination);

            HomeSlide::findOrFail($homeslideId)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $generateNameImage,
            ]);
        } else {
            HomeSlide::findOrFail($homeslideId)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);
        }
        session()->flash('message', 'Home Slide Page Updated Successfully');
        return redirect('admin/home-slide');
    }

    // Admin
    public function multiImage()
    {
        $id = Auth::user()->id;
        $admin = User::find($id);

        return view('admin.includes.add-multi-image', compact('admin'));
    }

    public function storeMultiImage(Request $request)
    {
        $images = $request->file('multi_image');

        foreach ($images as $multi_image) {
            $generateNameImage = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            $destination = 'uploads/multi_img/' . $generateNameImage;

            Image::make($multi_image)->resize(220, 220)->save($destination);

            MultiImage::insert([
                'multi_image' => $destination,
                'created_at' => Carbon::now(),
            ]);
        }

        session()->flash('message', 'Multi-Images Created Successfully');
        return redirect()->back();
    }

    public function multiImageAll()
    {
        $id = Auth::user()->id;
        $admin = User::find($id);

        $images = MultiImage::all()->sortByDesc('created_at');

        return view('admin.includes.all-multi-image', compact('images', 'admin'));
    }

    public function multiImageEdit($imageId)
    {

        $id = Auth::user()->id;
        $admin = User::find($id);

        $image = MultiImage::findOrFail($imageId);

        return view('admin.includes.edit-multi-image', compact('image', 'admin'));
    }

    public function multiImageUpdate(Request $request)
    {
        $multiImageId = $request->id;
        $image = $request->file('image');

        if ($image) {
            $generateNameImage = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $destination = 'uploads/multi_img/' . $generateNameImage;

            Image::make($image)->resize(739, 852)->save($destination);

            MultiImage::findOrFail($multiImageId)->update([
                'multi_image' => $destination,
                'updated_at' => Carbon::now(),
            ]);
        }

        session()->flash('message', 'Image Updated Successfully');
        return redirect('admin/all-multi-image');
    }

    public function multiImageDelete($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        $image = $multiImage->multi_image;
        unlink($image);

        $multiImage->delete();

        session()->flash('message', 'Image Deleted Successfully');
        return redirect()->back();
    }
}
