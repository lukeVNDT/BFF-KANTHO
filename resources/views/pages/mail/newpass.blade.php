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
                            <li class="active">Quên mật khẩu</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30" style="float:none;margin:auto;">
                            <!-- Login Form s-->
                            <form action="{{ URL::to('/updatenewpassword') }}" method="POST" class="validatedForm">
                            	@csrf
                                <div class="login-form">
                                    @php
                                    $token = $_GET['token'];
                                    $email = $_GET['email'];
                                    @endphp
                                    <h4 class="login-title">Lấy lại mật khẩu</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Điền mật khẩu mới *</label>
                                            <input type="hidden" name="email" value="{{ $email }}" />
                                            <input type="hidden" name="token" value="{{ $token }}" />
                                            <input class="mb-0" type="password" placeholder="Nhập mật khẩu mới" name="password_account" id="password1">
                                            <br></br>
                                            <label>Xác nhận mật khẩu *</label>
                                            <input class="mb-0" type="password" placeholder="Xác nhận mật khẩu" name="password_retype">
                                        </div>
                                        <div class="col-md-12" >
                                            <button class="register-button mt-0" type="submit">Gửi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                      
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
    if($('.validatedForm'). length > 0){
    $('.validatedForm').validate({
    errorClass:"errors",
    rules: {
        password_account: {
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
        password_retype:"Mật khẩu không khớp, vui lòng kiểm tra lại!",
    }
}); 
}
    });
</script>
<?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$message.'",
                                      icon: "success",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('message',null);
                                }
                            ?>
@endsection