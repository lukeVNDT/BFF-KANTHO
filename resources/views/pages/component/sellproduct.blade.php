@if($sellproduct->count() > 0)
<table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Tên sản phẩm</th>
                                      <th scope="col">Hình ảnh</th>
                                      <th scope="col">Đã bán</th>
                                      <th scope="col">Hành động</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($sellproduct as $sell)
                                    <tr>
                                      <th scope="row">{{$sell['product_name']}}</th>
                                      <td>
                                         <img src="public/upload/product/{{$sell['product_image']}}" height="50" width="50">
                                      </td>
                                      <td>
                                       
                                        <span class="badge badge-pill badge-success">{{$sell['tongban']}}</span>
                                       
                                      </td>
                                      <td>
                                          <a href="{{ URL::to('/updateproduct/'.$sell['product_id']) }}" class="btn btn-warning">
                                           Chi tiết
                                          </a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                                 <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$sellproduct->firstItem()}} đến {{$sellproduct->lastItem()}} trong tổng số {{$sellproduct->total()}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
         
          {{$sellproduct->links()}}
        </div>
      </div>
@else
<table class="table">
        <thead>
            <tr>
                <span class="center" style="font-size: 25px;font-weight: bold;text-align: center;">Chưa có sản phẩm nào được mua!</span>
            </tr>
        </thead>
    </table>
@endif