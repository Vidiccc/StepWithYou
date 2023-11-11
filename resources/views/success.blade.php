<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
      
        <title>{{ config('app.name', 'Step With You') }}</title>
      
        {{-- @vite('resources/css/app.css') --}}
      
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
      
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
      
        <link rel="stylesheet" href="{{  asset('css/linearicons.css')}}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      
      
        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
      
        {{-- Script --}}
        <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
          integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
          crossorigin="anonymous"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/nouislider.min.js') }}"></script>
        <script src="{{ asset('js/countdown.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
        <script src="{{ asset('js/gmaps.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> --}}
      
      </head>
<body>
    <div class="container success-container d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1>
                Thank you for your purchase!
            </h1>
            <div class="">
                <i class="fa fa-check success-icon" aria-hidden="true"></i>
            </div>
            <div class="prd-bottom add-to-cart-div">
                <a href="{{ url('/') }}" class="primary-btn success-btn">Go back</a>								
            </div>
        </div>
    </div> 
</body>
</html>