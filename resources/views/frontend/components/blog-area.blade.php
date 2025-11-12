@php

    $blogs = App\Models\Blog::latest()->limit(3)->inRandomOrder()->get();

@endphp

<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="blog-details.html">
                                <img src="{{ $blog->blog_image ? asset($blog->blog_image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU' }}"
                                    alt="" width="430" height="327">
                            </a>
                            <div class="blog__post__tags">
                                <a href="blog.html">{{$blog->category->name}}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                            {{-- <span class="date">13 january 2021</span> --}}
                            <h3 class="title"><a href="blog-details.html">{{ $blog->blog_title }}</a></h3>
                            <a href="{{ route('blog-details', $blog)}}" class="read__more">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center blog__button">
            <a href="blog.html" class="btn">more blog</a>
        </div>
    </div>
</section>