<div class="modal" id="updateCategory" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật danh mục sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/updatecat/'.$category->category_id)}}" method="POST" role="form">
          {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="category_name" value="{{ $category->category_name }}">
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea  rows="8" class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$category->category_desc}}</textarea>
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
                                            {!! $option !!}                                            
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#updateCategory').modal("show");

  });
</script>