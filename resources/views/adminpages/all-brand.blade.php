@extends('pages.admin')
@section('maincontent')
<div class="modal" id="insertcat" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="border-radius: 10px;">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title">Thêm nhãn hiệu sản phẩm</h5>
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
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Đóng</button>
  </div>
</form>
</div>
</div>
</div>
</div>

<div class="card shadow h-100 py-2 allBrand"
                    style="background: linear-gradient(to top, #da22ff, #9733ee); border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                           
                                    
                                            <i style="font-size:50px" class='bx bxs-copyright bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Nhãn hiệu sản phẩm</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<div class="card border-left-success shadow h-100 py-2 mt-4"
style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">

                                      <div class="card-body">


    <span>Danh sách nhãn hiệu:</span>
      
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insertcat"><i class="fas fa-plus"></i>
</button>


      <table id="datatable" class="table">
        <thead>
          <tr>
          

            <th scope="col">Tên nhãn hiệu sản phẩm</th>
            <th scope="col">Hiển thị</th>
            <th scope="col">Mô tả</th>
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody>
     @foreach($listbrand as $key => $brand)
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
          <input type="hidden" name="brand_id" id="brandid" value="{{ $brand->brand_id }}">
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
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Đóng</button>
  </div>
</form>
</div>
</div>
</div>
</div>
          <tr>
            <input type="hidden" class="branddelete_val_id" value="{{ $brand->brand_id }}">
            <td>{{$brand->brand_name}}</td>
            <td><span class="text-ellipsis">
              <?php
            if($brand->brand_status==0){
              ?>
               <a href="{{URL::to('/disable-brand/'.$brand->brand_id)}}" class="btn btn-primary">
          <i class="fas fa-eye"></i> Hiển thị
        </a>
        <?php
      }
            else{
              ?>
              <a href="{{URL::to('/enable-brand/'.$brand->brand_id)}}" class="btn btn-danger">
          <i class="fas fa-eye-slash"></i> Ẩn
        </a>
        <?php
      }
      ?> 
            </span></td>
            <td><span class="text-ellipsis">{{$brand->brand_desc}}</span></td>
            <td>
        <button type="button" data-id="{{ $brand->brand_id }}"  class="btn btn-danger swalbutton">
          <i class="far fa-trash-alt"></i> Xóa
        </button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatebrand" data-idbrand="{{ $brand->brand_id }}" data-namebrand="{{ $brand->brand_name }}" data-descbrand="{{ $brand->brand_desc }}" data-statusbrand="{{ $brand->brand_status }}"><i class="fas fa-edit"></i> Sửa
</button>
            </td>
          </tr>
     @endforeach
        </tbody>
      </table>
      
  
   {{--  <footer class="card-footer"> --}}
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
    $('.swalbutton').click(function(e){
      e.preventDefault();
      var that = $(this);
      id = $(this).data('id');
           swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa nhãn hiệu sản phẩm này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   
    $.ajax({
      url:`{{url('/deletebrand/${id}')}}`,
      method:"GET",
      success:function(data){
         that.parent().parent().remove();
        toast({
                                        title: "Thông báo",
                                        message: "Xóa thương hiệu thành công!",
                                        type: "success",
                                        duration: 7000
                                        });
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

@endsection