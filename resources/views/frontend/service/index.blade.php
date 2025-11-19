@extends('frontend.layouts.app', ['title' => 'Service - Rasalina'])

@section('content')

   <!-- breadcrumb-area -->
   <section class="breadcrumb__wrap">
      <div class="container custom-container">
         <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
               <div class="breadcrumb__wrap__content">
                  <h2 class="title">Our Service</h2>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">service</li>
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

   <!-- services-area -->
   <section class="standard__blog">
      <div class="container">
         <div class="row">
            <div class="col-lg-8">
               @foreach ($services as $service)
                  <div class="standard__blog__post">
                     <div class="standard__blog__thumb">
                        <a href="{{ route('service.details', $service->title) }}">
                           <img
                              src="{{ ($service->picture) ? asset('uploads/service/' . $service->picture) : asset('uploads/no_image.jpg') }}"
                              alt="" width="850" height="450">
                        </a>
                        <a href="{{ route('service.details', $service->title) }}" class="blog__link"><i
                              class="far fa-long-arrow-right"></i></a>
                     </div>
                     <div class="standard__blog__content">
                        <h2 class="title"><a href="{{ route('service.details', $service->title) }}">
                           {{ Str::title(str_replace('-', ' ', $service->title)) }}</a></h2>
                        <p>{!! $service->short_description !!}</p>
                        <ul class="blog__post__meta">
                           <li><i class="fal fa-calendar-alt"></i>
                              {{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}</li>
                        </ul>
                     </div>
                  </div>
               @endforeach

               <!-- pagination -->
               <div class="pagination-wrap">

                  {{ $services->links('vendor/pagination/custom') }}

               </div>

            </div>

         <!-- sidebar-->
         
         {{-- <x-frontend.components.service-sidebar/> --}}
         @include('frontend.components.service-sidebar')

         <!-- sidebar end-->

         </div>
      </div>
   </section>
   <!-- services-area-end -->

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
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form</p>
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