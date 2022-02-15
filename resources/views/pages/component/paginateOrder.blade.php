<style type="text/css">
    .center {
  display: block;
  margin-left: 300px;
  margin-right: auto;
  width: 50%;
}
</style>
@if($ordercus->count() > 0)
<table class="table">
        <thead>
          <tr>
            <th scope="col">Tên khách hàng</th>
             <th scope="col">Tổng tiền</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tình trạng đơn hàng</th>
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody id="rowresult">
     @foreach($ordercus as $key => $od)
     
          <tr>
            <input type="hidden" class="branddelete_val_id" value="{{ $od->order_id }}">
            <td>{{$od->customer_name}}</td>
            <td>{{number_format($od->total_price).' '.'VNĐ'}}</td>
            <td>{{$od->created_at}}</td>
            <td>@if($od->order_status==1)
              <div class="label label-default">Chưa xử lý</div>
              @else
              <div class="label-success label">Đã xử lý</div>
              @endif
            </td>
            <td>
        <a href="{{URL::to('/detailorder/'.$od->order_id)}}">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatebrand"><i class="fas fa-eye"></i>
  Chi tiết
</button>
</a>
            </td>
          </tr>
     @endforeach
        </tbody>
      </table>

      {{--     <footer class="panel-footer"> --}}
     <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$ordercus->firstItem()}} đến {{$ordercus->lastItem()}} trong tổng số {{$ordercus->total()}}</small>
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
          {{$ordercus->links()}}
        </div>
      </div>
    {{-- </footer> --}}
  </div>
</div>
@else
<table class="table">
        <thead>
            <tr>
                {{-- <img src="{{asset('public/upload/nodata3.jpg')}}" class="center"  height="450" width="450"> --}}
                <span class="center" style="font-size: 25px;font-weight: bold;text-align: center;">Không tìm thấy đơn hàng!</span>
            </tr>
        </thead>
    </table>

@endif