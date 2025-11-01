<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
  
    public function AllBlogCategory(){

        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.index', compact('blogCategory'));

    } //end method

    public function AddBlogCategory(){
        return view('admin/blog/category/create');
    }
}
