@if($product->count() > 0)
@foreach($product as $pro)
<div class="media">
            <a class="pull-left" href="{{URL::to('/chitietsp/'.$pro->product_id)}}">
                <img class="media-object" width="50" src="{{ URL::to('/public/upload/product/'.$pro->product_img) }}">
            </a>
            <div class="media-body">
                <a href="{{URL::to('/chitietsp/'.$pro->product_id)}}">
                    <h4 class="media-heading">{{$pro->product_name}}</h4>
                </a>
                
                <p>{{number_format($pro->product_price).' '.'VNĐ'}}</p>
            </div>
        </div>
@endforeach
@else
<div class="media">
           {{--  <a class="pull-left" href="">
                <img class="media-object" width="50" src="{{ asset('/public/frontend/limupa/images/shipping-icon/2.png') }}">
            </a> --}}
            <div class="media-body">
                <h4 class="media-heading">Không tìm thấy sản phẩm phù hợp!</h4>
               
            </div>
        </div>
@endif