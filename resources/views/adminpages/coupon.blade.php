@extends('pages.admin')
@section('maincontent')
<div class="modal" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insertcoupon')}}" method="POST" role="form">
          {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên Coupon</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên coupon" name="coupon_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày bắt đầu</label>
    <input type="text" class="form-control" id="datepicker" aria-describedby="emailHelp" placeholder="Chọn ngày bắt đầu" name="coupon_date_start">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày kết thúc</label>
    <input type="text" class="form-control" id="datepicker2" aria-describedby="emailHelp" placeholder="Chọn ngày kết thúc" name="coupon_date_end">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Mã Coupon</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập mã coupon" name="coupon_code">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Số lượng</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số lượng" name="coupon_time">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Trạng thái</label>
    <select name="coupon_status" class="form-control input-sm m-bot15">
                                            <option value="1">Kích hoạt</option>
                                            <option value="2">Khóa</option>
                                            
    </select>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Tính năng</label>
    <select name="coupon_cond" class="form-control input-sm m-bot15">
                                            <option value="1">giảm theo %</option>
                                            <option value="2">giảm theo tiền</option>
                                            
    </select>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">% hoặc tiền giảm</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số % hoặc tiền giảm" name="coupon_method">
  </div>

  <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  </div>
</form>
</div>
</div>
</div>
</div>


<div class="card shadow h-100 py-2 allCoupon"
                    style="background: linear-gradient(to right, #7474bf, #348ac7);border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                           
                                            <i style="font-size:50px" class='bx bxs-gift bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Mã giảm giá</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

      


<div class="card border-left-danger shadow h-100 py-2 mt-4"
style="border-radius:20px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="card-body">
                                          <span>Danh sách Coupon</span>
      
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insertcat"><span class="glyphicon glyphicon-plus"></span>
</button>



      <table id="datatable" class="table">
        <thead>
          <tr>
         
            <th scope="col">Tên Coupon</th>
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Mã Coupon</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tính năng</th>
            <th scope="col">% hoặc tiền giảm</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Hạn sử dụng</th>
            <th style="width:180px;" scope="col">Quản lý gửi mã coupon cho Khách hàng</th>
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody>
     @foreach($coupon as $key => $cp)
          <tr>
            <input type="hidden" class="cpdelete_val_id" value="{{ $cp->coupon_id }}">
            <td>{{$cp->coupon_name}}</td>
            <td>{{$cp->coupon_date_start}}</td>
            <td>{{$cp->coupon_date_end}}</td>
            <td>{{$cp->coupon_code}}</td>
            <td>{{$cp->coupon_time}}</td>
            <td><span class="text-ellipsis">
              <?php
            if($cp->coupon_cond==1){
              ?>
               giảm theo %
        <?php
      }
            else{
              ?>
              giảm theo tiền
        <?php
      }
      ?> 
            </span></td>
            <td><span class="text-ellipsis">
              <?php
            if($cp->coupon_cond==1){
              ?>
               giảm theo {{ $cp->coupon_method }} %
        <?php
      }
            else{
              ?>
              giảm theo {{ $cp->coupon_method }} tiền
        <?php
      }
      ?> 
            </span></td>
            
            
            @if($cp->coupon_status==1)
              <td><span class="label label-success">Đang kích hoạt</span></td>
            @else
              <td><span class="label label-danger">Đã khóa</span></td>
            @endif
            @if($cp->coupon_date_end>=$today) 
              <td><span class="label label-success">Khả dụng</td>
            @else
              <td><span class="label label-danger">Hết hạn</span></td>
            @endif
            <td>
             {{--  <a href="{{ URL::to('/sendcouponloyal',[
                                  'coupon_time' => $cp->coupon_time,
                                  'coupon_condition' =>$cp->coupon_cond,
                                  'coupon_method' =>$cp->coupon_method,
                                  'coupon_code' =>$cp->coupon_code]) }}"> --}}
          <button data-cptime="{{$cp->coupon_time}}" data-cpcond="{{$cp->coupon_cond}}" data-cpmethod="{{$cp->coupon_method}}" data-cpcode="{{$cp->coupon_code}}" type="button" class="btn btn-warning sendloyal">
          Thân thiết
        </button>
       {{--  </a> --}}
      {{--   <a href="{{ URL::to('/sendcouponnormal',[
                                  'coupon_time' => $cp->coupon_time,
                                  'coupon_condition' =>$cp->coupon_cond,
                                  'coupon_method' =>$cp->coupon_method,
                                  'coupon_code' =>$cp->coupon_code]) }}"> --}}
          <button data-cptime="{{$cp->coupon_time}}" data-cpcond="{{$cp->coupon_cond}}" data-cpmethod="{{$cp->coupon_method}}" data-cpcode="{{$cp->coupon_code}}" type="button" class="btn btn-success sendnormal" >
          Thường
        </button>
        {{-- </a> --}}
            </td>
            <td>
        <button type="button" data-id="{{ $cp->coupon_id }}"  class="btn btn-danger swalbutton">
          <span class="glyphicon glyphicon-trash" ></span> Xóa
         
        </button>
        <button class="btn btn-warning editcou" data-toggle="modal" data-target="#updatecoupon" data-couname="{{ $cp->coupon_name }}" data-coustart="{{ $cp->coupon_date_start }}" data-couend="{{ $cp->coupon_date_end }}" data-coucode="{{ $cp->coupon_code }}" data-couqty="{{ $cp->coupon_time }}" data-coucond="{{ $cp->coupon_cond }}" data-coumethod="{{ $cp->coupon_method }}" data-coustatus="{{ $cp->coupon_status }}" data-couid="{{ $cp->coupon_id }}"><i class="far fa-edit"></i> Sửa</button>
            </td>
          </tr>
          {{-- modal for update here --}}
<div class="modal" id="updatecoupon" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
  <div class="form-group">
    <label for="exampleInputEmail1">Tên Coupon</label>
    <input id="couname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên coupon" name="coupon_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày bắt đầu</label>
    <input id="coustart" type="text" class="form-control" id="datepicker" aria-describedby="emailHelp" placeholder="Chọn ngày bắt đầu" name="coupon_date_start">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày kết thúc</label>
    <input id="couend" type="text" class="form-control" id="datepicker2" aria-describedby="emailHelp" placeholder="Chọn ngày kết thúc" name="coupon_date_end">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Mã Coupon</label>
    <input id="coucode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập mã coupon" name="coupon_code">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Số lượng</label>
    <input id="couqty" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số lượng" name="coupon_time">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Trạng thái</label>
    <select id="coustatus" name="coupon_status" class="form-control input-sm m-bot15">
                                            <option value="1">Kích hoạt</option>
                                            <option value="2">Khóa</option>
                                            
    </select>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Tính năng</label>
    <select id="coucond" name="coupon_cond" class="form-control input-sm m-bot15">
                                            <option value="1">giảm theo %</option>
                                            <option value="2">giảm theo tiền</option>
                                            
    </select>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">% hoặc tiền giảm</label>
    <input id="coumethod" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số % hoặc tiền giảm" name="coupon_method">
  </div>

  <div class="modal-footer">
        <button type="button" class="btn btn-primary submitupdate">Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  </div>

</div>
</div>
</div>
</div>
         @endforeach
        </tbody>
      </table>
      
{{--     <footer class="panel-footer"> --}}
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$coupon->firstItem()}} đến {{$coupon->lastItem()}} trong tổng số {{$coupon->total()}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {{-- <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul> --}}
          {{$coupon->links()}}
        </div>
      </div>
{{--     </footer> --}}

<div id="toast">
  
</div>
                                        </div>
                                    </div>
                                </div>
                            </div>





@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
     var spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>';

    $(".sendloyal").click(function(){
      var coupon_time = $(this).data('cptime');
      var coupon_condition = $(this).data('cpcond');
      var coupon_method = $(this).data('cpmethod');
      var coupon_code = $(this).data('cpcode');
      $(this).html(spinner);
      setTimeout(function(){
        $.ajax({
        url:`{{url('/sendcouponloyal/${coupon_time}/${coupon_condition}/${coupon_method}/${coupon_code}')}}`,
        success:function(data){
          if(data == "done")
          {
            $(".sendloyal").text("Thân thiết");
             toast({
            title: 'Thông báo',
            message: 'Gửi mã quà tặng thành công!',
            type: 'success',
            duration: 7000
            });
          }
          else{
            $(".sendloyal").text("Thân thiết");
            toast({
            title: 'Thông báo',
            message: 'Chưa có khách hàng thân thiết được thêm!',
            type: 'error',
            duration: 7000
            });
          }
        }
      });
      },1500);
      
    });

     $(".sendnormal").click(function(){
      var coupon_time = $(this).data('cptime');
      var coupon_condition = $(this).data('cpcond');
      var coupon_method = $(this).data('cpmethod');
      var coupon_code = $(this).data('cpcode');
      $(this).html(spinner);
      setTimeout(function(){
        $.ajax({
        url:`{{url('/sendcouponnormal/${coupon_time}/${coupon_condition}/${coupon_method}/${coupon_code}')}}`,
        success:function(data){
          if(data == "done")
          {
            $(".sendnormal").text("Thường");
            toast({
            title: 'Thông báo',
            message: 'Gửi mã quà tặng thành công!',
            type: 'success',
            duration: 7000
            });
          }
          else{
            $(".sendnormal").text("Thường");
          toast({
            title: 'Thông báo',
            message: 'Đã có lỗi xảy ra, vui lòng thử lại!',
            type: 'error',
            duration: 7000
            });
          }
        }
      });
      },1500);
      
    });


		$('#updatecoupon').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget);
    var couname = button.data('couname');
    var coustart = button.data('coustart');
    var couend = button.data('couend');
    var coucode = button.data('coucode');
    var couqty = button.data('couqty');
    var coucond = button.data('coucond');
    var coumethod = button.data('coumethod');
    var coustatus = button.data('coustatus');

    var modal =$(this);
    modal.find('.modal-body #couname').val(couname);
    modal.find('.modal-body #coustart').val(coustart);
    modal.find('.modal-body #couend').val(couend);
    modal.find('.modal-body #coucode').val(coucode);
    modal.find('.modal-body #couqty').val(couqty);
    modal.find('.modal-body #coumethod').val(coumethod);
    modal.find('.modal-body #coucond').val(coucond);
    modal.find('.modal-body #coustatus').val(coustatus);


  });
		$(".submitupdate").click(function(e){
			e.relatedTarget;
			let couid = $(this).data('couid');
			let couname = $("#couname").val();
			let coustart = $("#coustart").val();
			let couend = $("#couend").val();
			let coucode = $("#coucode").val();
			let couqty = $("#couqty").val();
			let coumethod = $("#coumethod").val();
			let coucond = $("#coucond").val();
			let coustatus = $("#coustatus").val();
			$.ajax({
				url:"{{ url('/updatecoupon') }}",
				method:"POST",
				data:{
					couid:couid,
					couname:couname,
					coustart:coustart,
					couend:couend,
					coucode:coucode,
					couqty:couqty,
					coumethod:coumethod,
					coucond:coucond,
					coustatus:coustatus,
					"_token":"{{ csrf_token() }}"
				},
				success:function(data){
					if(data == "failed")
					{
						swal("Vui lòng nhập mã không trùng", {
      icon: "error",
    });
					}
					else if(data == "done")
					{
						swal("Cập nhật mã thành công", {
      icon: "success",
    });
					}
			
				}
			});
		});


		$('.swalbutton').click(function(e){
			e.preventDefault();
      var that = $(this);
			id = $(this).data('id');
			swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa coupon này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
    	url:`{{ url('/deletecoupon/${id}') }}`,
      method:"GET",
    	success:function(data){
        that.parent().parent().remove();
    	toast({
            title: 'Thông báo',
            message: 'Xóa mã quà tặng thành công!',
            type: 'success',
            duration: 7000
            });
    	}
    });
    

  } else {
    swal("coupon của bạn vẫn an toàn!");
  }
});
		});
	});
</script>
<?php
                                $message = Session::get('message');
                                $failed = Session::get('failed');
                                if($message){
                                    echo '<script type="text/javascript">
                                    toast({
                                        title: "Thông báo",
                                        message: "'.$message.'",
                                        type: "success",
                                        duration: 7000
                                        });
                             </script>';
                             Session::put('message',null);
                                }
                                elseif($failed)
                                {
                                  echo '<script type="text/javascript">
                                    toast({
                                        title: "Thông báo",
                                        message: "'.$failed.'",
                                        type: "error",
                                        duration: 7000
                                        });
                             </script>';
                                }
                            ?>
<script type="text/javascript">
	$(function(){
		$("#datepicker").datepicker({
			prevText:"Tháng trước",
			nextText:"Tháng sau",
			dateFormat:"dd/mm/yy",
			dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
			duration: "slow"
		});
		$("#datepicker2").datepicker({
			prevText:"Tháng trước",
			nextText:"Tháng sau",
			dateFormat:"dd/mm/yy",
			dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
			duration: "slow"
		});
		$("#coustart").datepicker({
			prevText:"Tháng trước",
			nextText:"Tháng sau",
			dateFormat:"dd/mm/yy",
			dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
			duration: "slow"
		});
		$("#couend").datepicker({
			prevText:"Tháng trước",
			nextText:"Tháng sau",
			dateFormat:"dd/mm/yy",
			dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
			duration: "slow"
		});
	});
</script>
@endsection