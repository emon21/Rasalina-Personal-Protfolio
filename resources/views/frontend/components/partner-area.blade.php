@php

$partner = App\Models\Partner::with('images')->first();
@endphp
<section class="partner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="partner__logo__wrap">
                        @foreach ($partner->images as $image)
                            <li>
                                <img class="light" src="{{ asset($image->file) }}"
                                    alt="">
                            </li>
                        @endforeach

                        {{-- <li>
                            <img class="light" src="{{ asset('frontend') }}/assets/img/icons/partner_light02.png"
                                alt="">
                            <img class="dark" src="{{ asset('frontend') }}/assets/img/icons/partner_02.png"
                                alt="">
                        </li>
                        <li>
                            <img class="light" src="{{ asset('frontend') }}/assets/img/icons/partner_light03.png"
                                alt="">
                            <img class="dark" src="{{ asset('frontend') }}/assets/img/icons/partner_03.png"
                                alt="">
                        </li>
                        <li>
                            <img class="light" src="{{ asset('frontend') }}/assets/img/icons/partner_light04.png"
                                alt="">
                            <img class="dark" src="{{ asset('frontend') }}/assets/img/icons/partner_04.png"
                                alt="">
                        </li>
                        <li>
                            <img class="light" src="{{ asset('frontend') }}/assets/img/icons/partner_light05.png"
                                alt="">
                            <img class="dark" src="{{ asset('frontend') }}/assets/img/icons/partner_05.png"
                                alt="">
                        </li>
                        <li>
                            <img class="light" src="{{ asset('frontend') }}/assets/img/icons/partner_light06.png"
                                alt="">
                            <img class="dark" src="{{ asset('frontend') }}/assets/img/icons/partner_06.png"
                                alt="">
                        </li> --}}
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="partner__content">
                        <div class="section__title">
                            <span class="sub-title">05 - partners</span>
                            <h2 class="title">{{ $partner->title }}</h2>
                        </div>
                        <p>{{ $partner->short_description }}</p>
                        <a href="contact.html" class="btn">Start a conversation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
