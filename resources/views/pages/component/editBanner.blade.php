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
          <input type="hidden" name="slide_id" id="catid" value="{{ $sl->slide_id }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên Slide</label>
    <input id="slidename" name="slide_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên slide" name="slide_name" value="{{$sl->slide_name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Link</label>
    <input type="text" class="form-control" id="slidelink" aria-describedby="emailHelp" placeholder="Nhập link slide" name="slide_link" value="{{$sl->slide_link}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nội dung</label>
    <textarea id="slidecontent" class="form-control" rows="4" name="slide_content" placeholder="Nhập nội dung Banner">{{$sl->slide_content}}</textarea>
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Vị trí hiển thị</label>
                                      <select name="slide_position" class="form-control input-sm m-bot15" id="slidetarget">
                                            <option {{$sl->slide_position == 1 ? "selected" : ''}} id="1" value="1">Có khả năng chuyển tiếp (3 ảnh)</option>
                                            <option {{$sl->slide_position == 2 ? "selected" : ''}} id="2" value="2">Cố định cạnh bên (2 ảnh)</option>
                                            <option {{$sl->slide_position == 3 ? "selected" : ''}} id="3" value="3">Cố định phía dưới (3 ảnh)</option>
                                      </select>      
                                        
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Vị trí ưu tiên</label>
                                      <select name="slide_sort" class="form-control input-sm m-bot15" id="slidesort">
                                        
                                            <option {{$sl->slide_sort == 1 ? "selected" : ""}} value="1">1</option>
                                            <option {{$sl->slide_sort == 2 ? "selected" : ""}} value="2">2</option>
                                            <option {{$sl->slide_sort == 3 ? "selected" : ""}} value="3">3</option>
                                            
                                        
                                    </select>
                                </div>
  <div class="form-group">
    <label for="myfile">Chọn hình ảnh:</label>
  <input type="file" id="myfile2" name="slide_image2">
  <br>
  <img height="100" width="250" src="{{URL::to('public/upload/slide/'.$sl->slide_image)}}">
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

  $("#myfile2").fileinput({showCaption: false, dropZoneEnabled: false});
  // CKEDITOR.replace('slidecontent');
  $(document).ready(function(){
    $('#updatebrand').modal("show");
  });
</script>