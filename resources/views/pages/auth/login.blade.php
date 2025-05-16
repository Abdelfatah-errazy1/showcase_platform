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
              {{-- <h2>EZD</h2> --}}
              <p>Have'nt an account?</p>
              <a href="{{ route('auth.register')}}" class="btn btn-white btn-outline-white">Sign Up</a>
            </div>
          </div>
          <div class="login-wrap p-4 p-md-5">
            <h3 class="mb-4">Hello! <span> signIn to EZD</span></h3>
            <form action="{{ route('auth.login')}}" method="post" class="signup-form">
              @csrf
              <div class="form-group mb-4">
                <label class="label" for="email">Email Address</label>
                <input type="text" class="form-control" name="email" id='email' placeholder="example@gmail.com">
              </div>
              <div class="form-group mb-4">
                <label class="label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
               <label>
                  <input type="checkbox" name="remember"> Se souvenir de moi
              </label>
             
              <div class="form-group">
                <button type="submit" class="btn btn-primary rounded submit p-3">Sign In</button>
              </div>
            </form>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
