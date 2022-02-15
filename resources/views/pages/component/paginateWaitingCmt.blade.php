@if($rating->count() > 0)
<table id="datatable" class="table">
        <thead>
          <tr>
            {{-- <th scope="col">ID</th> --}}
            <th scope="col">Tên người đánh giá</th>
            <th scope="col">Số sao</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>

@foreach($rating as $rt)

          <tr>
            <input type="hidden" class="branddelete_val_id" value="{{ $rt->rating_cusid }}">
            <td>{{ $rt->customer->customer_name }}</td>
            <td>
              <div class="ratings">
                @for($i = 1;$i <= 5; $i++)
                <span class="{{ $i <= $rt->star ? 'active' : '' }}"><i class="fas fa-star"></i></span>
                @endfor
              </div>
            </td>
            <td>
            
            <a href="{{ url('/chitietsp/'.$rt->product->product_id) }}" target="_blank">{{ $rt->product->product_name }}</a></td>
            <td contenteditable class= "editcontent" data-ratingid="{{$rt->rating_id}}">{{ $rt->rating_content }}
              </td>
            <td>
              <button data-ratingid="{{$rt->rating_id}}" data-pro_id="{{$rt->product_id}}" data-star="{{$rt->star}}" class="btn btn-success approve"><i class="fas fa-check-circle"></i></button>
              <button data-ratingid="{{$rt->rating_id}}" class="btn btn-danger denined"><i class="fas fa-comment-slash"></i></button>
            </td>
          </tr>
        
      @endforeach
      
        </tbody>
      </table>
@else
<table class="table">
        <thead>
            <tr>
                {{-- <img src="{{asset('public/upload/nodata3.jpg')}}" class="center"  height="450" width="450"> --}}
                <span class="center" style="font-size: 25px;font-weight: bold;text-align: center;">Không có đánh giá đang chờ phê duyệt</span>
            </tr>
        </thead>
    </table>
@endif


