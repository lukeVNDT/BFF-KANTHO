@if(is_array($product) || is_object($product))
@foreach($product as $pro)
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                   <!-- Product Details Left -->
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 65px;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('/public/upload/product/'.$pro->product_img) }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('/public/upload/product/'.$pro->product_img) }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('/public/upload/product/'.$pro->product_img) }}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                                    <!--// Product Details Left -->
                                </div>
                                <?php
                                        $tbsao = 0;
                                        if($pro->product_total_rating)
                                        {
                                            $tbsao = round($pro->product_total_star / $pro->product_total_rating, 2);
                                            
                                        }
                                    ?>
                                    <input type="hidden" class="cart_product_id_{{ $pro->product_id }}" value="{{ $pro->product_id }}">
                                        <input type="hidden" class="cart_product_name_{{ $pro->product_id }}" value="{{ $pro->product_name }}">
                                        <input type="hidden" class="cart_product_img_{{ $pro->product_id }}" value="{{ $pro->product_img }}">
                                        <input type="hidden" class="cart_product_price_{{ $pro->product_id }}" value="{{ $pro->product_price }}">
                                        <input type="hidden" class="cart_product_quantity_{{ $pro->product_id }}" value="{{ $pro->product_quantity }}">
                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>{{ $pro->product_name }}</h2>
                                            <div class="rating-box pt-20">
                                                <ul class="rating">
                                                                 @for($i = 1; $i <= 5; $i++)
                                            <a><i class="fa fa-star {{ $i <= $tbsao ? 'active' : '' }}"></i></a>
                                            @endfor
                                                            </ul>
                                            </div>
                                            <div class="price-box pt-20">
                                                <span class="new-price new-price-2">{{ number_format($pro->product_price).' '.'VNĐ' }}</span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>{{ $pro->product_desc }}
                                                    </span>
                                                </p>
                                            </div>
                                            
                                            <div class="single-add-to-cart">
                                                <form action="#" class="cart-quantity">
                                                    <div class="quantity">
                                                        <label>Số lượng</label>
                                                          <div class="cart-plus-minus">
                                                    <input id="cart_product_qty_{{ $pro->product_id }}" value="1" min="1" type="number">
                                                </div>
                                                    </div>
                                                    <button style="border-radius: 10px;background-color: #f6b6cc;color: #fff; font-size: 14px;" id="addToCart" class="add-to-cart" data-id_pro="{{ $pro->product_id }}" type="button">Thêm vào giỏ</button>
                                                </form>
                                            </div>
                                            <div class="product-additional-info pt-25">
                                                <button id="addFavoritequickView" 
                                                    data-productid="{{$pro->product_id}}"
                                                    data-customerid="{{Session::get('customer_id')}}" 
                                                    class="btn btn-lg"
                                                    >
                                                <i style="font-size:20px;" class="{{ $favorite > 0 ? 'bx bxs-heart bx-tada' : 'bx bx-heart bx-tada' }}"></i>
                                            </button>
                                                <div class="product-social-sharing pt-25">
                                                    <ul>
                                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endforeach
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


    
     $('#addFavoritequickView').click(function(){
            var product_id = $(this).data('productid');
            var customer_id = $(this).data('customerid');
            var heartIconAdded = '<i style="font-size:20px;" class="bx bxs-heart bx-tada"></i>';
            var heartIcon = '<i style="font-size:20px;" class="bx bx-heart bx-tada"></i>';
            $.ajax({
                url: "{{ url('/addfavorite') }}",
                method: "POST",
                data: {
                    "_token":"{{ csrf_token() }}",
                    product_id: product_id,
                    customer_id: customer_id
                },
                success:function(data){
                    if(data.done){
                    $('#addFavoritequickView').html(heartIconAdded);
                    Toast.fire({
                  icon: 'success',
                  title: data.message
                });
                }
                else if (data.require){
                     Toast.fire({
                  icon: 'warning',
                  title: data.message
                });
                }
                else
                {
                    $('#addFavoritequickView').html(heartIcon);
                     Toast.fire({
                  icon: 'success',
                  title: data.message
                });
                }

                }
            });
      });
        $("input[type=number]").click(function(e) {

    $(this).attr( 'value', $(this).val() );

});


    function render(res){
            $('.minicart').empty();
            $('.minicart').html(res);
            $('.cart-item-count').text($('#idqty').val());
        };

        $('#addToCart').click(function(){
            var id = $(this).data('id_pro');
            var cart_product_id = $('.cart_product_id_'+ id).val();
            var cart_product_name = $('.cart_product_name_'+ id).val();
            var cart_product_quantity = $('.cart_product_quantity_'+ id).val();
            var cart_product_img = $('.cart_product_img_'+ id).val();
            var cart_product_price = $('.cart_product_price_'+ id).val();
            var cart_product_qty = $('#cart_product_qty_'+ id).val();
            var _token = $('input[name="_token"]').val();
             var cart_current_qty = $('.currentqty_'+ id).val();
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
</script>