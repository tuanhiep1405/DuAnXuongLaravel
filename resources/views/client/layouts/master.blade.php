<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from rstheme.com/products/html/news24/news-magazine/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Sep 2024 09:27:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Darpan | Home</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    @include('client.layouts.partials.css')
    <!-- modernizr js -->

</head>

<body class="home">
    <!--Preloader area Start here-->
    <!-- <div class="preloader">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div> -->
    <!--Preloader area end here-->

    <!--Header area start here-->
    <header>
        @include('client.layouts.partials.header-top')
        @include('client.layouts.partials.header-nav')

       
      
    </header>

    @yield('content')
    <footer>
        @include('client.layouts.partials.footer')

    </footer>



</body>


@include('client.layouts.partials.js')


<!-- Mirrored from rstheme.com/products/html/news24/news-magazine/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Sep 2024 09:28:12 GMT -->

</html>
