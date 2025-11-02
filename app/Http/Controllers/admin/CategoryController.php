<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::latest()->get();
        $categories = Category::withCount('blogs')
        ->orderByDesc('blogs_count') // blog count বেশি যেগুলোর, আগে আসবে
        ->orderBy('id', 'asc')       // এরপর serial অনুযায়ী
        ->get();
        return view('admin/blog/category/index',['categories' => $categories ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/blog/category/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {

        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin/blog/category/edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Category $category)
    {
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
