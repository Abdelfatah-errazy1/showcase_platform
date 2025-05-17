<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ezdpro">

    @if (request()->routeIs('home'))
      <meta name="description" content="@yield('meta_description', 'Welcome to EZD, your go-to platform for engaging blog content designed to inspire and inform. We cover a wide range of topics, including technology, digital marketing, personal development, and strategies to grow your online presence. Whether you are an aspiring entrepreneur or a seasoned professional, our expertly curated articles will help you learn, grow, and earn. Join our community today and take the next step in your journey toward success')">
      <meta name="keywords" content="@yield('meta_keywords', 'ezdpro,ezd,EZD,Blogging, Online earning, Digital marketing, Technology trends, SEO strategies, Content creation, Passive income, Website monetization, Affiliate marketing, Entrepreneurship, Freelancing tips, Social media growth')">
    @else
      @yield('meta')
    @endif

    <title>@yield('title', 'EZD')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/ezd.png') }}">

    <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito+Sans:700|Nunito:300,600" as="style">
    <link rel="preload" href="{{ asset('web/style.css') }}" as="style">
    <link rel="preload" href="{{ asset('web/bootstrap.min.css') }}" as="style">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('web/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/btn.css') }}">
    <link rel="stylesheet" href="{{ asset('web/login.css') }}">
    <link rel="stylesheet" href="{{ asset('web/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" media="print" onload="this.media='all'">

    <script src="{{ asset('web/bootstrap.min.js') }}" ></script>
  </head>

  <body>
    @include('layouts.clients.includes._header')
    
    @yield('content')

    @include('layouts.clients.includes._footer')

    <script src="{{ asset('web/jquery.js') }}"></script>
    <script src="{{ asset('web/js.js') }}" async></script>
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" async></script>

    <x-alert :message="session('error')" type="error" />
    <x-alert :message="session('success')" type="success" />
    <x-alert :message="session('warning')" type="warning" />
  </body>
</html>
