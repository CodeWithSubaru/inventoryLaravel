<?php

namespace App\Http\Controllers\Home;

use Image;
use Carbon\Carbon;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PorfolioController extends Controller
{

    public function home()
    {
        $allPortfolios = Portfolio::latest()->paginate(1);
        return view('frontend.includes.portfolio', compact('allPortfolios'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.includes.all-portfolio', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.includes.add-portfolio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Name is required',
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
        ]);

        $images = $request->file('image');

        if ($images) {
            $generateNameImage = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
            $destination = 'uploads/portfolio_img/' . $generateNameImage;

            Image::make($images)->resize(1020, 519)->save($destination);

            Portfolio::insert([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $destination,
                'created_at' => Carbon::now(),
            ]);
        }

        Portfolio::insert([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        session()->flash('message', 'Portfolio Page Created Successfully');
        return redirect('admin/all-portfolio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.includes.portfolio-details', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.includes.edit-portfolio', compact('portfolio'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $portfolioId =  $request->id;
        $image = $request->file('image');

        if ($image) {
            $generateNameImage = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $destination = 'uploads/portfolio_img/' . $generateNameImage;

            Image::make($image)->resize(1020, 519)->save($destination);

            Portfolio::findOrFail($portfolioId)->update([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $destination,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Portfolio::findOrFail($portfolioId)->update([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);
        }
        session()->flash('message', 'Portfolio Page Updated Successfully');
        return redirect('admin/all-portfolio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolioId = Portfolio::findOrFail($id);
        $image = $portfolioId->image;
        unlink($image);

        $portfolioId->delete();

        session()->flash('message', 'Image Deleted Successfully');
        return redirect()->back();
    }
}
