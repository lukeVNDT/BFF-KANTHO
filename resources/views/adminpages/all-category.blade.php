@extends('pages.admin')
@section('maincontent')
<div class="modal" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm danh mục sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insertcat')}}" method="POST" role="form">
          {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="category_name">
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea  rows="8" class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>

                                 <div class="form-group">
                                    <label >Chọn danh mục</label>
                                      <select name="parent_id" class="form-control input-sm m-bot15">
                                            <option value="0">---Danh mục cha---</option>
                                            {!! $htmlOption !!}
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="category_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
                                </div>
  <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Đóng</button>
  </div>
</form>
</div>
</div>
</div>
</div>


    <div class="card shadow h-100 py-2 allCategory"
                    style="background:linear-gradient(to top, #457fca, #5691c8);border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                
                                            <i style="font-size:50px"  class='bx bxs-category bx-tada mt-1'></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Danh mục sản phẩm</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
     


    <div class="card border-left-warning shadow h-100 py-2 mt-4"
    style="border-radius: 20px;" 
    >
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="card-body">
                                         <span>Danh sách danh mục sản phẩm:</span>
      
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insertcat"><i class="fas fa-plus"></i>
  Thêm
</button>

      
      <div class="renderTable">
        
      </div>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rendermodal">
                              
                            </div>

                             

@endsection


   
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){

    getInitialCategory();

     $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetchPaginationData(page);
    });

    function fetchPaginationData(page){
      $.ajax({
        url:"{{url('/list-category/fetch_data')}}" + "?page=" + page,
        success:function(data){
            $('.renderTable').html(data);
        }
      });
    }

    function getInitialCategory(){
      $.ajax({
        url:"{{url('/initialcategory')}}",
        success:function(data){
          $('.renderTable').html(data);
        }
      });
    }
  });
  
//    $('.swalbutton').click( function (e){
//     var that = $(this);
//     id = $(this).data('id');
//      swal({
//   title: "Thông báo?",
//   text: "Bạn có chắc muốn xóa danh mục sản phẩm này?",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//    $.ajax({
//     url:`{{url('/deletecat/${id}')}}`,
//     method:"GET",
//     success:function(data){
//       that.parent().parent().remove();
//       swal("Thành công! Danh mục đã bị xóa!", {
//       icon: "success",
//     });
//     }
//    });
    

//   } else {
//     swal("Danh mục của bạn vẫn an toàn!");
//   }
// });
//   });

</script>
@if(Session::has('success'))
<script type="text/javascript">
  swal("Thông báo", "Thêm danh mục sản phẩm thành công", "success");
</script>
@endif


<?php
                                $message = Session::get('message');
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
                            ?>
@endsection







