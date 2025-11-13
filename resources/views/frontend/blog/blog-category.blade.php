@extends('frontend.layouts.app', ['title' => 'Blog Category - Rasalina'])

{{-- resources/views/blog/category.blade.php --}}


{{-- @section('title', $category->name . ' - Blog Category') --}}

@section('content')
   <!-- breadcrumb-area -->
   <section class="breadcrumb__wrap">
      <div class="container custom-container">
         <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
               <div class="breadcrumb__wrap__content">
                  <h4 class="title">{{ $category->name }} ( {{ $posts->count() }} )</h4>
                  <div class="flex flex-wrap justify-center gap-4 mt-4">
                     {{-- <span
                        class="inline-block px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-100 rounded-full">
                        {{ $posts->count() }} Articles
                     </span> --}}
                     <span class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-full">
                        Updated : {{ $posts->first()?->created_at->format('M d, Y') ?? 'Recently' }}
                     </span>
                  </div>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="breadcrumb__wrap__icon">
         <ul>
            <li><img src="{{ asset('frontend') }}/assets/img/icons/breadcrumb_icon01.png" alt=""></li>
            <li><img src="{{ asset('frontend') }}/assets/img/icons/breadcrumb_icon02.png" alt=""></li>
            <li><img src="{{ asset('frontend') }}/assets/img/icons/breadcrumb_icon03.png" alt=""></li>
            <li><img src="{{ asset('frontend') }}/assets/img/icons/breadcrumb_icon04.png" alt=""></li>
            <li><img src="{{ asset('frontend') }}/assets/img/icons/breadcrumb_icon05.png" alt=""></li>
            <li><img src="{{ asset('frontend') }}/assets/img/icons/breadcrumb_icon06.png" alt=""></li>
         </ul>
      </div>
   </section>
   <!-- breadcrumb-area-end -->

   <!-- blog-area -->
   <section class="standard__blog">
      <div class="container">
         @if($posts->count() > 0)
         <div class="row">
            @foreach ($posts as $blog)
            <div class="my-3 col-md-4">
                  <div class="standard__blog__post">
                     <div class="standard__blog__thumb">
                        <a href="blog-details.html">
                           <img
                              src="{{ $blog->blog_image ? asset($blog->blog_image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU' }}"
                              alt=""></a>
                        <a href="{{route('blog-details', $blog)}}" class="blog__link"><i
                              class="far fa-long-arrow-right"></i></a>
                     </div>
                     <div class="standard__blog__content">
                        <div class="blog__post__avatar">
                           <div class="thumb"><img
                                 src="{{ $blog->blog_image ? asset($blog->blog_image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU' }}"
                                 alt=""></div>
                           <span class="post__by">By : <a href="#">Halina Spond</a></span>
                        </div>
                        <h2 class="title">
                           <a href="{{route('blog-details', $blog)}}">{{ $blog->blog_title }}</a>
                        </h2> 
                        <ul class="blog__post__meta">
                              <li><i class="fal fa-calendar-alt"></i>
                                 {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
                              <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                              <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                           </ul>
                     </div>
                  </div>
               </div>
                  @endforeach
            </div>
            @else
               <p class="text-center text-danger">No posts found.</p>
            @endif
           

         <div class="pagination-wrap">
            <nav aria-label="Page navigation example">
               <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">...</a></li>
                  <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
   </section>
   <!-- blog-area-end -->
@endsection