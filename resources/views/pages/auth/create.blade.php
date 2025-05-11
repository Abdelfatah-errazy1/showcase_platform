@extends('layouts.clients.client')
@section('content')
  
<section class="ftco-section">
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
            <h3 class="mb-4">Hello! <span>Please signup to continue</span></h3>
            <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">

              <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                  <div class="col-md-6">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                  <div class="col-md-6">
                      <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Reset Password') }}
                      </button>
                  </div>
              </div>
          </form>
            <div class="w-100 social-wrap">
              <p class="mt-4"> <a href="{{ route('password.request') }}">Forgot Password</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
