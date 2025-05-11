@extends('layouts.clients.client')
@section('content')
<section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="wrap d-md-flex">
            <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
              <div class="text w-100">
              <div class="icon"><img src="{{asset('images/ezd.png')}}"></div>
              {{-- <h2>EZD </h2> --}}
              <p>Already have an account?</p>
              <a href="{{ route('sessions.create')}}" class="btn btn-white btn-outline-white">Sign In</a>
            </div>
          </div>
          <div class="login-wrap p-4 p-md-5">
            <br>
            <br>
            <br>
            <br>
            <h3 class="mb-4">Hello! <span>Please write your email </span></h3>
            <form action="{{ route('password.email')}}" method="post" class="signup-form">
              @csrf
              <div class="form-group ">
                
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary rounded submit p-3">Sign Up</button>
              </div>
            </form>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
