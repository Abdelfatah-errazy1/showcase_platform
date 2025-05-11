@extends('layouts.clients.client')

@section('content')
<div id="about" class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <a href="{{ route('home') }}">
                        <img class="img-fluid position-absolute " src="{{ asset('images/ezd.png') }}" alt="" style="object-fit: cover;">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-success pe-3">About Us</h6>
                <h1 class="mb-4">Welcome to <span class="text-success">EZD</span></h1>
                <p class="mb-4">Discover the captivating world of <span class="text-success">EZD</span>, where the passion for blogging meets web development services.
                  Dive into informative articles, programming tips, and in-depth analyses.</p>
                <p class="mb-4">Our platform provides a dedicated space for knowledge exchange and expertise, ideal for exploring the latest technology trends.
                  Along with our enriching blog, take advantage of professional web development services.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-success mr-2 me-2"></i>Blogging</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-success mr-2 me-2"></i>Website Development</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-success mr-2 me-2"></i>Website Maintenance</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-success mr-2 me-2"></i>Web Development Consultation</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-success mr-2 me-2"></i>Mobile App Development</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-success mr-2 me-2"></i>24/7 Service</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
