<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">

</head>
<body>
	<div class="container">
	    <div class="row">
	        <div class="col-sm-6 col-md-4 col-md-offset-4">
	            <h1 class="text-center login-title">Sign in to AgriERP Dashborad</h1>
	            <div class="account-wall">
	                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
	                    alt="">
	                    
	                    @include('layouts.errors.error-message')
	                    @include('layouts.errors.flash-error-message')

	                <form class="form-signin" action="{{ route('loginProcess') }}" method="post">
	                	
	                	{{ csrf_field() }}

		                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" >

		                <input type="password" class="form-control" name="password" placeholder="Password">
		                <button class="btn btn-lg btn-primary btn-block" type="submit">
		                    Sign in</button>
		                <label class="checkbox pull-left">
		                    <input type="checkbox" value="remember-me">
		                    Remember me
		                </label>
		                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
	                </form>
	            </div>
	            <a href="#" class="text-center new-account">Create an account </a>
	        </div>
	    </div>
	</div>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>