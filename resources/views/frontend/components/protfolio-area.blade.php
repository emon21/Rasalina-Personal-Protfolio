@php

$portfolio = App\Models\Portfolio::all();
$portfoliosByCategory = $portfolio->groupBy('portfolio_name');

@endphp


<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center section__title">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    {{-- All Tab --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>

                    {{-- Dynamic Category Tabs --}}
                    @foreach ($portfolio as $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="{{ Str::slug($item->portfolio_name) }}-tab" data-bs-toggle="tab"
                                data-bs-target="#{{ Str::slug($item->portfolio_name) }}" type="button" role="tab"
                                aria-controls="{{ Str::slug($item->portfolio_name) }}"
                                aria-selected="false">{{ $item->portfolio_name }}</button>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>


    <div class="tab-content" id="portfolioTabContent">

        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
                            @foreach ($portfolio as $item)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset($item->portfolio_image) }}" style="height: 520px;width:100%"
                                            alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ $item->portfolio_name }}</span>
                                        <h4 class="title"><a href="{{ route('portfolio.details', $item->portfolio_title) }}">{{ $item->portfolio_title }}</a>
                                        </h4>                                    <a href="{{ route('portfolio.details', $item->portfolio_title) }}" class="link">Case Study</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dynamic Category Tab Contents --}}
        @foreach ($portfoliosByCategory as $category => $items)
            <div class="tab-pane" id="{{ Str::slug($item->portfolio_name) }}" role="tabpanel"
                aria-labelledby="{{ Str::slug($item->portfolio_name) }}-tab">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        <div class="col">
                            <div class="portfolio__active">
                                @foreach ($items as $item)
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{ asset($item->portfolio_image) }}"
                                                style="height: 520px; width: 100%; object-fit: cover;"
                                                alt="{{ $item->portfolio_title }}">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>{{ $item->portfolio_name }}</span>
                                            <h4 class="title">
                                                <a href="{{ route('portfolio.details', $item->id) }}">
                                                    {{ $item->portfolio_title }}
                                                </a>
                                            </h4>
                                            <a href="{{ route('portfolio.details', $item->id) }}" class="link">Case Study</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>