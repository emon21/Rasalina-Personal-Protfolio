@php

    $about = App\Models\About::first();
    $MultiImage = App\Models\MultiImage::all();
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach ($MultiImage as $item)
                        <li>
                            <img class="light" src="{{ asset($item->multiImage ) }}" alt="">
                        </li>
                    @endforeach
                    {{-- <li>
                        <img class="light" src="{{ asset('frontend') }}/assets/img/icons/skeatch_light.png"
                            alt="Skeatch">
                        <img class="dark" src="{{ asset('frontend') }}/assets/img/icons/skeatch.png" alt="Skeatch">
                    </li> --}}
                    
                   
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">0110 - About me</span>
                        <h2 class="title">{{ $about->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend') }}/assets/img/icons/about_icon.png" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $about->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc">{{$about->short_description}}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>