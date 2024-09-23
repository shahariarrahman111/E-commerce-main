<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta -->
    <meta name="description"
        content="Grostore Grocery eCommerce html template. Multivendor responsive eCommerce template">
    <meta name="author" content="ThemeTags">
    <meta name="keywords"
        content="Grostore Grocery ecommerce, admin template, online shop, e-commerce, ecommerce template, marketplace, modern, responsive, business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/png" sizes="16x16">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM5Ddb58J2A4nUQ4jc8HfZZshU5OZl+lwq1lUhX" crossorigin="anonymous">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fontawesome/css/all.min.css') }}">


    <!-- Title -->
    <title>Medicine Store</title>

    <!-- Build:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo1/main.css') }}">
    <!-- Endbuild -->

</head>

<body>

    <!-- Preloader start -->
    <!-- <div id="preloader">
        <img src="{{ asset('backend/assets/images/preloader.gif') }}" alt="preloader" width="450" class="img-fluid">
    </div> -->
    <!-- Preloader end -->

    <div class="main-wrapper">



        @include('layouts.component.header')

        @yield('layouts')

        <!-- Footer -->
        @include('layouts.component.footer')



        

    </div>

    <!-- Scroll bottom to top button start -->
    <button class="scroll-top-btn">
        <i class="far fa-hand-pointer"></i>
    </button>
    <!-- Scroll bottom to top button end -->

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="{{ asset('backend/assets/fontawesome/js/all.js') }}"></script>
    <!-- Your other JS files -->




    <!-- Include cart.js file -->
    <script src="{{ asset('backend/assets/cart.js') }}"></script>


    <!-- Build:js -->
    <script src="{{ asset('backend/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/parallax-scroll.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/isotop.pkgd.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/countdown.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/range-slider.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/waypoints.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/counterup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/typer.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <!-- Endbuild -->
</body>

</html>