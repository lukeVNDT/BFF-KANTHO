@extends('pages.admin')
@section('maincontent')

</style>
<div class="modal" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="font-size: 18px;font-weight: bold;">Thêm Album ảnh</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insert/'.$pro_id)}}" method="POST" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}

<div class="file-loading"> 
    <label for="myfile">Chọn hình ảnh:</label>
  <input id="tanfile" name="albumimage[]"  type="file" multiple>
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


<div class="card shadow h-100 py-2 allAlbum"
                    style="background:linear-gradient(to top, #396afc, #2948ff); border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                          
                                            <i style="font-size:50px" class='bx bx-image bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Bộ sưu tập ảnh</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>


      

       <div class="card border-left-primary shadow h-100 py-2 mt-4"
       style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="card-body">
                                        
                                        <span>Album:</span>
      
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insertcat"><i class="fas fa-plus"></i>
</button>
<br></br>
<p style="font-style: italic;">(Chú ý) Có thể sửa tên hình ảnh trực tiếp trên bảng</p>

<div id="loaddata">
<input type="hidden" class="product_id" value="{{ $pro_id }}">
      <table id="datatable" class="table">

        <thead>
          <tr>
            <th scope="col">Tên hình ảnh</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
          
     <div class="modal" id="updatebrand" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật slide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/updateslide')}}" method="POST" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="article_id" id="catid" value="">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên Slide</label>
    <input id="slidename" name="slide_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên slide" name="article_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Link</label>
    <input type="text" class="form-control" id="slidelink" aria-describedby="emailHelp" placeholder="Nhập link slide" name="slide_link">
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Target</label>
                                      <select name="slide_target" class="form-control input-sm m-bot15" id="slidetarget">
                                        
                                            <option value="1">_blank</option>
                                            <option value="2">_self</option>
                                            <option value="3">_parent</option>
                                            <option value="4">_top</option>
                                        
                                    </select>
                                </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Sort</label>
    <input type="text" class="form-control" id="slidesort" aria-describedby="emailHelp" placeholder="Nhập Sort của slide" name="slide_sort">
  </div>

  <div class="form-group">
    <label for="myfile">Chọn hình ảnh:</label>
  <input type="file" id="myfile" name="slide_image">
  <br>
  <span id="slideimage"></span>
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

          @foreach($album as $ab)
          <tr>
            <td contenteditable class = "editalbumname" data-editalbumid="{{$ab->album_id}}">{{$ab->album_name}}</td>
            <td><img src="{{url('public/upload/album/'.$ab->album_image)}}" height="100" width="100"></td>
            <td><button data-idalbum="{{$ab->album_id}}" class="btn btn-danger xoaanh" type="button">
              <i class="far fa-trash-alt"></i> Xóa
               </button></td>
          </tr>
        @endforeach
        </tbody>
      </table>
      </div>

    {{-- <footer class="panel-footer"> --}}
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
         {{--  <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul> --}}
          {!!$album->render()!!}
        </div>
      </div>
{{--     </footer> --}}
                                      </div>
                                    </div>
                                </div>
                            </div>




@endsection

@section('scripts')
<script type="text/javascript">
$("#tanfile").fileinput({showCaption: false, dropZoneEnabled: false});
</script>

<script type="text/javascript">
    
</script>
<script type="text/javascript">
  $('.updateart').click(function(){
    var slide_id = $(this).data('idslide');
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{url('/editslide')}}",
      method:"POST",
      dataType:"JSON",
      data:{slide_id:slide_id,_token:_token},
      success:function(html){
        $('#slidename').val(html.data.slide_name);
        $('#slidelink').val(html.data.slide_link);
        $('#slidesort').val(html.data.slide_sort);
        $('#slidetarget').val(html.data.slide_target);
        $('#slideimage').html("<img height= '150' width= '150' src=public/upload/slide/"+ html.data.slide_image +" />");

      }

    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var pro_id = $('.product_id').val();
    // loadalbum(pro_id);

    // function loadalbum(id=""){
    //   var pro_id = $('.product_id').val();
    //   var _token = $('input[name="_token"]').val();
    //   $.ajax({
    //     url:"{{ url('/fetchalbum') }}",
    //     method:'POST',
    //     data:{pro_id:pro_id,_token:_token},
    //       success:function(data){
    //         $('#loaddata').html(data);
    //       }
    //   });
    // }
    $('#tanfile').change(function(){
      var err = '';
      var file = $('#tanfile')[0].files;
      if(file.length>5){
        err+='<div class="alert alert-danger" role="alert">Không được chọn quá 5 ảnh</div>';
      }
      else if(file.length==''){
        err+='<div class="alert alert-danger" role="alert">Chưa chọn ảnh</div>';
      }
    });

    $(document).on('blur','.editalbumname', function(){
      var album_id = $(this).data('editalbumid');
      var album_name = $(this).text();
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ url('/editalbumname') }}",
        method:'POST',
        data:{album_id:album_id,album_name:album_name,_token:_token},
          success:function(data){
            alertify.success('Cập nhật tên ảnh thành công');
            // loadalbum();
          }
      });
    });
    $(document).on('click','.xoaanh',function(e){
      e.preventDefault();
      var that = $(this);
      var id = $(this).data('idalbum');
      var _token = $('input[name="_token"]').val();
           swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa hình ảnh này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   $.ajax({
    url:"{{ url('/deletepic') }}",
    method:'POST',
    data:{id:id,_token:_token},
    success:function(data){
      that.parent().parent().remove();
      toast({
  title: 'success',
  message: 'anh muốn bây xuyên thời gian haha',
  type: 'success',
  duration: 3000
 });
    }
   });
  } else {
    swal("Ảnh của bạn vẫn an toàn!");
  }
});
    });
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
