<?php

namespace App\Http\Controllers\Home;

use Image;
use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::all();
        $blogs = Blog::latest()->get();
        return view('admin.blogs.all-blogs', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('name', 'asc')->get();
        return view('admin.blogs.add-blogs', compact('categories'));
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
            'blog_category_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'image' => 'required',
        ], [
            'blog_category_id.required' => 'The category name is required',
        ]);


        $images = $request->file('image');

        if ($images) {
            $generateNameImage = hexdec(uniqid()) . '.' . $images->getClientOriginalExtension();
            $destination = 'uploads/blogs_img/' . $generateNameImage;

            Image::make($images)->resize(430, 327)->save($destination);

            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => Str::lower($request->tags),
                'description' => $request->description,
                'image' => $destination,
                'created_at' => Carbon::now(),
            ]);
        } else {

            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => Str::lower($request->tags),
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);
        }

        session()->flash('message', 'Blog Created Successfully');
        return redirect('admin/all-blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allBlogs = Blog::latest()->limit(5)->get();
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('name', 'asc')->get();
        return view('frontend.includes.blogs.blog-details', compact('blog', 'allBlogs', 'categories'));
    }


    public function showCategoryBlog($id)
    {
        $allBlogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();

        $tags = array_unique(explode(',', Blog::pluck('tags')->implode(',')));

        $categories = BlogCategory::orderBy('name', 'asc')->get();
        $category = BlogCategory::findOrFail($id);

        return view('frontend.includes.blogs.blog-category', compact('blogs', 'categories', 'allBlogs', 'tags', 'category'));
    }

    public function showAllBlogs()
    {
        $allBlogs = Blog::latest()->paginate(3);
        $limitBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('name', 'asc')->get();
        $tags = array_unique(explode(',', Blog::pluck('tags')->implode(',')));

        return view('frontend.includes.blogs.all-blogs', compact('allBlogs', 'limitBlogs', 'categories', 'tags'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('name', 'ASC')->get();
        return view('admin.blogs.edit-blog', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');

        if ($image) {
            $generateNameImage = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $destination = 'uploads/blogs_img/' . $generateNameImage;

            Image::make($image)->resize(1020, 519)->save($destination);

            Blog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => Str::lower($request->tags),
                'description' => $request->description,
                'image' => $destination,
                'updated_at' => Carbon::now(),
            ]);
        } else {

            Blog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => Str::lower($request->tags),
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);
        }

        session()->flash('message', 'Blog Page Updated Successfully');
        return redirect('admin/all-blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $image = $blog->image;
        unlink($image);

        $blog->delete();

        session()->flash('message', 'Blog Deleted Successfully');
        return redirect()->back();
    }
}
