<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Essential Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ezdpro">

    <!-- Conditional Meta Tags for Home Page -->
    @if (request()->routeIs('home'))
        <meta name="google-site-verification" content="ygvWkfiJeD7wJVGjJ2hrvA26IyKU_ctkUIK4gOq7O0o">
        <meta name="description" content="@yield('meta_description', 'Welcome to EZD, your go-to platform for engaging blog content designed to inspire and inform. We cover a wide range of topics, including technology, digital marketing, personal development, and strategies to grow your online presence. Whether you are an aspiring entrepreneur or a seasoned professional, our expertly curated articles will help you learn, grow, and earn. Join our community today and take the next step in your journey toward success')">
        <meta name="keywords" content="@yield('meta_keywords', 'ezdpro,ezd,EZD,Blogging, Online earning, Digital marketing, Technology trends, SEO strategies, Content creation, Passive income, Website monetization, Affiliate marketing, Entrepreneurship, Freelancing tips, Social media growth')">
    @else
        @yield('meta')
    @endif

    <!-- Title and Favicon -->
    <title>@yield('title', 'EZD')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ezd.png') }}">

    <!-- Preload critical assets -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito+Sans:700|Nunito:300,600" as="style">
    <link rel="preload" href="{{ asset('web/style.css') }}" as="style">
    <link rel="preload" href="{{ asset('web/bootstrap.min.css') }}" as="style">
    
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtm.js?id=GTM-TZXCCP4H"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-YYKE47JQR5');
    </script>

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YYKE47JQR5"></script>

<!-- Google AdSense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6943287534430462" crossorigin="anonymous"></script>
<script src="{{ asset('assets/home-page/js/jquery.min.js') }}" ></script>

<!-- Stylesheets -->
<link rel="stylesheet" href="{{ asset('web/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('web/login.css') }}">
<link rel="stylesheet" href="{{ asset('web/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" media="print" onload="this.media='all'">

   
  </head>

  <body>

    <!-- Header -->
    @include('layouts.clients.includes._header')
    <!-- /Header -->
    
   @yield('content')

    @include('layouts.clients.includes._footer')

    <!-- SweetAlert and Custom Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" async></script>
    <x-alert :message="session('error')" type="error" />
    <x-alert :message="session('success')" type="success" />
    <x-alert :message="session('warning')" type="warning" />

    <!-- jQuery and Bootstrap JS (Load at the bottom for performance) -->
    <script src="{{ asset('assets/home-page/js/jquery.min.js') }}" async></script>
    <script src="{{ asset('assets/home-page/js/bootstrap.min.js') }}" async></script>
    <script src="{{ asset('web/js.js') }}" async></script>
    @yield('scripts')
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TZXCCP4H" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

  </body>
</html>
