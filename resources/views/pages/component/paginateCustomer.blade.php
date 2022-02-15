<style type="text/css">
    .center {
  display: block;
  margin-left: 300px;
  margin-right: auto;
  width: 50%;
}
</style>
@if($list_user->count() > 0)
<table id="datatable" class="table">
        <thead>
          <tr>
          
            <th scope="col">Tên Khách hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Thành viên thân thiết</th>
            <th style="width:300px;">Hành động</th>
          </tr>
        </thead>
        <tbody>

@foreach($list_user as $value)
          <tr>
            <input type="hidden" class="branddelete_val_id" value="">
            <td>{{ $value->customer_name }}</td>
            <td>{{ $value->customer_email }}</td>
            <td><span class="text-ellipsis">
              <?php
            if($value->customer_loyal==1){
              ?>
               <div class="label-success label">Thành viên thân thiết</div>
        <?php
      }
            else{
              ?>
              <div class="label label-default">Thành viên thường</div>
        <?php
      }
      ?> 
            </span></td>
            <td>
              @if($value->customer_loyal =='')
              <button type="button" data-id="1" data-customerid="{{ $value->customer_id }}"  class="btn btn-success loyalbtt">
          <i class="fas fa-crown"></i> Thân thiết

        </button>
        @else
         <button type="button" data-id="0" data-customerid="{{ $value->customer_id }}"  class="btn btn-warning disableloyal">
         <i class="fas fa-angle-double-down"></i>
          Thường
        </button>
        @endif
        @if($value->isban == 0)
        <button class="btn btn-secondary banuser" data-id="{{ $value->customer_id }}"><i class="fas fa-users-slash"></i>Chặn</button>
        @else
        <button class="btn btn-primary unbanuser" data-id="{{ $value->customer_id }}"><i class="fas fa-user-check"></i>Bỏ Chặn</button>
        @endif
        <button
         type="button" data-id="{{ $value->customer_id }}"  class="btn btn-danger swalbutton">
          <span class="glyphicon glyphicon-trash" ></span> Xóa
        </button>
        @endforeach
        {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatebrand" data-idbrand="{{ $brand->brand_id }}" data-namebrand="{{ $brand->brand_name }}" data-descbrand="{{ $brand->brand_desc }}" data-statusbrand="{{ $brand->brand_status }}"><span class="glyphicon glyphicon-pencil"></span>
  Sửa
</button> --}}
            </td>
          </tr>
        </tbody>
      </table>
      
    
    {{-- <footer class="panel-footer"> --}}
       <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$list_user->firstItem()}} đến {{$list_user->lastItem()}} trong tổng số {{$list_user->total()}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
         
          {{$list_user->links()}}
        </div>
      </div>
    {{-- </footer> --}}
@else
<table class="table">
        <thead>
            <tr>
              <br><br><br>
                {{-- <img src="{{asset('public/upload/nodata3.jpg')}}" class="center"  height="450" width="450"> --}}
                <span class="center" style="font-size: 25px;font-weight: bold;text-align: center;">Không tìm thấy dữ liệu!</span>
            </tr>
        </thead>
    </table>
@endif
<script type="text/javascript">
  $('.swalbutton').click(function(e){
      e.preventDefault();
      var that = $(this);
      var id = $(this).data('id');
           swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa tài khoản khách hàng này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:`{{ url('/deletecus/${id}') }}`,
      success:function(data){
        that.parent().parent().remove();
        getInitialData();
        toast({
                title: "Thông báo",
                message: "Xóa tài khoản khách hàng thành công!",
                type: "success",
                duration: 7000
                });
      }
    });
    

  } else {
    swal("Tài khoản vẫn an toàn!");
  }
});
    });
</script>