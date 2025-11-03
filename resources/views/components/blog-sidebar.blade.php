@props(['categories' => [], 'recentBlogs' => []])
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
            @forelse($recentBlogs as $blog)
               <li class="rc__post__item">
                  <div class="rc__post__thumb">
                     <a href="{{ route('blog-details', $blog) }}"><img
                           src="{{ asset($blog->blog_image ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU') }}"
                           alt="{{ $blog->blog_title }}" class="rounded me-3" width="90" height="70"
                           style="object-fit: cover;"> </a>
                  </div>
                  <div class="rc__post__content">
                     <h5 class="title"><a href="{{ route('blog-details', $blog) }}">{{ $blog->blog_title }}</a></h5>
                     <span class="post-date"><i class="fal fa-calendar-alt"></i>
                        {{ $blog->created_at->format('M d, Y') }}</span>
                  </div>
               </li>
            @empty
               <p class="text-muted">No recent posts available</p>
            @endforelse

            {{-- @forelse($recentBlogs as $blog)
            <div class="mb-3 d-flex">
               <img
                  src="{{ asset($blog->blog_image ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU') }}"
                  alt="{{ $blog->blog_title }}" class="rounded me-3" width="70" height="70" style="object-fit: cover;">
               <div>
                  <a href="{{route('blog-details', $blog)}}" class="fw-semibold text-dark text-decoration-none">
                     {{ Str::limit($blog->blog_title, 40) }}
                  </a>
                  <p class="mb-0 text-muted small">{{ $blog->created_at->format('M d, Y') }}</p>
               </div>
            </div>
            @empty
            <p class="text-muted">No recent posts available</p>
            @endforelse --}}

         </ul>
      </div>


      <div class="widget">
         <h4 class="widget-title">Categories</h4>
         <ul class="sidebar__cat">
            @forelse($categories as $category)
               <li class="sidebar__cat__item"><a href="{{ route('category.post',$category->id) }}">{{ $category->name }} ( {{ $category->blogs_count }}
                     )</a></li>
            @empty
               <li class="list-group-item text-muted">No categories available</li>
            @endforelse
         </ul>
         {{-- <ul class="list-group list-group-flush">
            @forelse($categories as $category)
            <li class="justify-between gap-3 sidebar__cat__item d-flex">
               <a href="#" class="text-decoration-none text-dark">
                  {{ $category->name }}
               </a>
               <span class="p-2 badge bg-primary rounded-pill">{{ $category->blogs_count }}</span>
            </li>
            @empty
            <li class="list-group-item text-muted">No categories available</li>
            @endforelse
         </ul> --}}
      </div>
      <div class="widget">
         <h4 class="widget-title">Recent Comment</h4>
         <ul class="sidebar__comment">
            <li class="sidebar__comment__item">
               <a href="blog-details.html">Rasalina Sponde</a>
               <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
            </li>
            <li class="sidebar__comment__item">
               <a href="blog-details.html">Rasalina Sponde</a>
               <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
            </li>
            <li class="sidebar__comment__item">
               <a href="blog-details.html">Rasalina Sponde</a>
               <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
            </li>
            <li class="sidebar__comment__item">
               <a href="blog-details.html">Rasalina Sponde</a>
               <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
            </li>
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