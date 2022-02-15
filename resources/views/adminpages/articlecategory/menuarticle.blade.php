@extends('pages.admin')
@section('maincontent')
<div class="modal" id="insertcat" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm danh mục bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/insertarticlecat')}}" method="POST" role="form">
          {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục bài viết" name="articlecat_name">
  </div>
  {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả nhãn hiệu</label>
                                    <textarea  rows="8" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả nhãn hiệu sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="brand_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
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


<div class="card shadow h-100 py-2 allCategoryPost"
                    style="background:linear-gradient(to right, #1488cc, #2b32b2);border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                           
                                            <i  style="font-size:50px" class='bx bx-detail bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Danh mục bài viết</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
      
    <div class="card border-left-success shadow h-100 py-2 mt-4"
    style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="card-body">
                                          <span>Danh sách danh mục bài viết:</span>
      
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insertcat"><i class="fas fa-plus"></i>

</button>


      <table id="datatable" class="table">
        <thead>
          <tr>
          
            {{-- <th scope="col">ID</th> --}}
            <th scope="col">Tên danh mục</th>
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($menuarticle as $menu)
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
        <form action="{{URL::to('/updatearticlecat')}}" method="POST" role="form">
          {{ csrf_field() }}
          <input type="hidden" name="articlecat_id" id="catid" value="{{ $menu->articlecat_id }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <input id="catname" name="articlecat_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="brand_name">
  </div>
  {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả nhãn hiệu</label>
                                    <textarea id="brandesc" name="brandesc"  rows="8" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select id="brandst" name="brandst" name="brand_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
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


          <tr>
            <input type="hidden" class="branddelete_val_id" value="">
            <td>{{ $menu->articlecat_name }}</td>
            <td>
        <button type="button" data-id="{{ $menu->articlecat_id }}"  class="btn btn-danger swalbutton">
          <span class="glyphicon glyphicon-trash" ></span> Xóa
        </button>
         <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatebrand" data-idcat="{{ $menu->articlecat_id }}" data-namecat="{{ $menu->articlecat_name }}"><i class="far fa-edit"></i> Sửa
 
</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    
    {{-- <footer class="panel-footer"> --}}
       <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$menuarticle->firstItem()}} đến {{$menuarticle->lastItem()}} trong tổng số {{$menuarticle->total()}}</small>
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
          {{$menuarticle->links()}}
        </div>
      </div>
    {{-- </footer> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="toast">
  
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
  text: "Bạn có chắc muốn xóa danh mục bài viết này này? Những bài viết nằm trong danh mục này cũng sẽ bị xóa",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
    	url:"{{ url('/deleteartcat') }}",
    	data: {
    		id:id
    	},
    	success:function(data){
        that.parent().parent().remove();
    		toast({
        title: 'success',
        message: 'Xóa danh mục bài viết thành công!',
        type: 'success',
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
    var name = button.data('namecat');
    var idbrand = button.data('idcat');

    var modal =$(this);
    modal.find('.modal-body #catname').val(name);
    modal.find('.modal-body #catid').val(idbrand);
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