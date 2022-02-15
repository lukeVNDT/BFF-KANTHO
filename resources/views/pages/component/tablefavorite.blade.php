<style type="text/css">
    .center {
  display: block;
  margin-left: 300px;
  margin-right: auto;
  width: 50%;
}
</style>
@if($fv->count() > 0)
<table class="table loadlai">
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Thông tin</th>
        <th>Giá tiền</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fv as $favorite)
      <tr>
      <td>{{ $favorite->product->product_name }}</td>
      <td><img height="80" width="80" src="{{ asset('public/upload/product/'.$favorite->product->product_img) }}"></td>
      <td>{{ $favorite->product->product_desc }}</td>
      <td>{{ number_format($favorite->product->product_price ).' '.'VNĐ'}}</td>
      <td><a href="{{ url('deletefavorite/'.$favorite->product_id) }}" class="btn btn-danger deletefavorite"><i style="font-size:20px;" class='bx bx-trash mt-1' ></i>
</a></td>
    </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$fv->firstItem()}} đến {{$fv->lastItem()}} trong tổng số {{$fv->total()}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
        
          {{$fv->links()}}
        </div>
      </div>
  @else
  <table class="table">
        <thead>
            <tr>
                <img src="{{asset('public/upload/nodata3.jpg')}}" class="center"  height="450" width="450">
                <span class="center" style="font-size: 25px;font-weight: bold;text-align: center;">Chưa có sản phẩm yêu thích được thêm!</span>
            </tr>
        </thead>
    </table>
  @endif

  <script type="text/javascript">
    $(document).ready(function(){
      const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

      function getInitialData(){
      $.ajax({
        url:"{{url('/initialfavorite')}}",
        success:function(data){
          $('.renderTable').html(data);
        }
      });
    }

       $('.deletefavorite').click(function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        let that = $(this);
        $.ajax({
            url:url,
            method:"GET",
            success:function(data){
              Toast.fire({
              icon: 'success',
              title: 'Đã bỏ yêu thích sản phẩm'
            });
            that.parent().parent().remove();
            getInitialData();
            }
        });
          
       
    });
    });
    
   
  </script>