@extends('pages.admin')
@section('maincontent')
<style>body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 20px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: #6e74e9
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript'></script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                              @foreach($staff as $data)
                            <div class="page-content page-container" id="page-content">
                              <div class="modal" id="updatebrand" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="font-size: 20px;font-weight: bold;">Cập nhật thông tin cá nhân</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/updateprofile')}}" method="POST" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="staff_id" id="staffid" value="{{ $data->staff_id }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Họ và tên</label>
    <input id="staffname" name="staff_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ và tên..." name="article_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input id="staffemail" name="staff_mailbox" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email..." name="article_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Số điện thoại</label>
    <input id="staffphone" name="staff_phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số điện thoại..." name="article_name">
  </div>
  <div class="form-group">
   <label for="exampleInputPassword1">Địa chỉ</label>
                                    <input type="text"  rows="8" class="form-control" name="staff_address" id="staffaddress" placeholder="Địa chỉ..."/>
  </div>

  <div class="form-group">
    <label for="myfile">Chọn ảnh đại diện:</label>
  <input type="file" id="myfile" name="article_img">
  <br>
  <span id="staffimg"></span>
  </div>
  <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Đóng</button>
  </div>
</form>
</div>
</div>
</div>
</div>

    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full" style="width: 650px;" >
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile" style="height: 350px;" >
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="public/upload/avatar/{{$data->staff_avatar}}" class="img-radius" alt="User-Profile-Image" style="height: 85px;width: 85px;"> </div>
                                <h6 class="f-w-600">{{ $data->staff_name }}</h6>
                                <form>
                                  @csrf
                                <button type="button" class="btn btn-warning fetchprofile" data-toggle="modal" data-target="#updatebrand" data-staffid="{{ $data->staff_id }}"><i class="far fa-edit"></i>
  Cập nhật
</button>
</form>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600" style="font-size: 18px;font-weight: bold;">Thông tin</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ $data->staff_mailbox }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Số điện thoại</p>
                                        <h6 class="text-muted f-w-400">{{ $data->staff_phone }}</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Địa chỉ</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="text-muted f-w-400">{{ $data->staff_address }}</h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
                            </body>
@endsection

@section('scripts')
<script type="text/javascript">
  $('.fetchprofile').click(function(){
    // alert('haha');
    var staff_id = $(this).data('staffid');
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{url('/editprofile')}}",
      method:"POST",
      dataType:"JSON",
      data:{staff_id:staff_id,_token:_token},
      success:function(html){
        $('#staffname').val(html.data.staff_name);
        $('#staffphone').val(html.data.staff_phone);
        $('#staffaddress').val(html.data.staff_address);
        $('#staffemail').val(html.data.staff_mailbox);
        $('#staffimg').html("<img height= '150' width= '150' src=public/upload/avatar/"+ html.data.staff_avatar +" />");

      }

    });
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
$("#myfile").fileinput({showCaption: false, dropZoneEnabled: false});
});
</script>

<?php
                                $message = Session::get('success');
                                if($message){
                                    echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$message.'",
                                      icon: "success",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('success',null);
                                }
                            ?>
@endsection