<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('public/backend/Login_v18/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/vendor/bootstrap/css/bootstrap.min.css')}}">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{  asset('public/backend/Login_v18/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Login
					</span>
					

					<?php
					$message =  Session::get('message');
					if($message){
						echo '<div class="alert alert-danger" role="alert">'
  								.$message.
							'</div>';
						Session::put('message',null);
					}
					?>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input id="email" class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input id="password" class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Nhớ mật khẩu
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button id="loginBtt" class="login100-form-btn">
							Đăng nhập
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('{{  asset('public/backend/Login_v18/images/bg-01.jpg')}}');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="{{  asset('public/backend/Login_v18/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{  asset('public/backend/Login_v18/vendor/animsition/js/animsition.min.js')}}"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="{{  asset('public/backend/Login_v18/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{  asset('public/backend/Login_v18/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{  asset('public/backend/Login_v18/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{  asset('public/backend/Login_v18/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{  asset('public/backend/Login_v18/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{  asset('public/backend/Login_v18/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{  asset('public/backend/Login_v18/js/main.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			var spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div> Vui lòng chờ...';
			$(document).on("click", "#loginBtt", function(event){
				event.preventDefault();
				let email = $('#email').val();
				let password = $('#password').val();

				$('#loginBtt').html(spinner);

				setTimeout(function(){
				 	$.ajax({
					url: "{{ url('/admin_dashboard') }}",
					method:"POST",
					data: {
						"_token":"{{ csrf_token() }}",
						email: email,
						password: password
					},
					success:function(data){
						if (data == "login successfully") {
							$('#loginBtt').text('Đăng nhập');
							window.location = "{{ url('/dashboard') }}";
						}
						else {
							$('#loginBtt').text('Đăng nhập');
							window.location = "{{ url('/dangnhap') }}";
						}
					}
				});
				}, 1500);
			});

		})
	</script>

</body>
</html>