<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="mt-3 text-center user-profile">
            <div class="">
                <img @if (Auth::user()->profileImage == null) src="{{ asset('uploads') }}/no_image.jpg" @else
                src="{{ asset(Auth::user()->profileImage) }}" @endif alt="" class="avatar-md rounded-circle"
                    width="240">
            </div>
            <div class="mt-3">
                <h4 class="mb-1 font-size-16">Hi, {{ Auth::user()->name }}</h4>
                <span class="text-muted"><i class="align-middle ri-record-circle-line font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('home.slider') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Home Slider</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>About Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('about.page') }}" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>About Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('all.multi.image') }}" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>All Multi Image</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about.multi.image') }}" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>About Multi Image</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Portfolio Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.portfolio') }}" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>All Portfolio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('add.portfolio') }}" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>Add Portfolio</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Blog Page Setup -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Blog Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="#" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>All Blog</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>Add Blog</span>
                            </a>
                        </li>
                        <hr>
                        {{-- blog-category route --}}
                        <li>
                            <a href="{{ route('all.blog.category') }}" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>Blog Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="align-top waves-effect d-flex">
                                <i class="dripicons-minus"></i>
                                <span>Blog Tag</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Category Menu -->
                <li>
                    <a href="{{ route('admin.category.index') }}" class="align-top waves-effect d-flex">
                        <i class="ri-layout-3-line"></i>
                        <span>Category ( {{\App\Models\Category::count() }} )</span>
                    </a>
                </li>
                <!-- Category Menu end -->
                
                <!-- Blog Menu -->
                <li>
                    <a href="{{ route('admin.blog.index') }}" class="align-top waves-effect d-flex">
                        <i class="ri-layout-3-line"></i>
                        <span>Blogs ( {{ \App\Models\Blog::count() }} )</span>
                    </a>
                </li>
                <!-- Blog Menu end -->
                
                <!-- Comment Menu -->
                <li>
                    <a href="{{ route('admin.comment') }}" class="align-top waves-effect d-flex">
                        <i class="ri-layout-3-line"></i>
                        {{-- {{ $blog->comments->count() }} --}}
                        <span>Comment ( {{ App\Models\Comment::with('blog')->count() }} )</span>
                    </a>
                </li>

                <!-- Comment Menu end -->
                <li>
                    <a href="{{ route('admin.partner') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Partner</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.client.index') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Client</span>
                    </a>
                </li>
                
                 <li>
                    <a href="{{ route('admin.service.index') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Service</span>
                    </a>
                </li>
                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">Inbox</a></li>
                        <li><a href="email-read.html">Read Email</a></li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html">Login</a></li>
                        <li><a href="auth-register.html">Register</a></li>
                        <li><a href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>