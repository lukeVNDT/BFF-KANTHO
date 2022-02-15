@extends('pages.admin')
@section('maincontent')
<style type="text/css">
  .select2-selection__choice{
    background-color: #283593 !important;
  }
</style>
<div class="modal" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm vai trò</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insertrole')}}" method="POST" role="form">
          {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên User</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên User" name="staff_name">
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="text" class="form-control" name="email" id="exampleInputPassword1" placeholder="Nhập Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" class="form-control" name="password" id="exampleInputPassword1" placeholder="Nhập Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn vai trò</label>
                                      <select id="select2" name="role_id[]" class="form-control" multiple>
                                            <option value=""></option>
                                            
                                            <option value=""></option>
                                           
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

     {{--  Danh sách nhãn hiệu sản phẩm --}}
    <p></p>
   {{--  <button data-toggle="modal" data-target="#themdieukien" class="btn btn-info xemdieukien">them</button> --}}


   <div class="card shadow h-100 py-2"
                    style="background:linear-gradient(to left, #000046, #1cb5e0); border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                          
                                            <i style="font-size:50px" class='bx bxs-spreadsheet bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Vai trò</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
    


     <div class="card border-left-primary shadow h-100 py-2 mt-4"
     style="border-radius: 20px;">
                                <div class="card-body">
                                  <a href="{{ url('/addrolepage') }}">
                                  <button class="btn btn-primary" style="float: right;" ><i class="fas fa-plus"></i> </button>
                                  </a>
                                    <div class="row no-gutters align-items-center">
                                        <div class="card-body">
                                          <div class="form-group">
          <p>Lọc :</p>

    {{-- <input id="search" name="search" type="text" class="form-control" placeholder="Nhập tên danh mục"> --}}
    <select id="selectloyal" style="width: 280px;" id="statusid" class="form-control input-sm m-bot15">
          <option disabled selected>---Chọn trạng thái---</option>
          <option value="1000000">Đạt tổng 1.000.000 VNĐ mua tại cửa hàng</option>
          
        </select>
          
        
  </div>


      <table id="datatable" class="table">
        <thead>
          <tr>
          
            <th scope="col">Tên vai trò</th>
            <th scope="col">Mô tả vai trò</th>
           {{--  <th scope="col">Thành viên thân thiết</th> --}}
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody>
     <div class="modal" id="updatebrand" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật nhãn hiệu sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/updatebrand')}}" method="POST" role="form">
          {{ csrf_field() }}
          <input type="hidden" name="brand_id" id="brandid" value="}">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên nhãn hiệu</label>
    <input id="brandname" name="brandname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="brand_name">
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả nhãn hiệu</label>
                                    <textarea id="brandesc" name="brandesc"  rows="8" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select id="brandst" name="brandst" name="brand_status" class="form-control input-sm m-bot15">
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
@foreach($roles as $role)
          <tr>
            <input type="hidden" class="branddelete_val_id" value="">
            <td>{{ $role->name }}</td>
            <td>{{ $role->display_name }}</td>
           {{--  <td><span class="text-ellipsis">
              
               <div class="label-success label">Thành viên thân thiết</div>
       
            </span></td> --}}
            <td>
             
       
        
        <a href="{{ url('/editrolepage/'.$role->id) }}">
          <button class="btn btn-warning" data-id=""><i class="fas fa-edit"></i> Sửa</button>
        </a>
        
       
        <button
         type="button" data-id="{{ $role->id }}"  class="btn btn-danger swalbutton">
          <span class="glyphicon glyphicon-trash" ></span> Xóa
        </button>
       
        {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatebrand" data-idbrand="{{ $brand->brand_id }}" data-namebrand="{{ $brand->brand_name }}" data-descbrand="{{ $brand->brand_desc }}" data-statusbrand="{{ $brand->brand_status }}"><span class="glyphicon glyphicon-pencil"></span>
  Sửa
</button> --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    
    {{-- <footer class="panel-footer"> --}}
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    {{-- </footer> --}}
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

<div class="renderModal">
  
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){

    function renderEditUser(res){
      $('.renderModal').html(res);
    }

    $('.editUser').click(function(){
      var id = $(this).data('id');
      $.ajax({
        url:`{{ url('/getdatauser/${id}') }}`,
        method:"GET"
      }).done(function(res){
        renderEditUser(res);
      });
    });

    $('#select2').select2({
      'placeholder': 'chọn vai trò'
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
          swal("Thông báo!", "Hủy khách hàng thân thiết thành công", "success").then(()=> window.location = "{{ url('/listuser') }}");
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
          swal("Thông báo!", "Hủy cấm đăng nhập khách hàng thành công", "success").then(()=> window.location = "{{ url('/listuser') }}");
        }
      });
    });

    $(document).on("click",".banuser",function(){
      let id = $(this).data('id');
      swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn cấm đăng nhập đối với tài khoản khách hàng này?",
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
        swal("Cấm đăng nhập khách hàng thành công", {
      icon: "success",
    }).then(()=> window.location = "{{ url('/listuser') }}");
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
          swal("Thông báo!", "Thêm khách hàng thân thiết thành công", "success").then(()=> window.location = "{{ url('/listuser') }}");
        }
      });
    });

    $(document).on("change","#selectloyal", function(e){
      let id = e.target.value;
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
          $('tbody').html(data.html);
        }
      });
    }



    $('.swalbutton').click(function(e){
      e.preventDefault();
      id = $(this).data('id');
      that = $(this);
           swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa vai trò này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:"{{ url('/deleterole') }}",
      data:
      {
        id:id
      },
      success:function(data){
        that.parent().parent().remove();
    //     swal("Xóa tài khoản khách hàng thành công", {
    //   icon: "success",
    // });      
      }
    });
    

  } else {
    swal("Danh mục của bạn vẫn an toàn!");
  }
});
    });
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