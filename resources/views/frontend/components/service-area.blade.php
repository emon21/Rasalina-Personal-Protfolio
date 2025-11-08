@php

$services = App\Models\Service::latest()->get();
    
@endphp
<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my Services</span>
                        <h2 class="title">Creates amazing digital experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">
            @foreach($services as $service)
                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb">
                            <a href="{{ route('services-details', $service) }}">
                                <img src="{{ ($service->picture) ? asset('uploads/service/' . $service->picture) : asset('uploads/no_image.jpg') }}" alt="" class="mt-2 rounded img-fluid" width="180" height="80">
                            </a>
                        </div>
                        <div class="services__content">
                            <h3 class="title"><a href="{{ route('services-details', $service) }}">{{ $service->title }}</a></h3>
                            <p>{!! $service->short_description !!}</p>
                            <a href="{{ route('services-details', $service) }}" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach         
            
        </div>
    </div>
</section>
