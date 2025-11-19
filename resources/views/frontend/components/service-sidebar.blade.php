 @php

$services = App\Models\Service::latest()->get();

@endphp

 <div class="col-lg-4">
               <aside class="blog__sidebar">
                  <div class="widget">
                     <form action="#" class="search-form">
                        <input type="text" placeholder="Search">
                        <button type="submit"><i class="fal fa-search"></i></button>
                     </form>
                  </div>
                  <div class="widget">
                     <h4 class="widget-title">Recent Service</h4>
                     <ul class="rc__post">
                        @foreach ($services as $service)
                           <li class="rc__post__item">
                              <div class="rc__post__thumb">
                                 <img src="{{ ($service->picture) ? asset('uploads/service/' . $service->picture) : asset('uploads/no_image.jpg') }}" width="90" height="90" alt="">
                              </div>
                              <div class="rc__post__content">
                                 <h5 class="title">
                                    <a href="{{ route('service.details', $service->title) }}">{{ ucwords(str_replace('-', ' ', $service->title))  }}</a>
                                 </h5>
                                 <span class="post-date"><i class="fal fa-calendar-alt"></i>
                                    {{ Carbon\Carbon::parse($service->created_at)->format('d M Y') }},{{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}</span>
                              </div>
                           </li>
                        @endforeach

                     </ul>
                  </div>
               </aside>
            </div>