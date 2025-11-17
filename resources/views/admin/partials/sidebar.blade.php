{{-- @php

$route = Route::Courent()->getName();

@endphp --}}

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
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.slider') }}" class="waves-effect">
                        <i class="ri-slideshow-3-line"></i>
                        <span>Home Slider</span>
                    </a>
                </li>

                <!-- About Page Setup -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-user-3-line"></i>
                        <span>About Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.about.page') }}">
                                <i class="ri-file-list-3-line"></i> <span>About Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all.multi.image') }}">
                                <i class="ri-image-2-line"></i> <span>All Multi Image</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.about.multi.image') }}">
                                <i class="ri-image-add-line"></i> <span>About Multi Image</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Portfolio -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-briefcase-line"></i>
                        <span>Portfolio Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.all.portfolio') }}">
                                <i class="ri-gallery-line"></i> <span>All Portfolio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.add.portfolio') }}">
                                <i class="ri-add-circle-line"></i> <span>Add Portfolio</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Category -->
                <li>
                    <a href="{{ route('admin.category.index') }}" class="waves-effect">
                        <i class="ri-folder-line"></i><span class="px-2 py-1 badge rounded-pill bg-success float-end">{{ \App\Models\Category::count() }}</span>
                        <span>Category</span>
                    </a>
                </li>
                <!-- Blog -->
                <li>
                    <a href="{{ route('admin.blog.index') }}" class="waves-effect">
                        <i class="ri-article-line"></i><span class="px-2 py-1 badge rounded-pill bg-success float-end">{{ \App\Models\Blog::count() }}</span>
                        <span>Blogs</span>
                    </a>
                </li>

                <!-- Comment -->
                <li>
                    <a href="{{ route('admin.comment') }}" class="waves-effect">
                        <i class="ri-chat-3-line"></i>
                        <span class="px-2 py-1 badge rounded-pill bg-success float-end">{{ App\Models\Comment::with('blog')->count() }}</span>
                        <span>Comment</span>
                    </a>
                </li>

                <!-- Partner -->
                <li>
                    <a href="{{ route('admin.partner') }}" class="waves-effect">
                        <i class="ri-team-line"></i>
                        <span>Partner</span>
                    </a>
                </li>

                <!-- Client -->
                <li>
                    <a href="{{ route('admin.client.index') }}" class="waves-effect">
                        <i class="ri-user-star-line"></i>
                        <span>Client</span>
                    </a>
                </li>

                <!-- Service -->
                <li>
                    <a href="{{ route('admin.service.index') }}" class="waves-effect">
                        <i class="ri-customer-service-2-line"></i><span class="px-2 py-1 badge rounded-pill bg-success float-end">{{ App\Models\Service::count() }}</span>
                        <span>Service</span>
                    </a>
                </li>

                <!-- Footer -->
                <li>
                    <a href="{{ route('admin.website-setting.footer') }}" class="waves-effect">
                        <i class="ri-global-line"></i>
                        <span>Footer</span>
                    </a>
                </li>

                <!-- Contact -->
                {{-- <li>
                    <a href="{{ route('admin.contact') }}" class="waves-effect">
                        <i class="ri-global-line"></i>
                        <span>Contact</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admin.contact') }}" class="waves-effect">
                        <i class="ri-mail-line"></i><span class="px-2 py-1 badge rounded-pill bg-success float-end">{{ App\Models\Contact::count() }}</span> <!-- or ri-contacts-line -->
                        <span>Contact</span>
                    </a>
                </li>


                <!-- Email -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html"><i class="ri-inbox-archive-line"></i> Inbox</a></li>
                        <li><a href="email-read.html"><i class="ri-mail-open-line"></i> Read Email</a></li>
                    </ul>
                </li>

                <!-- Authentication -->
                <li class="menu-title">Pages</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shield-user-line"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html"><i class="ri-login-circle-line"></i> Login</a></li>
                        <li><a href="auth-register.html"><i class="ri-user-add-line"></i> Register</a></li>
                        <li><a href="auth-recoverpw.html"><i class="ri-lock-unlock-line"></i> Recover Password</a></li>
                        <li><a href="auth-lock-screen.html"><i class="ri-lock-line"></i> Lock Screen</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>