@if($favorite->count() > 0)
<table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Tên sản phẩm</th>
                                      <th scope="col">Hình ảnh</th>
                                      <th scope="col">Lượt thích</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($favorite as $fav)
                                    <tr>
                                      <th scope="row">{{$fav['product_name']}}</th>
                                      <td>
                                         <img src="public/upload/product/{{$fav['product_image']}}" height="50" width="50">
                                      </td>
                                      <td>
                                       
                                        <span class="badge badge-pill badge-success">{{$fav['soluotthich']}}</span>
                                       
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                                <div class="row">

                                   <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$favorite->firstItem()}} đến {{$favorite->lastItem()}} trong tổng số {{$favorite->total()}}</small>
        </div>
        
                                <div style="float: right;" class="col-sm-7 text-right text-center-xs">                
                                 
                                  {!!$favorite->render()!!}
                                </div>
                                
                              </div>
@else
<table class="table">
        <thead>
            <tr>
                <span class="center" style="font-size: 25px;font-weight: bold;text-align: center;">Chưa có sản phẩm nào được yêu thích!</span>
            </tr>
        </thead>
    </table>
@endif