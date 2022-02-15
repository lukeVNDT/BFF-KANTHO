@extends('pages.admin')
@section('maincontent')
<div class="modal" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm danh mục bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insertbrand')}}" method="POST" role="form">
          {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên nhãn hiệu</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên nhãn hiệu sản phẩm" name="brand_name">
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả nhãn hiệu</label>
                                    <textarea  rows="8" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả nhãn hiệu sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="brand_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
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

   
    

    <div class="card shadow h-100 py-2 allUser"
                    style="background:#6c75e9;  border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                            <i style="font-size:50px" class='bx bxs-group bx-tada mt-1' ></i>
                                           
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                              Danh sách Khách hàng</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

<br>
     <div class="card border-left-primary shadow h-100 py-2" style="border-radius:20px;">
                                <div class="card-body">
                                 {{--  <button type="button" class="btn btn-info refesh" style="float: right;"><i class="fas fa-redo-alt"></i></button> --}}
                                    <div class="row no-gutters align-items-center">
                                        <div class="card-body">
                                          <div class="form-group">
          <p>Lọc :</p>
    {{-- <input id="search" name="search" type="text" class="form-control" placeholder="Nhập tên danh mục"> --}}
    <select id="selectloyal" style="width: 280px;" class="form-control input-sm m-bot15">
          <option value="NonChoose">Chưa đạt</option>
          <option value="1000000">Đạt tổng 1.000.000 VNĐ mua tại cửa hàng</option>
          
        </select>
          
        
  </div>

  <div class="renderTable">
    
  </div>


      
                                        </div>
                                    </div>
                                </div>
                            </div>
  
<div class="modal" id="themdieukien" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm danh mục bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  </div>
</div>
</div>
</div>
</div>

<div class="modal" id="themdk" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm danh mục bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
    <label for="exampleInputEmail1">Tên điều kiện</label>
    <input id="condname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="brand_name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Tên nhãn hiệu</label>
    <input id="condvalue" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="brand_name">
  </div>
        
  <div class="modal-footer">
    <button type="button" class="btn btn-primary addcond">Thêm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  </div>
</div>
</div>
</div>
</div>

<div id="toast">
  
</div>
@endsection

@section('scripts')
<script type="text/javascript">
   function getInitialData(){
      $.ajax({
        url:"{{url('/initialdatacustomer')}}",
        success:function(data){
          $(".renderTable").html(data);
        }
      });
    }
  
  $(document).ready(function(){

    getInitialData();

    

    $(".refesh").click(function(){
      getInitialData();
      var value = $('#selectloyal option[value="NoneChoose"]');
      value.prop("selected",true);
    });

   
    $(document).on("click",".addcond",function(){
      let cond_name = $("#condname").val();
      let cond_value = $("#condvalue").val();
      $.ajax({
        url:"{{ url('/insertcond') }}",
        method:"POST",
        data:
        {
          cond_name:cond_name,
          cond_value:cond_value,
          "_token":"{{ csrf_token() }}"
        },
        success:function(data){
          fetchallcond();
        }
      });
    });

    function fetchallcond(){
      $.ajax({
            url:"{{ url('/getallcond') }}",

        }).done(function(result){
            $("#themdieukien .modal-body").html(result.html);
            $("#themdieukien").modal({
                show : true
            });

        });
    }

    $('.xemdieukien').click(function(e){
        e.preventDefault();
       fetchallcond();
    });


    $(document).on("click",".disableloyal",function(){
      let values = $(this).data('id');
      let customer_id = $(this).data('customerid');
      $.ajax({
        url:"{{ url('/disableloyal') }}",
        method:"POST",
        data: {
          "_token":"{{ csrf_token() }}",
          values:values,
          customer_id:customer_id
        },
        success:function(data){
         toast({
                title: "Thông báo",
                message: "Gỡ bỏ khách hàng thân thiết thành công!",
                type: "success",
                duration: 7000
                });
         setTimeout(function(){
          location.reload();
        },2000);
        }
      }); 
    });

    $(document).on("click",".unbanuser", function(){
      let id = $(this).data('id');
      $.ajax({
        url:"{{ url('/unbanuser') }}",
        method:"POST",
        data:
        {
          id:id,
          "_token":"{{ csrf_token() }}"
        },
        success:function(data){
          toast({
                title: "Thông báo",
                message: "Đã gỡ bỏ vô hiệu hóa tài khoản khách hàng!",
                type: "success",
                duration: 7000
                });
          setTimeout(function(){
          location.reload();
        },2000);
        }
      });
    });

    $(document).on("click",".banuser",function(){
      let id = $(this).data('id');
      swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn thiết lập vô hiệu hóa đối với tài khoản khách hàng này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:"{{ url('/banuser') }}",
      method:"POST",
      data:
      {
        id:id,
        "_token":"{{ csrf_token() }}"
      },
      success:function(data){
        toast({
                title: "Thông báo",
                message: "Vô hiệu hóa tài khoản thành công!",
                type: "success",
                duration: 7000
                });
        setTimeout(function(){
          location.reload();
        },2000);
      }
    });
    

  } else {
    swal("Danh mục của bạn vẫn an toàn!");
  }
});
    });

    $(document).on("click",".loyalbtt",function(){
      let values = $(this).data('id');
      let customer_id = $(this).data('customerid');
      $.ajax({
        url:"{{ url('/enableloyal') }}",
        method:"POST",
        data: {
          "_token":"{{ csrf_token() }}",
          values:values,
          customer_id:customer_id
        },success:function(data){
         toast({
                title: "Thông báo",
                message: "Thêm khách hàng thân thiết thành công!",
                type: "success",
                duration: 7000
                });
         setTimeout(function(){
          location.reload();
        },1000);
          
        }
      });
    });

    $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      var value = $('#selectloyal :selected').val();
      fetchPaginationData(page,value);
    });

    function fetchPaginationData(page,value){
      $.ajax({
        url:"{{url('/listuser/fetch_data')}}" + "?page=" + page + "&value=" + value,
        success:function(data){
            $('.renderTable').html(data);
        }
      });
    }

    $(document).on("change","#selectloyal", function(e){
      let id = $(this).val();
      fetchdata(id);
    });
    function fetchdata(id)
    {
      $.ajax({
        url:"{{ url('/fetchloyalmember') }}",
        method:"GET",
        data:{
          id:id
        },
        success:function(data){
          $('.renderTable').html(data);
        }
      });
    }

  });
</script>
<script type="text/javascript">
  $('#updatebrand').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var name = button.data('namebrand');
    var descbrand = button.data('descbrand');
    var statusbrand = button.data('statusbrand');
    var idbrand = button.data('idbrand');

    var modal =$(this);
    modal.find('.modal-body #brandname').val(name);
    modal.find('.modal-body #brandesc').val(descbrand);
    modal.find('.modal-body #brandst').val(statusbrand);
    modal.find('.modal-body #brandid').val(idbrand);
  });
</script>


<?php
                                $message = Session::get('success');
                                if($message){
                                    echo '<script type="text/javascript">
                                    toast({
                                        title: "Thông báo",
                                        message: "'.$message.'",
                                        type: "success",
                                        duration: 7000
                                        });
                             </script>';
                             Session::put('success',null);
                                }
                            ?>
@endsection