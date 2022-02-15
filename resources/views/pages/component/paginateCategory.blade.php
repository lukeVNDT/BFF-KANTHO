@if($listcategory->count() > 0)
<table id="datatable" class="table">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th scope="col">Tên danh mục sản phẩm</th>
            <th scope="col">Hiển thị</th>
            <th scope="col">Mô tả</th>
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listcategory as $key => $category)
          {{-- <div class="modal" id="updatecat" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật danh mục sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/updatecat')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="category_id" id="cat_id" value="{{ $category->category_id }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <input id="namecat" name="namecat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="category_name">
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea id="desccat" name="desccat"  rows="8" class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select id="statuscat" name="statuscat" name="category_status" class="form-control input-sm m-bot15">
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
</div> --}}
          <tr>
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <input type="hidden" class="serdelete_val_id" value="{{ $category->category_id }}">
            <td>{{$category->category_name}}</td>
            <td><span class="text-ellipsis">
              <?php
              if($category->category_status==0){
                ?>
                <a href="{{URL::to('/disable-status/'.$category->category_id)}}" class="btn btn-primary">
          <i class="fas fa-eye"></i> Hiển thị
        </a>
              <?php
              }
              else{
                ?>
                <a href="{{URL::to('/enable-status/'.$category->category_id)}}" class="btn btn-danger">
          <i class="fas fa-eye-slash"></i> Ẩn
        </a>
              <?php
              }
              ?>
            </span></td>
            <td><span class="text-ellipsis">{{$category->category_desc}}</span></td>
            <td>
        <button data-id="{{ $category->category_id }}" class="btn btn-danger swalbutton" >
          <i class="far fa-trash-alt"></i>
        </button>
        <button  data-id="{{ $category->category_id }}" type="button" class="btn btn-warning editcate" ><i class="far fa-edit"></i>

</button>
        
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
       {{--  <footer class="panel-footer"> --}}
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$listcategory->firstItem()}} đến {{$listcategory->lastItem()}} trong tổng số {{$listcategory->total()}}</small>
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
          {{$listcategory->links()}}
        </div>
      </div>
    {{-- </footer> --}}

    <div class="modal" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa danh mục sản phẩm này?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger">Có</button>
      </div>
    </div>
  </div>
</div>


<div id="toast">
  
</div>

<button class="btn btn-success showtoastsc" onclick="showsuccess();">show</button>
<button class="btn btn-danger showtoaster" onclick="showerror();">show</button>


{{-- <div class="toastMsg toast--info">
  <div class="toast__icon">
   <i class="fas fa-info-circle"></i>
  </div>
  <div class="toast__body">
    <h3 class="toast__title">info</h3>
    <p class="toast__msg">anh muon bay xuyen thoi gian</p>
  </div>
  <div class="toast__close">
    <i class="fas fa-times"></i>
  </div>
</div>

<div class="toastMsg toast--warning">
  <div class="toast__icon">
   <i class="fas fa-info-circle"></i>
  </div>
  <div class="toast__body">
    <h3 class="toast__title">warning</h3>
    <p class="toast__msg">anh muon bay xuyen thoi gian</p>
  </div>
  <div class="toast__close">
    <i class="fas fa-times"></i>
  </div>
</div>

<div class="toastMsg toast--error">
  <div class="toast__icon">
   <i class="fas fa-exclamation-triangle"></i>
 </div>
  <div class="toast__body">
    <h3 class="toast__title">error</h3>
    <p class="toast__msg">anh muon bay xuyen thoi gian</p>
  </div>
  <div class="toast__close">
    <i class="fas fa-times"></i>
  </div>
</div> --}}

@endif
<script type="text/javascript">

  function showsuccess(){
    toast({
  title: 'success',
  message: 'anh muốn bây xuyên thời gian haha',
  type: 'success',
  duration: 60000
 });
  }

  function showerror(){
     toast({
  title: 'error',
  message: 'anh muốn bây xuyên thời gian haha',
  type: 'error',
  duration: 3000
 });
  }

 


 // toast({
 //  title: "success",
 //  message: "anh muốn bây xuyên thời gian haha",
 //  type: "success",
 //  delay: 3000
 // });


 function confirmation(){
  $("#ConfirmModal").modal("toggle");
  

 }
  
 

  $('.swalbutton').click( function (e){
    var that = $(this);
    id = $(this).data('id');
     swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa danh mục sản phẩm này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   $.ajax({
    url:`{{url('/deletecat/${id}')}}`,
    method:"GET",
    success:function(data){
      that.parent().parent().remove();
      toast({
  title: 'success',
  message: 'anh muốn bây xuyên thời gian haha',
  type: 'success',
  duration: 10000
 });
    }
   });
    

  } else {
    swal("Danh mục của bạn vẫn an toàn!");
  }
});
  });


  function renderModal(res){
    $('.rendermodal').html(res);
  }
  $('.editcate').on('click',function(event){
    let category_id = $(this).data('id');
  

    $.ajax({
      "url":`{{ url('/geteditcategory/${category_id}') }}`,
      method:"GET",
    }).done(function(res){
      renderModal(res);
    });
    // var button = $(event.relatedTarget);
    // var catname = button.data('namecat');
    // var catdesc = button.data('desccat');
    // var catstatus = button.data('statuscat');
    // var catid = button.data('idcat');

    // var modal =$(this);
    // modal.find('.modal-body #namecat').val(catname);
    // modal.find('.modal-body #desccat').val(catdesc);
    // modal.find('.modal-body #statuscat').val(catstatus);
    // modal.find('.modal-body #cat_id').val(catid);

  });
</script>