<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

   public function index() {

        // $comments = Comment::latest()->get();

        // $blogs = Blog::with('comments')->get();
        // return $blogs;

        $blogs = Blog::withCount('comments')->latest()->get();
        // return $blogs;

        return view('admin/comment/index', ['blogs' => $blogs]);
        
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'post_id' => 'required|exists:posts,id',
        //     'comment' => 'required|string|max:1000',
        // ]);


        Comment::create([
            'blog_id' => $request->post_id,
            'user_id' => 1,
            'parent_id' => $request->parent_id,
            'comment' => $request->comment
        ]);

        flashToastr('success', 'Comment Reply Added on successfully !!');

        return back()->with('success', 'Comment added successfully!');
    }


    # CommentRemove
    function CommentRemove(Request $request, $comment)
    {
        $comment = Comment::find($comment);
        $comment->delete();

       // Toastr::success('Comment deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        // return back()->with('success', 'Comment deleted successfully!');
        
        # Toaster Helper Function Using
        flashToastr('error', 'Comment deleted successfully Complated !!');
        return back();

        # toastr message
    }
}
