@extends('welcome')
@section('content')
<style type="text/css">
      .spinner-border{
                                    margin-top: 1px;
                                    height: 20px;
                                    width: 20px;
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
            <br>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30" style="float:none;margin:auto;">
                            <!-- Login Form s-->
                           {{--  <form action="{{ URL::to('/getpasswordreset') }}" method="POST" > --}}
                            	@csrf
                                <div class="login-form">
                                    <h4 class="login-title">Quên mật khẩu</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email*</label>
                                            <input class="mb-0" type="email" placeholder="Nhập Email của bạn" id="email_account">
                                        </div>
                                        <div class="col-md-12" >
                                            <button class="register-button mt-0" id="resetpass" type="button">Gửi</button>
                                        </div>
                                    </div>
                                </div>
                           {{--  </form> --}}
                        </div>
                      </div>
                  </div>
              </div>
@endsection

@section('scripts')
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


    $(document).on("click", "#resetpass", function(e){
         var spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only"></span><span class="sr-only">Loading...</span></div>';
         var name_account = $("#email_account").val();
         var _token = $('input[name="_token"]').val();
         $(this).html(spinner);
         setTimeout(function(){
            $.ajax({
            url:"{{url('/getpasswordreset')}}",
            method:"POST",
            data: {
                _token:_token,
                email_account:name_account
            },
            success:function(data){
                $("#resetpass").text("Gửi");
                if(data == "not exist")
                {
                    Toast.fire({
                      icon: 'error',
                      title: 'Email chưa được đăng ký!'
                    });
                }
                else{
                    Toast.fire({
                      icon: 'success',
                      title: 'Gửi yêu cầu thành công, vui lòng kiểm tra email'
                    });
                }
            }
            });
            

         },1000);

    });
});
</script>
<?php
                                $message = Session::get('message');
                                $messagef = Session::get('messagef');
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
                                elseif($messagef){
                                    echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$messagef.'",
                                      icon: "error",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('messagef',null);
                                }
                            ?>
@endsection