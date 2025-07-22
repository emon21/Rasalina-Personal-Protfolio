<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- This is a demo page for the Laravel application. -->
    <!-- bootstrap 5 cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- end of bootstrap 5 cdn link -->

</head>

<body>

    @include('partials.navbar')
     @yield('content')

    {{-- <div class="container">
       <div class="row">
          <div class="col-md-12">
              
               </div>
            </div>
            <!-- Footer content -->
            <footer class="text-center py-4">
                <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
            </footer>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
