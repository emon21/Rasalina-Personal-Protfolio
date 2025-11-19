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

    public function ContactStore(Request $request, Contact $contact)
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
    
      
        // All Category
        // $categories = Category::withCount('blogs')
        //     ->orderBy('blogs_count', 'desc')
        //     ->get();

        // Category with Blog
        // $categories = Category::with('blogs')->get();

       
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
    }

    # Category on Post

    public function CategoryPost(Category $category)
    {
        $blogs = $category->blogs()->paginate(3);
        return view('frontend.blog.blog-category', compact('category', 'blogs'));
    }

    # Frontend Services
    public function Service()
    {
        $services = Service::latest()->paginate(3);
        return view('frontend/service/index', ['services' => $services]);
    }

    # Frontend Services Details
    public function ServicesDetails(Service $service)
    {
        return view('frontend/service/service-details', compact('service'));
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
