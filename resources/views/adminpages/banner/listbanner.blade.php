@extends('pages.admin')
@section('maincontent')
<div class="modal" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insertslide')}}" method="POST" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên Banner</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên Banner" name="slide_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Link</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập link Banner" name="slide_link">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nội dung</label>
    <textarea class="form-control" rows="4" name="slide_content" placeholder="Nhập nội dung Banner"></textarea>
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Vị trí hiển thị</label>
                                      <select name="slide_position" class="form-control input-sm m-bot15">
                                        
                                            <option value="1">Có khả năng chuyển tiếp (3 ảnh)</option>
                                            <option value="2">Cố định cạnh bên (2 ảnh)</option>
                                            <option value="3">cố định phía dưới (3 ảnh)</option>
                                            
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Vị trí ưu tiên</label>
                                      <select name="slide_sort" class="form-control input-sm m-bot15">
                                        
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            
                                        
                                    </select>
                                </div>

  <div class="form-group">
    <label for="myfile">Chọn hình ảnh:</label>
  <input type="file" id="myfile" name="slide_image">
  </div>

  {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả nhãn hiệu</label>
                                    <textarea  rows="8" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả nhãn hiệu sản phẩm"></textarea>
                                </div> --}}
                                
  <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Đóng</button>
  </div>
</form>
</div>
</div>
</div>
</div>


<div class="card shadow h-100 py-2 allBanner"
                    style="background:linear-gradient(to right, #56ccf2, #2f80ed); border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                           
                                            <i style="font-size:50px" class='bx bxs-carousel bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Banner</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

      

   <div class="card border-left-primary shadow h-100 py-2 mt-4"
   style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="card-body">
                                        <span>Danh sách banner:</span>
      
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insertcat"><i class="fas fa-plus"></i>

</button>


      <table id="datatable" class="table">
        <thead>
          <tr>
          
            {{-- <th scope="col">ID</th> --}}
            <th scope="col">Tên danh mục</th>
            <th scope="col">Link</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Thứ tự ưu tiên</th>
            <th scope="col">Vị trí hiển thị</th>
            <th scope="col">Ảnh</th>
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($slide as $sl)
    


          <tr>
            <input type="hidden" class="branddelete_val_id" value="">
            <td>{{ $sl->slide_name }}</td>
            <td>{{ $sl->slide_link }}</td>
             <td>{!! $sl->slide_content !!}</td>
            <td>{{ $sl->slide_sort }}</td>
            @if($sl->slide_position == 1)
            <td>
              Có khả năng chuyển tiếp (3 ảnh)
            </td>
            @elseif($sl->slide_position == 2)
            <td>
              Cố định cạnh bên (2 ảnh)
            </td>
            @else
            <td>
              Cố định phía dưới (3 ảnh)
            </td>
            @endif
            <td>
             {{--  <?php
            if($brand->brand_status==0){
              ?>
               <a href="{{URL::to('/disable-brand/'.$brand->brand_id)}}" class="btn btn-primary">
          <span class="glyphicon glyphicon-eye-open"></span> enable
        </a>
        <?php
      }
            else{
              ?>
              <a href="{{URL::to('/enable-brand/'.$brand->brand_id)}}" class="btn btn-danger">
          <span class="glyphicon glyphicon-eye-close"></span> disable
        </a>
        <?php
      }
      ?>  --}}
            <img src="public/upload/slide/{{$sl->slide_image}}" height="100" width="250"></td>
            {{-- <td><span class="text-ellipsis"></span>{{ $sl->article_content }}</td> --}}
            <td>
        <button type="button" data-id="{{ $sl->slide_id }}"  class="btn btn-danger swalbutton">
          <span class="glyphicon glyphicon-trash" ></span> Xóa
         

         <button style="margin-left: 5px;" type="button" class="btn btn-warning updateart" data-idslide="{{ $sl->slide_id }}"><i class="far fa-edit"></i> Sửa

</button>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
 
    {{-- <footer class="panel-footer"> --}}
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$slide->firstItem()}} đến {{$slide->lastItem()}} trong tổng số {{$slide->total()}}</small>
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
          {{$slide->links()}}
        </div>
      </div>
   {{--  </footer> --}}
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="renderModal">
                              
                            </div>
                            <div id="toast">
                              
                            </div>

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
$("#myfile").fileinput({showCaption: false, dropZoneEnabled: false});

});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.swalbutton').click(function(e){
      e.preventDefault();
      var that = $(this);
      var id = $(this).data('id');
           swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa banner quảng cáo này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:`{{ url('/delbanner/${id}') }}`,
      success:function(data){
        toast({
        title: 'success',
        message: 'Xóa banner thành công!',
        type: 'success',
        duration: 7000
       });
        that.parent().parent().remove();
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

  /*
  mang nay luu gia tri cua 3 the option
  const arr = [{
  id: 1,
  text: ""
  }]
  */
  const arr = [{
    id:1,
    text:"Có khả năng chuyển tiếp (3 ảnh)"
  },
  {
    id:2,
    text:"Cố định cạnh bên (2 ảnh)"
  },
  {
    id:3,
    text:"cố định phía dưới (3 ảnh)"
  }];

  $('.updateart').click(function(){
    var slide_id = $(this).data('idslide');
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:`{{url('/editslide/${slide_id}')}}`,
      method:"GET",
      success:function(html){
        $(".renderModal").html(html);
       
      }

    });
  });
</script>
<script type="text/javascript">
  
</script>


<?php
                                $message = Session::get('success');
                                $messagef = Session::get('failed');
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
                                elseif($messagef)
                                {
                                  echo '<script type="text/javascript">
                                     toast({
                                        title: "Thông báo",
                                        message: "'.$messagef.'",
                                        type: "error",
                                        duration: 7000
                                        });
                             </script>';
                             Session::put('failed',null);
                                }
                            ?>
@endsection