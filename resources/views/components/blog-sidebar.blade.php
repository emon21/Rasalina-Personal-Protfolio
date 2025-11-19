{{-- @props(['categories' => [], 'blogs' => [], 'blogComments' => []]) --}}

@php

      // Categories
      $categories = App\Models\Category::withCount('blogs')->orderBy('blogs_count', 'desc')->get();

      // Blogs
      $blogs = App\Models\Blog::latest()->take(5)->get();

      // Blog with Comment
      // $RecentComments = App\Models\Blog::with('comments')->get();
      // $RecentComments = App\Models\Comment::with('blog')->get();

      $blogComments = App\Models\Comment::withCount('blog')->latest()->orderBy('id','desc')->get(); // blog with comment and count

      // $blogs = Blog::withCount(relations: 'comments')->paginate(3);

      // $blogs = Blog::withCount(relations: 'comments')->latest()->take(5)->get();

@endphp

<div class="col-lg-4">
   <aside class="blog__sidebar">
      <div class="widget">
         <form action="#" class="search-form">
            <input type="text" placeholder="Search">
            <button type="submit"><i class="fal fa-search"></i></button>
         </form>
      </div>
      <div class="widget">
         <h4 class="widget-title">Recent Blog</h4>
         <ul class="rc__post">
            @forelse($blogs as $blog)
               <li class="rc__post__item">
                  <div class="rc__post__thumb">
                     <a href="{{ route('blog-details', $blog) }}"><img
                           src="{{ asset($blog->blog_image ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU') }}"
                           alt="{{ $blog->blog_title }}" class="rounded me-3" width="90" height="70"
                           style="object-fit: cover;"> </a>
                  </div>
                  <div class="rc__post__content">
                     <h5 class="title"><a
                           href="{{ route('blog-details', $blog) }}">{{ Str::title(str_replace('-', ' ', $blog->blog_title)) }}</a>
                     </h5>
                     <span class="post-date"><i class="fal fa-calendar-alt"></i>
                        {{ $blog->created_at->format('M d, Y') }}</span>
                  </div>
               </li>
            @empty
               <p class="text-muted">No recent posts available</p>
            @endforelse
         </ul>
      </div>

      <div class="widget">
         <h4 class="widget-title">Categories</h4>
         <ul class="sidebar__cat">
            @forelse($categories as $category)
               <li class="sidebar__cat__item"><a href="{{ route('category.post', $category) }}">{{ $category->name }} (
                     {{ $category->blogs_count }}
                     )</a></li>
            @empty
               <li class="list-group-item text-muted">No categories available</li>
            @endforelse
         </ul>
      </div>

      <div class="widget">
         <h4 class="widget-title">Recent Comment ({{ $blogComments->count() }})</h4>
         <ul class="sidebar__comment">
            @foreach ($blogComments as $comment)
               <li class="sidebar__comment__item">
                  {{-- <a href="blog-details.html">{{ $comment->user->name ?? 'N/A' }}</a> --}}
                  <a href="{{ route('blog-details',$comment->blog->blog_title) }}">{{ Str::title(str_replace('-', ' ', $comment->blog->blog_title)) }}</a>
                  {{-- <h4>{{ Str::title(str_replace('-', ' ', $comment->blog->blog_title)) }} ( {{ $comment->blog_count }} )</h4> --}}
                  <p>{{ Str::limit($comment->comment, 50) }}</p>
               </li>
            @endforeach
         </ul>
      </div>
      
      <div class="widget">
         <h4 class="widget-title">Popular Tags</h4>
         <ul class="sidebar__tags">
            {{-- <li><a href="blog.html">Business</a></li> --}}
            @php
$colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary', 'dark'];
            @endphp
            @foreach(explode(',', $blog->blog_tags) as $tag)
               @php
   // random color pick
   $color = $colors[array_rand($colors)];
               @endphp
               <span class="badge bg-{{ $color }} p-1 ml-2">{{ trim($tag) }}</span>
               {{-- <li><a href="blog.html">{{$tag}}</a></li> --}}
            @endforeach
         </ul>
      </div>
   </aside>
</div>