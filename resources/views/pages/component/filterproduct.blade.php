@if($result->count() > 0)
@foreach($result as $key => $value)
<div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    @csrf
                                                    <input type="hidden" class="cart_product_id_{{ $value->product_id }}" value="{{ $value->product_id }}">
                                        <input type="hidden" class="cart_product_name_{{ $value->product_id }}" value="{{ $value->product_name }}">
                                        <input type="hidden" class="cart_product_img_{{ $value->product_id }}" value="{{ $value->product_img }}">
                                        <input type="hidden" class="cart_product_quantity_{{ $value->product_id }}" value="{{ $value->product_quantity }}">
                                        
                                        <input type="hidden" class="cart_product_price_{{ $value->product_id }}" value="{{ $value->product_price }}">
                                        <input type="hidden" class="cart_product_qty_{{ $value->product_id }}" value="1">
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="{{URL::to('/chitietsp/'.$value->product_id)}}">
                                                                <img src="{{ URL::to('/public/upload/product/'.$value->product_img) }}" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                         <?php
                                                            $tbsao = 0;
                                                            if($value->product_total_rating)
                                                            {
                                                                $tbsao = round($value->product_total_star / $value->product_total_rating, 2);
                                                                
                                                            }
                                                        ?>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a href="product-details.html">Đánh giá</a>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            @for($i = 1; $i <= 5; $i++)
                                                                        <a><i class="fa fa-star {{ $i <= $tbsao ? 'active' : '' }}"></i></a>
                                                                        @endfor
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="single-product.html">{{ $value->product_name }}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">{{ number_format($value->product_price).' '.'VNĐ' }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a class="add-to-cart" data-id_pro="{{ $value->product_id }}" style="background-color: #f48fb1;color: #fff; font-size: 12px; box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;border-radius: 35px" type="button">Thêm vào giỏ</a></li>
                                                                    <li><a href="{{ URL::to('/quickview/'.$value->product_id) }}" title="quick view" class="quick-view-btn xemnhanh" data-toggle="modal" data-target="#product_view"><i class="fa fa-eye"></i></a></li>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

@endforeach
<br><br><br><br>
                                    <div class="paginatoin-area" style="width:1000px;">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p>Hiển thị kết quả {{$result->firstItem()}} đến {{$result->lastItem()}} trong tổng số {{$result->total()}}</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box">
                                                    {{$result->links()}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
@else
<br><br><h3 class="ml-3">Không tìm thấy sản phẩm nào phù hợp!</h3></span>
@endif

<script type="text/javascript">
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
     $('.add-to-cart').click(function(e){
            e.preventDefault();
            var id = $(this).data('id_pro');
            var cart_product_id = $('.cart_product_id_'+ id).val();
            var cart_product_name = $('.cart_product_name_'+ id).val();
            var cart_product_img = $('.cart_product_img_'+ id).val();
            var cart_product_quantity = $('.cart_product_quantity_'+ id).val();
            var cart_product_price = $('.cart_product_price_'+ id).val();
            var cart_product_qty = $('.cart_product_qty_'+ id).val();
            var cart_current_qty = $('.currentqty_'+ id).val();
            var _token = $('input[name="_token"]').val();
             if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
                Swal.fire(
                                      'Thông báo!',
                                      'Không thể thêm sản phẩm vượt quá số lượng trong kho, số lượng sản phẩm có trong kho '+cart_product_quantity,
                                      'error'
                                    );
             }
             else
             {
             if(parseInt(cart_current_qty) + parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
                Swal.fire(
                                      'Thông báo!',
                                      'Số lượng sản phẩm đã hết, không thể tiếp tục thêm sản phẩm vào giỏ, số lượng sản phẩm có trong kho '+cart_product_quantity,
                                      'error'
                                    );
            }
            else {
               $.ajax({
                url: '{{url('/addcartajax')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_img:cart_product_img,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                success:function(res){
                    var totalperproduct = parseInt(cart_current_qty) + parseInt(cart_product_qty);
                    $('.currentqty_'+ id).val(totalperproduct);
                    render(res);
                    Toast.fire({
                  icon: 'success',
                  title: 'Đã thêm sản phẩm vào giỏ'
                });
                }
            }); 
            }
            }
            
        });

function render(res){
            $('.minicart').empty();
            $('.minicart').html(res);
            $('.cart-item-count').text($('#idqty').val());
        };

</script>