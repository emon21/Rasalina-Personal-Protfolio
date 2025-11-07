@php

    $clients = App\Models\Client::with('user')->get();
    // $partner = App\Models\Partner::with('images')->first();

@endphp

<section class="testimonial">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 order-0 order-lg-2">
                    <ul class="testimonial__avatar__img">
                        <li><img src="{{ asset('frontend') }}/assets/img/images/testi_img01.png" alt=""></li>
                        <li><img src="{{ asset('frontend') }}/assets/img/images/testi_img02.png" alt=""></li>
                        <li><img src="{{ asset('frontend') }}/assets/img/images/testi_img03.png" alt=""></li>
                        <li><img src="{{ asset('frontend') }}/assets/img/images/testi_img04.png" alt=""></li>
                        <li><img src="{{ asset('frontend') }}/assets/img/images/testi_img05.png" alt=""></li>
                        <li><img src="{{ asset('frontend') }}/assets/img/images/testi_img06.png" alt=""></li>
                        <li><img src="{{ asset('frontend') }}/assets/img/images/testi_img07.png" alt=""></li>
                    </ul>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonial__wrap">
                        <div class="section__title">
                            <span class="sub-title">06 - Client Feedback</span>
                            <h2 class="title">Happy clients feedback</h2>
                        </div>
                        <div class="testimonial__active">

                            @foreach($clients as $client)
                                <div class="testimonial__item">
                                    <div class="testimonial__icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial__content">
                                        <p>{{ $client->message }}</p>
                                        <div class="testimonial__avatar">
                                            <span>{{ $client->user->name ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="testimonial__arrow"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>