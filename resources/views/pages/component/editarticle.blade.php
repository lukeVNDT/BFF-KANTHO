<div class="modal" id="updatebrand" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="{{URL::to('/updatearticle/'.$article->article_id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="article_id" id="catid" value="">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên bài viết</label>
    <input id="articlename" name="article_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="article_name" value="{{$article->article_name}}">
  </div>
                                <div class="form-group">
    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea  rows="8" class="form-control" name="article_desc" id="article3" placeholder="Mô tả sản phẩm" >{{$article->article_desc}}</textarea>
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục</label>
                                      <select name="article_catid" class="form-control input-sm m-bot15" id="articlecatid">
                                         {!!$htmlOption!!}   
                                    </select>
                                </div>
  
  <div class="form-group">
   <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea  rows="8" class="form-control" name="article_content" id="article4" placeholder="Mô tả sản phẩm">{{$article->article_content}}</textarea>
  </div>

  <div class="form-group">
    <label for="myfile2">Chọn hình ảnh:</label>
  <input type="file" id="myfile2" name="article_img2">
  <br>
  <img height="250" width="250" src="{{asset('public/upload/article/'.$article->article_avatar)}}">
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

<script type="text/javascript">
  CKEDITOR.replace('article3');
  CKEDITOR.replace('article4');

  $("#myfile2").fileinput({showCaption: false, dropZoneEnabled: false});

  $(document).ready(function(){
    $('#updatebrand').modal("show");
  });
</script>