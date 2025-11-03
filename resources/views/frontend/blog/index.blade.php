@extends('frontend.layouts.app')

@section('content')
    <!-- breadcrumb-area -->
                <section class="breadcrumb__wrap">
                    <div class="container custom-container">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-8 col-md-10">
                                <div class="breadcrumb__wrap__content">
                                    <h2 class="title">Recent Article</h2>
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
                        <div class="row">
                            <div class="col-lg-8">
                                @foreach ($blogs as $blog)
                                    <div class="standard__blog__post">
                                        <div class="standard__blog__thumb">
                                            <a href="blog-details.html"><img src="{{ $blog->blog_image ? asset($blog->blog_image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU' }}" alt=""></a>
                                            <a href="{{route('blog-details',$blog)}}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                                        </div>
                                        <div class="standard__blog__content">
                                            <div class="blog__post__avatar">
                                                <div class="thumb"><img src="{{ $blog->blog_image ? asset($blog->blog_image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU' }}" alt=""></div>
                                                <span class="post__by">By : <a href="#">Halina Spond</a></span>
                                            </div>
                                            <h2 class="title"><a href="{{route('blog-details',$blog)}}">{{ $blog->blog_title }}</a></h2>
                                            <p>{{$blog->blog_description}}</p>
                                            <ul class="blog__post__meta">
                                                <li><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
                                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                                <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="pagination-wrap">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                                            <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            
                            <!-- sidebar-->
                        <x-blog-sidebar 
                            :categories="$categories" 
                            :recentBlogs="$recentBlogs" 
                        />
                        <!-- sidebar end-->
                        
                        </div>
                    </div>
                </section>
                <!-- blog-area-end -->


                <!-- contact-area -->
                <section class="homeContact homeContact__style__two">
                    <div class="container">
                        <div class="homeContact__wrap">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section__title">
                                        <span class="sub-title">07 - Say hello</span>
                                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                    </div>
                                    <div class="homeContact__content">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                        <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="homeContact__form">
                                        <form action="#">
                                            <input type="text" placeholder="Enter name*">
                                            <input type="email" placeholder="Enter mail*">
                                            <input type="number" placeholder="Enter number*">
                                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                                            <button type="submit">Send Message</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- contact-area-end -->
@endsection