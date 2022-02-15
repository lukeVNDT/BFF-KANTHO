@extends('pages.memberprofile')
@section('maincontent')
<style type="text/css">
	body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
.card__info {
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
}
.breadcrumb {
         border-radius: 20px;
    }
.card__form {
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
}
</style>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tổng quan</li>
                        </ol>
                        <div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100 card__info">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
                @foreach($customer as $cus)
				<h5 class="user-name">Họ và tên: {{ $cus->customer_name }}</h5>
				<h6 class="user-email">Số điện thoại: {{ $cus->customer_phone }}</h6>
                <h7 class="user-email">Địa chỉ: {{ $cus->customer_address }}</h7>
			</div>
			{{-- <div class="about">
				<h5>About</h5>
				<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
			</div> --}}
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100 card__form">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Thông tin cá nhân</h6>
			</div>
			<input type="hidden" id="customer_id" value="{{ Session::get('customer_id') }}">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Họ và tên (*)</label>
					<input value="{{ $cus->customer_name }}" type="text" class="form-control" id="hovaten" placeholder="Nhập đầy đủ họ và tên">
				</div>
			</div>
			{{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" placeholder="Enter email ID">
				</div>
			</div> --}}
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Số điện thoại (*)</label>
					<input value="{{ $cus->customer_phone }}" type="number" class="form-control" id="sdt" placeholder="Nhập số điện thoại liên hệ">
				</div>
			</div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="phone">Địa chỉ (*)</label>
                    <input value="{{ $cus->customer_address }}" type="text" class="form-control" id="dc" placeholder="Nhập địa chỉ">
                </div>
            </div>
			
		</div>
@endforeach		
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					
					<button type="button" class="btn btn-primary submitprofile"><i style="font-size:20px;margin-top: 5px;" class='bx bxs-save'></i></button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">
	$(document).ready(function() {
         const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });


    $(document).on("click",'.submitprofile',function(){
    	var name = $('#hovaten').val();
    	var phone = $('#sdt').val();
    	var customer_id = $('#customer_id').val();
        var dc = $('#dc').val()
    	$.ajax({
    		url:"{{ url('/updatememberprofile') }}",
    		method:"POST",
    		data:
    		{
    			"_token":"{{ csrf_token() }}",
    			name:name,
    			phone:phone,
    			customer_id:customer_id,
                dc:dc
    		},
    		success:function(data){
    			if(data == "done"){
                           Toast.fire({
                  icon: 'success',
                  title: 'Cập nhật thông tin thành công'
                }).then(() => window.location.reload());
                }
    		}
    	});
    });


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>


@endsection