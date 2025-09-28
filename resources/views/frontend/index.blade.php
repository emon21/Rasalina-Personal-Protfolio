@extends('frontend.layouts.app')
@section('content')
    <!-- banner-area -->

    @include('frontend.components.banner-area')

    {{-- <x-frontend.frontend.banner-area /> --}}
    {{-- <x-frontend /> --}}
    {{-- <x-frontend.banner-area /> --}}

    {{-- <x-frontend.demo /> --}}

    <!-- banner-area-end -->

    <!-- about-area -->

    @include('frontend.components.about-area')
   

    <!-- about-area-end -->

    <!-- services-area -->

    @include('frontend.components.service-area')

    <!-- services-area-end -->

    <!-- work-process-area -->

    @include('frontend.components.work-process')

    <!-- work-process-area-end -->

    <!-- portfolio-area -->

    @include('frontend.components.protfolio-area')

    <!-- portfolio-area-end -->

    <!-- partner-area -->

    @include('frontend.components.partner-area')

    <!-- partner-area-end -->

    <!-- testimonial-area -->

    @include('frontend.components.testimonial-area')

    <!-- testimonial-area-end -->

    <!-- blog-area -->

    @include('frontend.components.blog-area')

    <!-- blog-area-end -->

    <!-- contact-area -->

    @include('frontend.components.contact-area')

    <!-- contact-area-end -->
@endsection
