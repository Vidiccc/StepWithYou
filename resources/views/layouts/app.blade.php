<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
  <div id="app">
    <!-- Start Header Area -->
    <header class="header_area sticky-header">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{ url('/') }}">
              <img class="logo-img" src="{{ asset('img/logo_swy.png') }}" alt="">
            </a>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Products</a></li>

                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                  <a href="{{ route('login') }}" class="nav-link text-gray-500 hover:text-gray-700">Login</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                  <a href="{{ route('register') }}" class="nav-link text-gray-500 hover:text-gray-700">Register</a>
                </li>
                @endif
                @else
                <li class="dropdown nav-item">
                  <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}" class="dropdown-toggle nav-link text-gray-700 font-semibold hover:text-gray-800"
                    role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </a>

                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li class="px-4 py-2 text-sm text-gray-700">
                      <a href="{{ route('logout') }}" class="nav-user"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                      </a>


                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                    <li class="px-4 py-2 text-sm text-gray-700">
                      {{-- <a class="nav-link" href="{{ url('user') }}">About</a> --}}
                      <a a class="nav-user" href="{{ route('user.show', ['id' => Auth::user()->id]) }}">View Profile</a>
                      {{--
                    <li class="nav-item"><a class="nav-link" href="{{ url('user') }}">About</a></li> --}}
                    {{-- <form id="logout-form" action="{{ route('user') }}" method="POST" class="d-none">
                      @csrf
                    </form> --}}
                </li>

              </ul>
              </li>
              @endguest
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a href="{{ url('/cart') }}" class="cart"><span class="ti-bag"></span></a></li>
                {{-- <li class="nav-item">
                  <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                </li> --}}
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="search_input" id="search_input_box">
        <div class="container">
          <form class="d-flex justify-content-between">
            <input type="text" class="form-control" id="search_input" placeholder="Search Here">
            <button type="submit" class="btn"></button>
            <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
          </form>
        </div>
      </div>
      @if (session('success'))
      <div class="container">

        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      </div>
      @endif
    </header>
    <!-- End Header Area -->

    <main>
      {{-- @yield('content-with-banner') --}}
      @yield('content')
    </main>
  </div>

  <!-- start footer Area -->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
              Celebrate your unique style and embrace unmatched comfort with 'Step with You,' 
              where your every step is a statement of confidence and elegance in fashionable footwear.
            </p>
          </div>
        </div>
        <div class="col-lg-5  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>Stay update with our latest</p>
            <div class="" id="mc_embed_signup">

              <form target="_blank" novalidate="true"
                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="form-inline">

                <div class="d-flex flex-row">

                  <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Email '" required="" type="email">


                  <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                      aria-hidden="true"></i></button>
                  <div style="position: absolute; left: -5000px;">
                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                  </div>

                  <!-- <div class="col-lg-4 col-md-4">
                          <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                        </div>  -->
                </div>
                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Follow Us</h6>
            <p>Let us be social</p>
            <div class="footer-social d-flex align-items-center justify-content-between">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-youtube-play"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
        <p class="footer-text m-0">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;
          <script>document.write(new Date().getFullYear());</script> All rights reserved | This project is made with <i
            class="fa fa-heart-o" aria-hidden="true"></i> by Khang Vĩ & Quốc Trí
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>
  </footer>
  <!-- End footer Area -->

</body>

<script>
  // Wait for the page to fully load
  document.addEventListener("DOMContentLoaded", function () {
      // Set a timeout for the flash message removal
      setTimeout(function () {
          var alert = document.querySelector(".alert"); // Replace with the appropriate selector for your flash message container
          if (alert) {
              alert.remove(); // Remove the flash message
          }
      }, 2500); // Adjust the timeout (in milliseconds) to the desired duration
  });
</script>


</html>