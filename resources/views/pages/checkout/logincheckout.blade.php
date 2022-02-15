@extends('welcome')
@section('content')
<style type="text/css">
       .errors {
      color: red;
   }

</style>
<!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li class="active">Đăng nhập-Đăng ký</li>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            @if (session('error'))
     <div class="alert alert-danger">
         {{ session('error') }}
     </div>
  @endif
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form class="validatedFormLogin" method="POST" >
                                <div class="login-form">
                                    <h4 class="login-title">Đăng nhập</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email*</label>
                                            <input id="email" class="mb-0" type="email" placeholder="Email" name="customer_email">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Mật khẩu</label>
                                            <input id="password" class="mb-0" type="password" placeholder="Điền mật khẩu" name="customer_password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Nhớ mật khẩu</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="{{ URL::to('/forgetpassword') }}"> Quên mật khẩu?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button id="loginButton" class="register-button mt-0" type="submit">Đăng nhập</button>
                                        </div>
                                        <ul class="social-login">
                                <li>
                                    <a href="{{URL::to('/googlelogin')}}"><img width="5%" src="{{ asset('public/frontend/images/iconfinder_Google_1298745.png') }}" alt="dang-nhap-google"> Đăng nhập với google</a>
                                </li>
                            </ul>
                                    </div>
                                </div>
                            </form>
                            <style type="text/css">
                                ul.social-login {
                                    margin: 10px;
                                    padding: 0;
                                }
                                ul.social-login li {
                                    display: inline;
                                    margin: 5px;
                                }
                                .spinner-border{
                                    margin-top: 1px;
                                    height: 20px;
                                    width: 20px;
                                }
                            </style>
                            
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form class="validatedForm"  method="POST">
                            	
                                <div class="login-form">
                                    <h4 class="login-title">Đăng ký</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Họ & Tên</label>
                                            <input id="customer_name" class="mb-0" type="text" placeholder="Họ và tên" name="customer_name">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email</label>
                                            <input id="customer_email" class="mb-0" type="email" placeholder="Địa chỉ Mail" name="customer_email">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Mật khẩu</label>
                                            <input class="mb-0" id="password1" type="password" placeholder="Mật khẩu" name="customer_password">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Xác nhận mật khẩu</label>
                                            <input class="mb-0" type="password" placeholder="Nhập lại mật khẩu" name="password_retype">
                                        </div>
                                        <div class="col-12">
                                            <button class="register-button mt-0" id="signupBtt" type="submit">Đăng ký</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
@endsection

@section('scripts')

                               
                                @if(Session::get('message')){
                                    <script type="text/javascript">
                                        toastr.success("{!! Session::get('message') !!}");
                                    </script>
                                }@elseif(Session::get('messagef')){
                                        <script type="text/javascript">
                                            toastr.error("{!! Session::get('messagef') !!}");
                                        </script>
                                }
                                @endif

                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        const Toast = Swal.mixin({
                                          toast: true,
                                          position: 'top-end',
                                          showConfirmButton: false,
                                          timer: 3000,
                                          timerProgressBar: true,
                                          didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                          }
                                        });
                                        var spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>';

                                       if($('.validatedForm'). length > 0){
                                                $('.validatedForm').validate({
                                                errorClass:"errors",
                                                rules: {
                                                    customer_name:{
                                                        required: true,
                                                    },
                                                    customer_email:{
                                                        required: true
                                                    },
                                                    customer_password: {
                                                        required: true,
                                                        minlength: 5,

                                                    },
                                                    password_retype: {
                                                        required: true,
                                                        minlength: 5,
                                                        equalTo: "#password1"
                                                    }
                                                },
                                                messages:{
                                                    password_retype:{
                                                        required:"Vui lòng không để trống trường này",
                                                        equalTo:"Mật khẩu không khớp, vui lòng kiểm tra lại!"
                                                    },
                                                    customer_name:"Tên của bạn không được để trống",
                                                    customer_email:{
                                                        required:"Email không được bỏ trống"
                                                    },
                                                    customer_password:{
                                                        required:"Mật khẩu không được để trống",
                                                        minlength:"Mật khẩu phải tối thiểu 5 ký tự"
                                                    },
                                                },
                                                submitHandler: function(form)
                                                {
                                                    OnSignup(form);
                                                }
                                            }); 
                                            }
                                             if($('.validatedFormLogin'). length > 0){
                                                $('.validatedFormLogin').validate({
                                                errorClass:"errors",
                                                rules: {
                                                    customer_email:{
                                                        required: true
                                                    },
                                                    customer_password: {
                                                        required: true,
                                                        minlength: 5,

                                                    }
                                                },
                                                messages:{
                                                    customer_email:{
                                                        required:"Email không được bỏ trống"
                                                    },
                                                    customer_password:{
                                                        required:"Mật khẩu không được để trống",
                                                        minlength:"Mật khẩu phải tối thiểu 5 ký tự"
                                                    },
                                                },
                                                submitHandler: function(form) {
                                                    //Will execute only when the form passed validation.
                                                    OnSubmit(form);
                                                }
                                            }); 
                                            }

                                        // $("#signupBtt").click(function(e){
                                        //     e.preventDefault();
                                        // });

                                        function OnSignup(form){
                                            let customer_name = $("#customer_name").val();
                                            let customer_password = $("#password1").val();
                                            let customer_email = $("#customer_email").val();
                                            $("#signupBtt").html(spinner);
                                            setTimeout(function(){
                                                $.ajax({
                                                    url:"{{url('/dangky')}}",
                                                    method:"POST",
                                                    data:{
                                                        "_token":"{{ csrf_token() }}",
                                                        customer_name:customer_name,
                                                        customer_email:customer_email,
                                                        customer_password:customer_password
                                                    },
                                                    success:function(data){
                                                        if(data == "done"){
                                                            Swal.fire(
                                                                  'Thông báo!',
                                                                  'Đăng ký tài khoản thành công',
                                                                  'success'
                                                                ).then(function(){
                                                                    window.location.href = "{{url('/')}}";
                                                                });
                                                            
                                                        }
                                                        else if(data == "email exist")
                                                        {
                                                            $("#signupBtt").text("Đăng ký");
                                                            Swal.fire(
                                                                  'Thông báo!',
                                                                  'Email đã được đăng ký',
                                                                  'error'
                                                                );
                                                        }
                                                    }
                                                });
                                            },1500);
                                        }




                                        function OnSubmit(form){
                                            let email = $('#email').val();
                                            let password = $('#password').val();
                                            $('#loginButton').html(spinner);
                                            setTimeout(function(){ 
                                                $.ajax({
                                                url: "{{ url('/logincustomer') }}",
                                                method: "POST",
                                                data: {
                                                    "_token":"{{ csrf_token() }}",
                                                    email:email,
                                                    password:password
                                                },
                                                success:function(data){
                                                    if(data == "done"){
                                                        $('#loginButton').text('Đăng nhập');
                                                        window.location = "{{ url('/') }}";
                                                    }
                                                    else if (data == "isban"){
                                                        $('#loginButton').text('Đăng nhập');
                                                        Toast.fire({
                                                          icon: 'error',
                                                          title: 'Tài khoản của bạn đã tạm thời bị vô hiệu hóa. Để biết thêm thông tin vui lòng liên hệ Page DTSport'
                                                        });                                 

                                                }
                                                    else {
                                                        $('#loginButton').text('Đăng nhập');
                                                        Toast.fire({
                                                          icon: 'error',
                                                          title: 'Sai tài khoản hoặc mật khẩu, vui lòng thử lại'
                                                        });     
                                                    }
                                                }
                                            });

                                             }, 1500);
                                        }
                                    });
                                </script>



@endsection