<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" type="image/png" href="{{ asset('images/icons/logo.png') }}" />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/themify/themify-icons.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lightbox2/css/lightbox.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body>
<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
            <div class="wrap_header trans-0-3">
                <!-- Logo -->
                <div class="logo">
                    @guest
                        <a href="/">
                            @endguest
                    @auth
                    <a href="/home">
                        @endauth
                        <img src="{{ asset('images/icons/logo.png') }}" alt="IMG-LOGO" data-logofixed="{{ asset('images/icons/logo.png') }}">
                    </a>
                </div>

                <!-- Menu -->
                <div class="wrap_menu p-l-45 p-l-0-xl">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li>
                                <a href="/home">Home</a>
                            </li>

                            <li>
                                <a href="/menu">Menu</a>
                            </li>

                            <li>
                        </ul>
                    </nav>
                </div>

                <!-- Social -->
                <div class="social flex-w flex-l-m p-r-20">
                    @guest
                        <a href="{{ route('login') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/littlegrasscafe/"><i class="fa fa-facebook m-l-21" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/Littlegrass_/"><i class="fa fa-instagram m-l-21" aria-hidden="true"></i></a>
                    @endguest

                    @auth
                        <div class="dropdown">
                            <a href="#" ><i class="fa fa-user m-l-21" aria-hidden="true"></i> Hi, {{ Auth::user()->fname() }}</a>
                            <div id="profileDrop" class="dropdown-content">
                                <a href="/profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                            </div>
                        </div>
                            <a href="#" onclick="event.preventDefault()" ><i class="fa fa-money m-l-21" aria-hidden="true"></i> Rp {{ Auth::user()->balance() }}</a>
                        <div id="cart" class="dropdown">
                            @include('cart')
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth

                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Sidebar -->
<aside class="sidebar trans-0-4">
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <!-- - -->
    <ul class="menu-sidebar p-t-95 p-b-70">
        <li class="t-center m-b-13">
            <a href="/home" class="txt19">Home</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/menu" class="txt19">Menu</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/gallery" class="txt19">Gallery</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/about" class="txt19">About</a>
        </li>

        <li class="t-center m-b-33">
            <a href="/contact" class="txt19">Contact</a>
        </li>
    </ul>

    <!-- - -->
    <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
        <!-- - -->
        <h4 class="txt20 m-b-33">
            Gallery
        </h4>

        <!-- Gallery -->
        <div class="wrap-gallery-sidebar flex-w">
            @foreach($gallery as $pro)
                <a class="item-gallery-sidebar wrap-pic-w" href="{{ asset('images')}}/{{$pro->image}}" data-lightbox="gallery-footer">
                    <img src="{{ asset('images')}}/{{$pro->image}}" alt="GALLERY">
                </a>
                @endforeach
        </div>
    </div>
</aside>
            @yield('content')
<!-- Footer -->
<footer class="bg1">
    <div class="container p-t-40 p-b-70">
        <div class="row">
            <div class="col-sm-6 col-md-8 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-33">
                    Contact Us
                </h4>

                <ul class="m-b-70">
                    <li class="txt14 m-b-14">
                        <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        Jl.A.Yani no.93,sebelah barat Badilan Store,ruko kedua sebelah XL Centre
                        81116 Singaraja
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i> 0878-6317-7526
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
                        <a href="https://m.me/littlegrasscafe" class="__cf_email__" data-cfemail="4a2925243e2b293e0a39233e2f64292527">[Messenger]</a>
                    </li>
                </ul>

                <!-- - -->
                <h4 class="txt13 m-b-32">
                    Opening Times
                </h4>

                <ul>
                    <li class="txt14">
                        10:30 AM - 10:30 PM WIT
                    </li>

                    <li class="txt14">
                        Every Day
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-38">
                    Gallery
                </h4>

                <!-- Gallery footer -->
                <div class="wrap-gallery-footer flex-w">
                    @foreach($gallery as $pro)
                        <a class="item-gallery-sidebar wrap-pic-w" href="{{ asset('images')}}/{{$pro->image}}" data-lightbox="gallery-footer">
                            <img src="{{ asset('images')}}/{{$pro->image}}" alt="GALLERY">
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="end-footer bg2">
        <div class="container">
            <div class="flex-sb-m flex-w p-t-22 p-b-22">
                <div class="p-t-5 p-b-5">
                    <a href="https://www.facebook.com/littlegrasscafe/" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/Littlegrass_/" class="fs-15 c-white"><i class="fa fa-instagram m-l-18" aria-hidden="true"></i></a>
                </div>

                <div class="txt17 p-r-20 p-t-5 p-b-5">
                    @ 2018 LittleGrass.
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
</div>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('assets/jquery/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/SweetAlert.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/SmoothScroll.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('assets/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('assets/daterangepicker/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('assets/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('assets/parallax100/parallax100.js') }}"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('assets/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('assets/lightbox2/js/lightbox.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/main.js') }}"></script>
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('#dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<script>
    $(document).ready(function(){

        <!-- deletefromCart -->

        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            $.ajax({
                url:'{{route('deletefromcart')}}',
                data: {id:id},
                success:function (data) {
                    $('#cart').html(data);
                }
            });
        });

        <!-- addtocart -->

        $(document).on('click', '.addtocart', function () {
            var id = $(this).attr('id');
            $.ajax({
                url:'{{route('addtocart')}}',
                data: {id:id},
                success:function (data) {
                    swal("Success!", "Your product added to cart!", "success");
                    $('#cart').html(data);
                }
            });
        });



        <!-- Pagination -->
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $.ajax({
                url:"/home/fetch_data?page="+page,
                success:function (data) {
                    $('#fetch_product').html(data);
                }
            });

        }


        <!-- SearchBox -->

        function fetch_product_name(query = '') {
            $.ajax({
                url:"{{route('live_search.action')}}",
                data:{query:query},
                success:function (data) {
                    $('#fetch_product').html(data);
                }
            });
        }

        $(document).on('keyup', '#searchBox', function () {
            var query = $('#searchBox').val();
            fetch_product_name(query);
        });

        <!-- Categories -->

        function fetch_product_cat(query = '') {
            $.ajax({
                url:"/home/categories",
                data:{query:query},
                success:function (data) {
                    $('#fetch_product').html(data);
                }
            });
        }

        $(document).on('click', '.cat', function () {
            event.preventDefault();
            var query = $(this).attr('id');
            fetch_product_cat(query);
        });

    });
</script>
<script>
    $(".password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });
    $(".confirm").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        var x = document.getElementById("password-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });
</script>
{{$script = session('swal') ?? ''}}
{!!html_entity_decode($script)!!}
</body>
</html>
