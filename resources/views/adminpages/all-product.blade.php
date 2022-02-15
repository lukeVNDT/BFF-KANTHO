@extends('pages.admin')
@section('maincontent')
<div class="modal bd-example-modal-lg" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insertproduct')}}" method="POST" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-md-6">
            <div class="form-group">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm" name="product_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số lượng sản phẩm" name="product_quantity">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Giá sản phẩm</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm" name="product_price">
  </div>

  <div class="form-group">
    <label for="myfile">Chọn hình ảnh:</label>
  <input type="file" id="myfile" name="product_img">
  </div>
   <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="category_id" class="form-control input-sm m-bot15">
                                        
                                            {!! $htmlOption !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hãng sản phẩm</label>
                                      <select name="brand_id" class="form-control input-sm m-bot15">
                                        @foreach($brand as $key=> $brand)
                                          <option value="{{ $brand->brand_id }}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
          </div>
          <div class="col-md-6">
            <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea  rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea  rows="8" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
                                </div>
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


<div class="card shadow h-100 py-2 allProduct"
                    style="background:linear-gradient(to top, #396afc, #2948ff); border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                           
                                            <i style="font-size:50px" class='bx bxs-florist bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                 Sản phẩm</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

       



    <div class="card border-left-success shadow h-100 py-2 mt-4"
    style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="card-body">
                                         <div class="col-sm-2">
        <div class="form-group">
    <input id="search" name="search" type="text" class="form-control" placeholder="Nhập tên sản phẩm...">
  </div>
      </div>
      {{-- Danh sách sản phẩm --}}
      
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insertcat"><i class="fas fa-plus"></i>
</button>


      <div class="renderTable">
        
      </div>

     <div id="toast"></div>
      
    
    {{-- <footer class="panel-footer"> --}}
      
    {{-- </footer> --}}
                                      </div>
                                        
                                    </div>
                                </div>
                            </div>




@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
$("#myfile").fileinput({showCaption: false, dropZoneEnabled: false});
$("#myfile2").fileinput({showCaption: false, dropZoneEnabled: false});
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    getInitialData();


    function getInitialData(){
      $.ajax({
        url:"{{url('/getProductData')}}",
        method:"GET",
        success:function(data){
          $('.renderTable').html(data);
        }
      });
    }


     $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      var query = $('#search').val();
      fetchPaginationData(page,query);
    });

    function fetchPaginationData(page,query){
      $.ajax({
        url:"{{url('/list-product/fetch_data')}}" + "?page=" + page + "&query=" + query,
        success:function(data){
            $('.renderTable').html(data);
        }
      });
    }

    $(document).on("click",".swalbutton",function(){
      let product_id = $(this).data('id');
      var that = $(this);
  swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa sản phẩm này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:`{{ url('/deleteproduct/${product_id}') }}`,
      method:"GET",
      success:function(data){
      that.parent().parent().remove();
      toast({
            title: "Thông báo",
            message: "Xóa sản phẩm thành công!",
            type: "success",
            duration: 7000
            });
      }
    });
    

  } else {
    swal("Sản phẩm của bạn vẫn an toàn!");
  }
});
    });


    // fetch_data();

    function fetch_data(query = ''){
      $.ajax({
        url:"{{ url('/searchproduct') }}",
        method:'GET',
        data:{query:query},
        success:function(data){
          $('.renderTable').html(data);
        }
      });
    }
    $(document).on('keyup','#search',function(){
      var query = $(this).val();
      fetch_data(query);
    });
    

    
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









