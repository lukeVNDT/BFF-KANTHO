@extends('pages.admin')
@section('maincontent')
<div class="modal" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm danh mục bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insertarticle')}}" method="POST" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="staff_id" value="{{ Session::get('staff_id') }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên bài viết</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="article_name">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea  rows="8" class="form-control" name="article_desc" id="article1"></textarea>
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="article_catid" class="form-control input-sm m-bot15">
                                        @foreach($cat as $c)
                                            <option value="{{ $c->articlecat_id }}">{{ $c->articlecat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
  
  <div class="form-group">
   <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea  rows="8" class="form-control" name="article_content" id="article2" ></textarea>
  </div>

  <div class="form-group">
    <label for="myfile">Chọn hình ảnh:</label>
  <input type="file" id="myfile" name="article_img">
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


<div class="card shadow h-100 py-2 allPost"
                    style="background: linear-gradient(to bottom, #4776e6, #8e54e9); border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                          
                                            <i style="font-size:50px" class='bx bxs-news bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Bài viết</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
      


<div class="card border-left-warning shadow h-100 py-2 mt-4"
style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="card-body">
                                        <span>Danh sách bài viết:</span>
      
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insertcat"><i class="fas fa-plus"></i>
</button>


      <table id="datatable" class="table">
        <thead>
          <tr>
          
            {{-- <th scope="col">ID</th> --}}
            <th scope="col">Tên bài viết</th>
            <th scope="col">Ảnh</th>
            <th style="width:500px;">Nội dung</th>
            <th scope="col">Người đăng bài</th>
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($article as $menu)


          <tr>
            <input type="hidden" class="branddelete_val_id" value="">
            <td>{{ $menu->article_name }}</td>
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
            <img src="public/upload/article/{{$menu->article_avatar}}" height="50" width="50"></td>
            <td><span class="text-ellipsis"></span>{{ $menu->article_content }}</td>
            <td>{{ $menu->adminmodel->staff_name }}</td>
            <td>
        <button type="button" data-id="{{ $menu->article_id }}"  class="btn btn-danger swalbutton">
          <span class="glyphicon glyphicon-trash" ></span> Xóa
        </button>
        
         <button type="button" class="btn btn-warning updateart" data-idarticle="{{ $menu->article_id }}"><i class="far fa-edit"></i> Sửa
</button>

            </td>
          </tr>




          @endforeach
        </tbody>
      </table>
      
  
    {{-- <footer class="panel-footer"> --}}
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$article->firstItem()}} đến {{$article->lastItem()}} trong tổng số {{$article->total()}}</small>
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
          {{$article->links()}}
        </div>
      </div>
{{--     </footer> --}}
                                      </div>
                                    </div>
                                </div>
                            </div>

      <div class="editarticlemodal">
        
      </div>
      <div id="toast">
        
      </div>
 
@endsection

@section('scripts')
<script type="text/javascript">
CKEDITOR.replace('article1');
  CKEDITOR.replace('article2');

  $("#myfile").fileinput({showCaption: false, dropZoneEnabled: false});

  function renderModal(res){
    $(".editarticlemodal").html(res);
  }
  $('.updateart').click(function(){
    var article_id = $(this).data('idarticle');
   
    $.ajax({
      url:`{{ url('/editarticle/${article_id}') }}`,
      method:"GET",
      success:function(res){
       renderModal(res);
      }

    });
  });

    $('.swalbutton').click(function(e){
      e.preventDefault();
      var that = $(this);
      id = $(this).data('id');
           swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa bài viết này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:"{{ url('/deletearticle') }}",
      data:
      {
        id:id
      },
      success:function(data){
        that.parent().parent().remove();
        toast({
                  title: "Thông báo",
                  message: "Xóa bài viết thành công!",
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