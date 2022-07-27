<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="author" content="Karacoğlan">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('javascript')


    <!-- Favicon -->
    <link href="{{asset('assets')}}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    @yield('js')
</head>

<body>
@include('home._header')

<!--NavBar-->

<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            @include('home._category')

        </div>
        <div class="col-lg-9">
            @include('home._menu')
        </div>
    </div>
</div>
@section('content')

@show

@include('home._footer')


</body>

</html>
