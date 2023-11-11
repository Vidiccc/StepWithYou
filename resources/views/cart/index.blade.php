<!DOCTYPE html>
<html>
<head>
    <title>Step With Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- CSS -->
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

    <!-- Script -->
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
</head>
<body>
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
                <a href="#" class="dropdown-toggle nav-link text-gray-700 font-semibold hover:text-gray-800"
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
</header>
<!-- End Header Area -->
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
<!-- <div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ $details['image'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
  
<br/>
<div class="container">
  
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif

    
    @if(session('cart'))
    
    

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset(''. $details['image']) }}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach

                
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right ">
                    <div class="d-flex justify-content-between">

                        <a href="{{ url('/products') }}" class="my-1 btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        <form action="/session" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button class="my-1 btn btn-primary" type="submit" id="checkout-live-button">Checkout</button>
                        </form>
                    </div>
                    
                </td>
            </tr>
        </tfoot>
    </table>
    
    @else
        <div class="container text-center">
            <h1 class="">Your cart is empty</h1>
            <h3>Don't hesitate, we have good deals for you!</h3>
            <section class="lattest-product-area pb-40 category-list">
					
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-6">
                        
                        <div class="single-product">
                            <a href="{{ route('productInfo', ['id' => $product->id]) }}">
                                <img class="img-fluid product-img" src="{{ asset(''.$product->imageURL) }}" alt="{{ $product->pname }}">
                            </a>
                            <div class="product-details">
                                <a href="{{ route('productInfo', ['id' => $product->id]) }}">
                                    <h6>{{ $product->pname }}
                                    </h6>
                                </a>
                                
                                <div class="price">
                                    <h6>{{ $product->price }}</h6>
                                </div>
                                <div class="prd-bottom add-to-cart-div">
                                    <a href="{{ route('add.to.cart', $product->id) }}" class="primary-btn add-to-cart-btn">Add to bag</a>									
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            <a href="{{ url('/products') }}" class="mb-4 btn btn-warning"><i class="fa fa-angle-left"></i> Browse More Products</a>
        </div>
        
    @endif
      
    
    
</div>

<!-- start footer Area -->
<footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              dolore
              magna aliqua.
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
  
<script type="text/javascript">
      
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

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

     
</body>
</html>