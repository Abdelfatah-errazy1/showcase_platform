@extends('layouts.clients.client')
@section('content')
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="wrap d-md-flex">
          <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
            <div class="text w-100">
              <div class="icon"><img src="{{asset('assets/imgs/ezd.png')}}"></div>
              {{-- <h2>EZD </h2> --}}
              <p>Already have an account?</p>
              <a href="{{ route('auth.login')}}" class="btn btn-white btn-outline-white">Sign In</a>
            </div>
          </div>
          <div class="login-wrap p-4 p-md-5">
            <h3 class="mb-4">Hello! <span>Please signup to continue</span></h3>
            <form id="form" action="{{ route('auth.signup')}}" method="post" class="signup-form">
              @csrf
              <div class="form-group mb-4">
                <label class="label" for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe">
              </div>
              <div class="form-group mb-4">
                <label class="label" for="email">Email Address</label>
                <input type="text" class="form-control" name="email" id='email' placeholder="example@gmail.com">
              </div>
              <div class="form-group mb-4">
                <label class="label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <small id="passwordStrength" class="message"></small>
              </div>
              <div class="form-group mb-4">
                <label class="label" for="password">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                <small id="passwordMatch" class="message"></small>
              </div>
             
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary rounded submit p-3">Sign Up</button>
              </div>
            </form>
            <div class="w-100 social-wrap">
              <p class="mt-4"> <a href="">Forgot Password</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  
	const passwordInput = document.getElementById("password");
	const confirmPasswordInput = document.getElementById("confirmPassword");
	const passwordStrengthMessage = document.getElementById("passwordStrength");
	const passwordMatchMessage = document.getElementById("passwordMatch");
	const form = document.getElementById("form");

	// Check password strength
	passwordInput.addEventListener("input", () => {
			const strength = checkPasswordStrength(passwordInput.value);
			console.log(strength)
			if (strength === "Strong") {
					passwordStrengthMessage.textContent = "Strong password.";
					passwordStrengthMessage.className = "message success";
			} else if (strength === "Medium") {
					passwordStrengthMessage.textContent = "Medium strength. Try adding special characters.";
					passwordStrengthMessage.className = "message";
			} else {
					passwordStrengthMessage.textContent = "Weak password. Use at least 8 characters, including uppercase, lowercase, numbers, and symbols.";
					passwordStrengthMessage.className = "message";
			}
	});

	// Check if passwords match
	confirmPasswordInput.addEventListener("input", () => {
			if (passwordInput.value === confirmPasswordInput.value) {
					passwordMatchMessage.textContent = "Passwords match.";
					passwordMatchMessage.className = "message success";
			} else {
					passwordMatchMessage.textContent = "Passwords do not match.";
					passwordMatchMessage.className = "message";
			}
	});

	// Prevent form submission if passwords are not valid
	form.addEventListener("submit", (e) => {
			const strength = checkPasswordStrength(passwordInput.value);
			if (strength !== "Strong" || passwordInput.value !== confirmPasswordInput.value) {
					e.preventDefault();
					Swal.fire({
						title: 'Password Error',
						text: 'Ensure the password is strong and matches the confirmation.',
						icon: 'error',
						confirmButtonText: 'OK'
				});
				
			}
	});

	// Password strength checking function
	function checkPasswordStrength(password) {
			const strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;
			const mediumRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&#]{6,}$/;

			if (strongRegex.test(password)) {
				console.log(strongRegex.test(password))
				return "Strong";
			} else if (mediumRegex.test(password)) {
				console.log(mediumRegex.test(password))
				return "Medium";
			} else {
				console.log('weak')
					return "Weak";
			}
	}

</script>
@endsection