@extends('welcome')
@section('content')

<!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li class="active">Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-accordion">
                              
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12" style="float:none;margin:auto;">
                            {{-- <form action="{{ URL::to('/savecheckout') }}" method="POST">
                            	{{ csrf_field() }}
                                <div class="checkbox-form">
                                    <h3>Thông tin đặt hàng</h3>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Họ và tên <span class="required">*</span></label>
                                                <input placeholder="Điền họ & tên" type="text" name="shipping_cusname" class="shipping_cusname">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Địa chỉ <span class="required">*</span></label>
                                                <input placeholder="Điền địa chỉ của bạn" type="text" name="shipping_address" class="shipping_address">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email <span class="required">*</span></label>
                                                <input placeholder="Điền Email" type="email" name="shipping_email" class="shipping_email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Số điện thoại  <span class="required">*</span></label>
                                                <input type="text" name="shipping_phone" placeholder="Điền số điện thoại" class="shipping_phone">
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="different-address">
                                        
                                        <div class="order-notes">
                                            <div class="checkout-form-list">
                                                <label>Ghi chú đơn hàng</label>
                                                <textarea id="checkout-mess" cols="30" rows="10" placeholder="Thêm một số ghi chú cho đơn hàng (Nếu cần)." name="shipping_notes" class="shipping_notes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(Session::get('fee'))
                                <input type="hidden" name="order_fee" class="order_fee" value="{{ Session::get('fee') }}">
                                @else
                                <input type="hidden" name="order_fee" class="order_fee" value="10000">
                                @endif

                                @if(Session::get('coupon'))
                                	@foreach(Session::get('coupon') as $key => $cou)
                                <input type="hidden" name="order_coupon" class="order_coupon" value="{{ $cou['coupon_code'] }}">
                                	@endforeach
                                @else
                                <input type="hidden" name="order_coupon" class="order_coupon" value="không có coupon">
                                @endif
                                
                                
                                
                            </form> --}}
                            <br>

                            <form>
						          @csrf
						    <div class="form-group">
						    <label for="exampleInputEmail1">Chọn thành phố</label>
						    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
						      <option value="">----chọn thành phố----</option>
						      @foreach($city as $key => $ct) 
                                @if($ct->type == 'Tất cả') 
                                 <option hidden value="{{ $ct->matp }}">{{ $ct->name_city }}</option>
                                 @else
						              <option value="{{ $ct->matp }}">{{ $ct->name_city }}</option>
                                @endif
						      @endforeach                        
						    </select>
						  </div>
						    <div class="form-group">
						    <label for="exampleInputEmail1">Chọn quận huyện</label>
						    <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
						              <option value="">----chọn quận huyện----</option>                     
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Chọn xã phường thị trấn</label>
						    <select name="ward" id="ward" class="form-control input-sm m-bot15 ward">
						              <option value="">----chọn xã phường thị trấn----</option>                        
						    </select>
						  </div>
						 
						  <div class="order-button-payment">
                                    <input data-cartproid="{{Session::get('cart') ? count(Session::get('cart')) : 0}}" class="checkoutbtn" value="Đặt hàng" type="button">
                             </div>
						</form>
                             
                        </div>
                        
                    </div>
                    <br><br>
                    
                        
                    <br><br>

                    <div class="table-content table-responsive">
                                    <form action="{{ URL::to('/updatecartitem') }}" method="POST">
                                        @csrf
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-thumbnail">Hình ảnh</th>
                                                <th class="cart-product-name">Sản phẩm</th>
                                                <th class="li-product-price">Đơn giá</th>
                                                <th class="li-product-quantity">Số lượng</th>
                                                <th class="li-product-subtotal">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $total = 0;
                                            ?>
                                            @if(Session::get('cart')==true)
                                            @foreach(Session::get('cart') as $key => $value)
                                            <?php
                                                $subtotal = $value['product_price']* $value['product_qty'];
                                                $total += $subtotal;
                                            ?>
                                            <tr>
                                               
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{ asset('/public/upload/product/'.$value['product_img']) }}" alt="Li's Product Image" style="widows: 100px;height: 100px"></a></td>
                                                <td class="li-product-name"><a href="#">{{ $value['product_name'] }}</a></td>
                                                <td class="li-product-price"><span class="amount">{{ number_format($value['product_price']),0,',','.' }}đ</span></td>
                                                <td class="quantity">
                                                    
                                                    <div class="cart_quantity_button">
                                                        <input class="cart_quantity" value="{{ $value['product_qty'] }}" min="1" disabled type="number" name="cart_qty[{{ $value['session_id'] }}]" style="width: 50px;height: auto">
                                                        <input type="hidden" name="rowId" value="" class="form-control">
                                                       
                                                    </div>
                                                    
                                                </td>
                                                <td class="product-subtotal"><span class="amount">
                                                    {{ number_format($subtotal),0,',','.' }}đ
                                                </span></td>
                                            </tr>
                                            @endforeach
                                            
                                            @else
                                            <tr>
                                                <td colspan="6"><center>
                                            @php
                                            echo '<h2>Giỏ hàng trống</h2>';
                                            @endphp
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </form>
                                </div>
                                <form action="{{URL::to('/checkcoupon')}}" method="POST">
                                    @if(Session::get('cart'))
                                    @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code"  placeholder="Mã coupon" type="text">
                                                @if(!Session::get('coupon'))
                                                <button type="submit" class="btn btn-primary ml-2 applyCoupon" style="
                                                background-color: #c2cd4a;
                                                box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
                                                      padding: 15px 20px;
                                                      border-radius: 2px;
                                                      color: #fff;
                                                      font-size: 14px;
                                                      transition: all 200ms ease;
                                                      cursor: pointer;
                                                      
                                                      border: none;">
                                                        <i class='bx bxs-check-circle bx-tada' style="font-size:20px" ></i>
                                                        Áp dụng
                                                    </button>
                                                @else
                                                <a class="btn btn-danger ml-2" href="{{ URL::to('/unsetcoupon') }}"
                                                    style="margin-left: 5px;background-color: #ff1744;
                                                      padding: 15px 20px;
                                                      border-radius: 2px;
                                                      color: #fff;
                                                      font-size: 14px;
                                                      transition: all 200ms ease1
                                                      cursor: pointer;
                                                      box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
                                                      border: none;">
                                                       <i style="font-size:20px" class='bx bxs-trash bx-tada' ></i>
                                                    Xóa hiệu lực
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </form>
                            {{-- @if(Session::get('coupon'))
                            <div class="row">
                                    <div class="col-2">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                               <a class="btn btn-danger" href="{{ URL::to('/unsetcoupon') }}"
                                                    style="margin-left: 5px;background-color: #ff1744;
                                                      padding: 15px 20px;
                                                      border-radius: 10px;
                                                      color: #fff;
                                                      font-size: 14px;
                                                      transition: all 200ms ease;
                                                      cursor: pointer;
                                                      box-shadow: 0 4px 20px 0 rgba(61, 71, 82, 0.1), 0 0 0 0 rgba(0, 127, 255, 0);
                                                      border: none;">
                                                        <i class="fas fa-trash"></i>
                                                    Xóa hiệu lực
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif --}}
                              
                            </div>
                </div>
            </div>
            <!--Checkout Area End-->
@endsection

@section('scripts')
<?php
                                $messagesc = Session::get('messagesc');
                                $messagef = Session::get('messagef');
                                if($messagesc){
                                    echo '<script type="text/javascript">
                                    Swal.fire(
                                      "Thông báo",
                                      "'.$messagesc.'",
                                      "success"
                                    );
                             </script>';
                             Session::put('messagesc',null);
                                }else if($messagef){
                                     echo '<script type="text/javascript">
                                    Swal.fire(
                                      "Thông báo",
                                      "'.$messagef.'",
                                      "error"
                                    );
                             </script>';
                             Session::put('messagef',null);
                                }
                            ?>
<script type="text/javascript">
	$(document).ready(function(){
        $('.hm-menu').remove();


		$('.choose').on('change',function(){
        var action = $(this).attr('id');
        var matp = $(this).val();
        var _token = $('input[name="_token"]').val();
        // alert(action);
        // alert(matp);
        // alert(_token);
        var rs = '';
        if(action =='city'){
          rs = 'province';
        }else{
          rs = 'ward';
        }
        $.ajax({
          url: '{{ url('/selectdeliverycheckout') }}',
          method: 'POST',
          data:{action:action,matp:matp,_token:_token},
          success:function(data){
            $('#'+rs).html(data);
          }
        });
      });
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
        
		$('.checkoutbtn').click(function(){
            var session_id = $(this).data('cartproid');
			var matp = $('.city').val();
			var maqh = $('.province').val();
			var maxa = $('.ward').val();
			var _token = $('input[name="_token"]').val();
            if (session_id == 0) {
                    Swal.fire(
                      'Thông báo!',
                      'Vui lòng thêm sản phẩm vào giỏ trước khi thanh toán!',
                      'error'
                    );
                }
			else if(matp == "" && maqh == "" && maxa == ""){
				Swal.fire(
                      'Thông báo!',
                      'Vui lòng chọn đầy đủ trường để tính phí vận chuyển!',
                      'error'
                    );
			}
            
                else{
				$.ajax({
          url: '{{ url('/caculatefee') }}',
          method: 'POST',
          data:{matp:matp,maqh:maqh,maxa:maxa,_token:_token},
          success:function(data){
            console.log(data);
          }
        }).then(function(){
            window.location = "{{ url('/continueorder') }}";
        });
			}
			
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.sendorder').click(function(){
			swal({
				  title: "Xác nhận đặt hàng",
				  text: "Đơn hàng sẽ được gửi, bạn có muốn đặt hàng?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    var shipping_cusname = $('.shipping_cusname').val();
			var shipping_email = $('.shipping_email').val();
			var shipping_address = $('.shipping_address').val();
			var shipping_phone = $('.shipping_phone').val();
			var shipping_notes = $('.shipping_notes').val();
			var order_fee = $('.order_fee').val();
			var order_coupon = $('.order_coupon').val();
			var shipping_method = $('.selelectpayment').val();
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: '{{url('/confirmorder')}}',
				method: 'POST',
				data:{shipping_cusname:shipping_cusname,shipping_notes:shipping_notes,shipping_phone:shipping_phone,shipping_address:shipping_address,shipping_email:shipping_email,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
				success:function(data){
					swal({
                      title: "Thông báo!",
                      text: "Đặt hàng thành công vui lòng kiểm tra email!",
                      icon: "success",
                      button: "OK",
                        }).then(function(){
                            window.location = "{{ url('/thank') }}";
                        });

					// alertify.success('Đặt hàng thành công');
				}
			});
			// window.setTimeout(function(){
			// 	location.reload();
			// },3000);
				  } else {
				    swal({
						  title: "Thông báo",
						  text: "Dơn hàng vẫn chưa được gửi!",
						  icon: "error",
						  button: "Đồng ý",
						});
				  }
				});
			
			
		});
	});
</script>
@endsection
