
@extends('frontend.layouts.app', ['title' => 'Service Details - Rasalina'])
@section('content')
   <!-- breadcrumb-area -->
   <section class="breadcrumb__wrap">
      <div class="container custom-container">
         <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
               <div class="breadcrumb__wrap__content">
                  <h2 class="title">Services Details</h2>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
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

   <!-- services-details-area -->

   <section class="services__details">
      <div class="container">
         <div class="row">
            <div class="col-lg-8">
               <div class="services__details__thumb">
                  <img
                     src="{{ ($service->picture) ? asset('uploads/service/' . $service->picture) : asset('uploads/no_image.jpg') }}"
                     alt="" class="mt-2 rounded img-fluid" width="850" height="450">
               </div>
               <div class="services__details__content">
                  <h2 class="title">{{ Str::title(str_replace('-', ' ', $service->title)) }}</h2>
                  <p>{!! $service->short_description !!}</p>
                  <p>{!! $service->long_description !!}</p>
               </div>
            </div>
            
            <!-- sidebar-->
         @include('frontend.components.service-sidebar')
         <!-- sidebar end-->
         </div>
      </div>
   </section>
   <!-- services-details-area-end -->


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