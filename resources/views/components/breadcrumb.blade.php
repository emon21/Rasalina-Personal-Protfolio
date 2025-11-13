<div class="col-xl-6 col-lg-8 col-md-10">
   <div class="breadcrumb__wrap__content">
      <h2 class="title">{{ $title ?? 'Page Title' }}</h2>
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               {{ $current ?? $title ?? 'Current Page' }}
            </li>
         </ol>
      </nav>
   </div>
</div>