@extends('frontend.layouts.app', ['title' => 'Blog Details - Rasalina'])

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Single Article</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                <li><img src="assets/img/icons/breadcrumb_icon02.png" alt=""></li>
                <li><img src="assets/img/icons/breadcrumb_icon03.png" alt=""></li>
                <li><img src="assets/img/icons/breadcrumb_icon04.png" alt=""></li>
                <li><img src="assets/img/icons/breadcrumb_icon05.png" alt=""></li>
                <li><img src="assets/img/icons/breadcrumb_icon06.png" alt=""></li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-details-area -->
    <section class="standard__blog blog__details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <img src="{{ $blog->blog_image ? asset($blog->blog_image) : 'N/A' }}" alt="" height="430">
                        </div>
                        <div class="blog__details__content services__details__content">
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i>
                                    {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>

                                <li><i class="fal fa-comments-alt"></i>
                                    <a href="#">Comment (
                                        {{ $blog->comments->count() ?? 'N/A' }} )</a>
                                </li>
                            </ul>
                            <h2 class="title">{{ $blog->blog_title }}</h2>
                            <p class="text-justify">{!! $blog->blog_description !!}</p>
                        </div>
                        <div class="blog__details__bottom">
                            <ul class="blog__details__tag">
                                <li class="title">Tag:</li>
                                @php
                                    $colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary', 'dark'];
                                @endphp
                                @foreach(explode(',', $blog->blog_tags) as $tag)
                                    @php
                                        // random color pick
                                        $color = $colors[array_rand($colors)];
                                    @endphp
                                    <li class="tags-list">

                                        <a class="badge bg-{{ $color }} social-icons text-light">{{ trim($tag) }}</a>
                                        {{-- <span class="badge bg-{{ $color }} p-1 my-2 social-icons">{{ trim($tag) }}</span>
                                        --}}
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="blog__details__social">
                                <li class="title">Share :</li>
                                <li class="social-icons">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog__next__prev">
                            <div class="row justify-content-between">
                                <div class="col-xl-5 col-md-6">
                                    <div class="blog__next__prev__item">
                                        <h4 class="title">Previous Post</h4>
                                        @if($prevBlog)
                                            <div class="blog__next__prev__post">
                                                <div class="blog__next__prev__thumb">
                                                    <a href="{{ route('blog-details', $prevBlog->blog_title) }}">
                                                        <img src="{{ $prevBlog->blog_image ? asset($prevBlog->blog_image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU' }}"
                                                            alt="" width="104" height="68">
                                                    </a>
                                                </div>

                                                <div class="blog__next__prev__content">
                                                    <h5 class="title">
                                                        <a href="{{ route('blog-details', $prevBlog->blog_title) }}">
                                                            {{ $prevBlog->blog_title }}
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6">
                                    
                                    <div class="blog__next__prev__item next_post text-end">
                                        <h4 class="title">Next Post</h4>
                                        @if($nextBlog)
    <div class="blog__next__prev__post">
        <div class="blog__next__prev__thumb">
            <a href="{{ route('blog-details', $nextBlog->blog_title) }}">
                <img src="{{ $nextBlog->blog_image ? asset($nextBlog->blog_image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYVjCv6r01QNNREAOWdrg1XtogAUnho3wTmtnubDkacSR7UlSWJWD7yAj5h4DU7NS9ecw&usqp=CAU' }}"
                     alt="" width="104" height="68">
            </a>
        </div>

        <div class="blog__next__prev__content">
            <h5 class="title">
                <a href="{{ route('blog-details', $nextBlog->blog_title) }}">
                    {{ $nextBlog->blog_title }}
                </a>
            </h5>
        </div>
    </div>
@endif
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- blog comment  by user and reply -->

                        <div class="comment comment__wrap">
                            <div class="comment__title">
                                <h4 class="title">( {{ $blog->comments->count() ?? 'N/A' }} ) Comment </h4>
                            </div>

                            @foreach($blog->comments as $comment)
                                    <ul class="comment__list">
                                        <li class="comment__item">
                                            <div class="comment__thumb">
                                                <img class="" src="{{ asset($comment->user->profileImage) }}" alt="" width="80"
                                                    height="80">
                                            </div>
                                            <div class="comment__content">
                                                <div class="comment__avatar__info">
                                                    <div class="info">
                                                        <h4 class="title">{{ $comment->user->name ?? 'Guest' }}</h4>
                                                        <span class="date">{{ $comment->created_at->format('d - M , Y') }}</span>
                                                    </div>
                                                    <button class="reply" onclick="toggleReplyForm({{ $comment->id }})">
                                                        <x-icon.reply />
                                                    </button>

                                                    <!-- Action menu -->
                                                    <a href="{{ route('comment-reply-remove', $comment->id) }}"
                                                        class="block w-full px-4 py-2 text-sm text-left text-white">
                                                        <x-icon.icon-remove />
                                                    </a>

                                                </div>

                                                <p>{{ $comment->comment }}</p>

                                                <!-- replay post by User -->
                                                @auth
                                                    {{-- Reply form (hidden by default) --}}
                                                    <form id="reply-form-{{ $comment->id }}" action="{{ route('comment.store') }}"
                                                        method="POST" class="mt-2" style="display:none;">
                                                        @csrf
                                                        <input type="hidden" name="post_id" value="{{ $blog->id }}">
                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                        <textarea name="comment" class="mb-2 form-control"
                                                            placeholder="Write a reply..." required></textarea>
                                                        <button class="btn btn-sm btn-success">Reply</button>
                                                    </form>
                                                @endauth
                                        </li>

                                        <!-- Show replies -->
                                        @if($comment->replies->count() > 0)
                                            @foreach($comment->replies as $reply)
                                                <li class="comment__item children">
                                                    <div class="comment__thumb">
                                                        <img src="{{ asset($reply->user->profileImage) }}" alt="" width="80" height="80">
                                                    </div>
                                                    <div class="comment__content">
                                                        <div class="comment__avatar__info">
                                                            <div class="info">
                                                                <h4 class="title">{{ $reply->user->name ?? 'Guest' }}</h4>
                                                                <span class="date">
                                                                    {{ $reply->created_at->diffForHumans() }}</span>
                                                                <p>{{ $reply->comment }}</p>

                                                                {{-- <form action="{{ route('comment-reply-remove',$reply->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" onclick="deleteConfirmation(event)"
                                                                        title="Delete Data"
                                                                        class="px-3 py-2 text-white border-0 rounded bg-danger">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form> --}}

                                                            </div>
                                                            <div class="relative inline-block">
                                                                <!-- 3-dot button -->
                                                                <button class="p-2 border-0 rounded toggleActions hover:bg-gray-200">

                                                                    <x-icon.delete />

                                                                </button>

                                                                <!-- Action menu -->
                                                                <div
                                                                    class="absolute left-0 z-10 hidden w-32 bg-white border border-gray-200 rounded-lg shadow-md actionMenu top-10">
                                                                    <button
                                                                        class="block w-full px-4 py-2 text-sm text-left hover:bg-gray-100">View</button>
                                                                    <button
                                                                        class="block w-full px-4 py-2 text-sm text-left hover:bg-gray-100">Edit</button>
                                                                    <a href="{{ route('comment-reply-remove', $reply->id) }}"
                                                                        class="block w-full px-4 py-2 text-sm text-left text-white bg-red-600 hover:bg-red-700">
                                                                        Remove</a>

                                                                    {{-- <button type="submit" onclick="deleteConfirmation(event)"
                                                                        href="{{ route('comment-reply-remove', $reply->id) }}"
                                                                        class="my-4 btn btn-danger">Remove Reply</button> --}}
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                </div>

                                </ul>
                            @endforeach
                    </div>

                    <!-- Write comment on blog -->
                    <div class="comment__form">
                        <div class="comment__title">
                            <h4 class="title">Write your comment</h4>
                        </div>
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $blog->id }}">
                            <textarea name="comment" id="message" placeholder="Enter your Massage*"></textarea>
                            <div class="form-grp checkbox-grp">
                                <input type="checkbox" id="checkbox">
                                <label for="checkbox">Save my Comment on Blog in this browser for the next time
                                    I comment.</label>
                            </div>
                            <button type="submit" class="btn">post a comment</button>
                        </form>
                    </div>
                    <!-- blog comment  by user and reply End -->

                </div>
                <!-- sidebar-->
                {{-- <x-blog-sidebar :categories="$categories" :recentBlogs="$recentBlogs" /> --}}
                {{-- <x-blog-sidebar :categories="$categories" :recentBlogs="$recentBlogs" :comments="$comments" /> --}}
                <x-blog-sidebar />
                <!-- sidebar end-->
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->

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
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form</p>
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

    <script src="https://cdn.tailwindcss.com"></script>

    <script>

        function toggleReplyForm(id) {
            const form = document.getElementById('reply-form-' + id);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        // Select all toggle buttons
        const toggleButtons = document.querySelectorAll('.toggleActions');

        // Loop through each button
        toggleButtons.forEach((btn) => {
            const menu = btn.nextElementSibling; // ধরে নিচ্ছি মেনুটা বাটনের পরেই আছে

            // show/hide menu when button clicked
            btn.addEventListener('click', (e) => {
                e.stopPropagation();

                // অন্য সব মেনু বন্ধ করো
                document.querySelectorAll('.actionMenu').forEach((m) => {
                    if (m !== menu) m.classList.add('hidden');
                });

                // বর্তমান মেনু toggle করো
                menu.classList.toggle('hidden');
            });

            // click outside to close this menu
            document.addEventListener('click', (e) => {
                if (!menu.contains(e.target) && !btn.contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });
        });

    </script>

@endsection