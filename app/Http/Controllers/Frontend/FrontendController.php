<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\About;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    # Frontend Home
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('frontend.index', compact('sliders'));
    }

    # Frontend Banner
    public function banner()
    {
        $slider = Slider::first();
        // return $slider;
        return view('frontend.components.banner-area', compact('slider'));
    }

    # Frontend About
    public function about()
    {
        $about = About::first();
        return view('frontend.about', compact('about'));
    }

    # Frontend Contact
    public function contact()
    {
        return view('frontend.contact');
    }
    
    public function ContactStore(Request $request,Contact $contact)
    {
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        $notification = array(
            'message' => 'Your Message Submited Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    # Frontend Blog
    public function blog()
    {
        $blogs = Blog::latest()->paginate(3);
        return view('frontend.blog.index', [
            'blogs' => $blogs
        ]);
    }

    # Frontend Blog Details
    public function BlogDetails(Blog $blog)
    {

        // $post = Blog::with('comments.user.replies.user')->findOrFail($id);

        # single comment on Blog
       // $comment = Blog::with('comments')->find($blog);

        # All comment on Blog
      // $comments = Comment::withCount('blog')->get(); // all comment

        // return $blog->comments;
        // return $comment;

        // return view('frontend.blog.blog-details', [
        //     'blog' => $blog,
        //     // 'comment' => $comment
        // ], compact('comments'));


        // Next Post (Current ID থেকে বড়)
        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        // Previous Post (Current ID থেকে ছোট)
        $prevBlog = Blog::where('id', '<', $blog->id)
                    ->orderBy('id', 'desc')
                    ->first();




        return view('frontend.blog.blog-details', [
            'blog' => $blog,
            'prevBlog' => $prevBlog,
            'nextBlog' => $nextBlog,
        ]);
        
        // return view('frontend.blog.blog-details', [
        //     'blog' => $blog
        // ]);

    }

    # Category on Post

     public function CategoryPost(Category $category) {

        // $post = Blog::where('category_id',$id)->get();

       // $posts = $category->blogs()->with('category')
           // ->latest()->get();
        //   ->paginate(12);

        $blogs = $category->blogs()->paginate(3);

       // return $posts;

        // return view('frontend.blog.blog-category',compact('post'));

        return view('frontend.blog.blog-category', compact('category', 'blogs'));
    }

    # BlogCategory
    public function BlogCategory($blog_category)
    {
        // $recentBlogs = Blog::latest()->take(5)->get();

        // $categories = Category::withCount('blogs')
        //     ->orderBy('blogs_count', 'desc')
        //     ->get();

        // // return view('frontend.blog.blog-category',[
        // //     'category' => $category,
        // //     'categories' => $categories,
        // //     'recentBlogs' => $recentBlogs
        // // ]);

        // $category = Category::all();


        // $category = Category::where('name', $blog_category)
        //     ->orWhere('id', $blog_category)
        //     ->firstOrFail();

        $posts = Blog::
            // ->with( 'category')
            where('category_id', $blog_category)
            // ->latest()
            // ->paginate(12);
            ->get();

        // if ($posts && $posts->count() > 0) {
        //     // পোস্ট আছে, শুধু সেইগুলো দেখাও
        //     foreach ($posts as $post) {
        //         echo $post->blog_title . "<br>";
        //     }
        // } else {
        //     // পোস্ট নাই, সব ডাটা দেখাও
        //     $allPosts = Blog::all();
        //     foreach ($allPosts as $post) {
        //         echo $post->blog_title . "<br>";
        //     }
        // }

        if ($posts && $posts->count() > 0) {
            return $posts;
            // foreach ($posts as $post) {
            //     echo $post->blog_title . "<br>";
            // }
        } else {

            $allPosts = Blog::all();
            // return $allPosts;
            // foreach ($allPosts as $post) {
            //     // echo $post->blog_title . "<br>";
            //     return $post;
            // }
        }

        // return $posts;


        return view('frontend.blog.blog-category', compact('category', 'posts'));
    }

    # BlogCategoryDetails
    public function BlogCategoryDetails(Category $category, Blog $blog)
    {
        $recentBlogs = Blog::latest()->take(5)->get();
        $categories = Category::withCount('blogs')
            ->orderBy('blogs_count', 'desc')
            ->get();
        return view('frontend.blog.blog-category-details', [
            'category' => $category,
            'blog' => $blog,
            'categories' => $categories,
            'recentBlogs' => $recentBlogs
        ]);
    }

    # Frontend Services
    public function Service()
    {
        $services = Service::latest()->paginate(3);
        return view('frontend/service/index',['services' => $services]);
    }

    # Frontend Services Details
    public function ServicesDetails(Service $service)
    {
        return view('frontend/service/service-details',compact('service'));

    }

    # Frontend Portfolio
    public function Portfolio()
    {
        $portfolios = Portfolio::latest()->paginate(5);
        return view('frontend.portfolio.index', ['portfolios' => $portfolios]);
    }

    # Frontend Portfolio Details
    public function PortfolioDetails(Portfolio $portfolio)
    {
        return view('frontend.portfolio.portfolio-details', ['portfolio' => $portfolio]);
    }
    
}
