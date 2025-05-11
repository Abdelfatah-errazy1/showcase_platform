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
              <p>Already have an account?</p>
              <a href="{{ route('sessions.create')}}" class="btn btn-white btn-outline-white">Sign In</a>
            </div>
          </div>

          <div class="login-wrap p-4 p-md-5">
            <h3 class="mb-4">Hello! <span>Confirm Your Password</span></h3>
            <form method="POST" action="{{ route('password.update') }}" class="signup-form">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="form-group row">
                  <div class="col-md-12">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password" required autocomplete="new-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                      <input id="password_confirmation" type="password" placeholder="confirmation password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary rounded submit p-3">Reset Password</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
