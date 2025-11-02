<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin/blog/create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        //
        // $blog->create(attributes: $request->all());

        // ImageService::UploadImage($request->has('blog_image'),'blog');

        if($request->hasFile('blog_image')){

            // Upload file
            $path = ImageService::UploadImage($request->file('blog_image'), 'blogs');
            $blog->blog_image = $path;
        }


        $blog->category_id = $request->category;
        $blog->blog_title = $request->blog_title;
        $blog->blog_tags = $request->blog_tags;
        $blog->blog_description = $request->blog_description;
        $blog->save();

        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::latest()->get();
        return view('admin/blog/edit',[
            'categories' => $categories,
            'blog'=> $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if ($request->hasFile('blog_image')) {

            # old imag delete
            ImageService::deleteImage($blog->blog_image);

            // Upload file
            $path = ImageService::UploadImage($request->file('blog_image'), 'blogs');
            $blog->blog_image = $path;
        }


        $blog->category_id = $request->category;
        $blog->blog_title = $request->blog_title;
        $blog->blog_tags = $request->blog_tags;
        $blog->blog_description = $request->blog_description;
        $blog->save();

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        # with imag delete
        ImageService::deleteImage($blog->blog_image);

        $blog->delete();
        return redirect()->route('admin.blog.index');
    }
}
