@extends('welcome')
@section('content')
<style type="text/css">
    .spinner-border
    {
        margin-top: 1px;
        height: 20px;
        width: 20px;
    }
    .errors {
      color: red;
   }

</style>

<div class="checkout-area pt-60 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-accordion">
                              
                                <!--Accordion Start-->
                                <h3>Bạn đã có các thông tin về địa chỉ? <span id="showcoupon">Vui lòng xác nhận để hệ thống lấy thông tin</span></h3>
                                <div id="checkout_coupon" class="coupon-checkout-content">
                                  
                                   {{--  <button data-cusid="{{ Session::get('customer_id') }}" class="btn btn-success xacnhan">Xác nhận <i class="fas fa-check"></i></button> --}}
                                   <button data-cusid="{{ Session::get('customer_id') }}" type="submit" name="updateqty" class="btn btn-primary xacnhan" style="
                                                background-color: #c2cd4a;
                                                      padding: 15px 20px;
                                                      border-radius: 10px;
                                                      color: #fff;
                                                      font-size: 14px;
                                                      transition: all 200ms ease;
                                                      cursor: pointer;
                                                      box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
                                                      border: none;">
                                                        
                                                        Xác nhận
                                                    </button>
                                </div>
                                <!--Accordion End-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
<div class="col-lg-6 col-12" {{-- style="float:none;margin:auto;" --}}>
                            <div class="your-order">
                                <h3>Hóa đơn của bạn</h3>
                                <div class="your-order-table table-responsive">
                                  
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Sản phẩm</th>
                                                <th class="cart-product-total">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                              @if(Session::get('cart')==true)
                                            {{-- @foreach($content as $value) --}}
                                            <?php
                                                $total = 0;
                                            ?>
                                  @foreach(Session::get('cart') as $key => $value)
                                            <?php
                                                $subtotal = $value['product_price']* $value['product_qty'];
                                                $total += $subtotal;
                                            ?>
                                            <tr class="cart_item">
                                              <td class="cart-product-name"> {{ $value['product_name'] }}<strong class="product-quantity"> {{ 'x'.$value['product_qty'] }}</strong></td>
                                              <td class="cart-product-total"><span class="amount">{{ number_format($value['product_price']).' '.'VNĐ' }}</span></td>  
                                            </tr>
                                            
                                         @endforeach
                                         <tr class="cart-subtotal">
                                                <th>Tổng</th>
                                                <td><span class="amount">{{ number_format($total).' '.'VNĐ' }}</span></td>
                                            </tr>
                                    @endif
                                        </tbody>
                                        <tfoot>
                                            
                                            @if(Session::get('coupon'))
                                              @foreach(Session::get('coupon') as $key=> $cou)
                                                @if($cou['coupon_cond']==1)
                                                  <tr class="cart-subtotal">
                                                      <th>Mã giảm</th>
                                                      <td><span class="amount">{{ $cou['coupon_method'] }}%</span></td>
                                                      <p>
                                                        @php
                                                        $total_coupon = ($total*$cou['coupon_method'])/100;
                                                               echo '<tr class="cart-subtotal">
                                                            <th>Số tiền giảm</th>
                                                            <td><span class="amount">'.number_format($total_coupon).' '.'VNĐ'.'</span></td>'
                                                        @endphp
                                                      </p>
                                                      <p>
                                                        @php
                                                        $total_after_coupon = $total - $total_coupon;
                                                        @endphp
                                                      </p>
                                                  </tr>
                                                 @elseif($cou['coupon_cond']==2)
                                            <tr class="cart-subtotal">
                                                      <th>Mã giảm</th>
                                                      <td><span class="amount">{{ number_format($cou['coupon_method'],0,',','.') }}VNĐ</span></td>
                                                      <p>
                                                        @php
                                                        $total_coupon = $total - $cou['coupon_method'];
                                                     
                                                        @endphp
                                                      </p>
                                                      <p>
                                                        @php
                                                        $total_after_coupon = $total_coupon;
                                                      //  echo '<tr class="cart-subtotal">
                                                      // <th>tổng đã giảm</th>
                                                      // <td><span class="amount">'.number_format($total_coupon).' '.'VNĐ'.'</span></td>'
                                                        @endphp
                                                      </p>
                                                  </tr>
                                            @endif
                                              @endforeach
                                           @endif
                                           {{--  <?php
                                                $total = 0;
                                            ?> --}}
                                           @if(Session::get('feemoney'))
                                           <?php
                                            $total_after_fee = $total + Session::get('feemoney');
                                            $totalnofee = $total;
                                            ?>
                                           <tr class="cart-subtotal">
                                            <input type="hidden" name="totalall" value="{{ $total_after_fee }}" class="totalkfree">
                                          <th>Phí vận chuyển</th>
                                              <td><span class="amount">{{ number_format(Session::get('feemoney'),0,',','.') }}VNĐ</span></td>
                                            {{-- @elseif(Session::get('feemoney'))
                                            <?php
                                            $total_after_fee = $total + Session::get('feemoney');
                                            $totalnofee = $total;
                                            ?>
                                           <tr class="cart-subtotal">
                                            <input type="hidden" name="totalall" value="{{ $total_after_fee }}" class="totalkfree">
                                          <th>Phí vận chuyển</th>
                                              <td><span class="amount">{{ number_format(Session::get('feemoney'),0,',','.') }}VNĐ</span></td> --}}
                                           @endif
                                            
                                           
                                            @php
                                            if(Session::get('feemoney') && !Session::get('coupon')){
                                              $total_after = $total_after_fee;
                                              echo '<tr class="order-total">
                                                <th>Thành tiền</th>
                                                <td><strong><span class="amount">'.number_format($total_after,0,',','.').'VNĐ'.'</span></strong></td>
                                            </tr>';
                                        }
                                            else if(Session::get('feemoney') && Session::get('coupon')){
                                              $total_after = $total_after_coupon;
                                              $total_after = $total_after + Session::get('feemoney');
                                              echo '<tr class="order-total">
                                                <th>Thành tiền</th>
                                                <td><strong><span class="amount">'.number_format($total_after,0,',','.').'VNĐ'.'</span></strong></td>
                                            </tr>';
                                        }
                                            else{
                                              $total_after = $total;
                                              echo '<tr class="order-total">
                                                <th>Thành tiền</th>
                                                <td><strong><span class="amount">'.number_format($total_after,0,',','.').'VNĐ'.'</span></strong></td>
                                            </tr>';
                                            }
                                            @endphp
                                        </tfoot>
                                    </table>
                                    
                                </div>

                               {{--  <form action="{{URL::to('/orderplace')}}" method="POST">
                                  {{ csrf_field() }}
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div class="form-group">

                <label for="exampleInputEmail1">Chọn phương thức thanh toán</label>
                <select name="selelectpayment" class="form-control input-sm m-bot15 selelectpayment">
                          <option value="">----chọn phương thức----</option>   
                          <option value="1">Thanh toán khi nhận hàng</option>                        
                </select>
             

                                        
                                      </div>

                                    </div>

                                </div>
                            </form> --}}

                            </div>
                        </div>
                        <div class="col-lg-6 col-12" >
                           
                           {{--  <form action="{{ URL::to('/savecheckout') }}" method="POST"> --}}
                              {{ csrf_field() }}
                              @if(Session::get('cart')==true)
                                            {{-- @foreach($content as $value) --}}
                                            <?php
                                                $total = 0;
                                            ?>
                                  @foreach(Session::get('cart') as $key => $value)
                                            <?php
                                                $subtotal = $value['product_price']* $value['product_qty'];
                                                $total += $subtotal;
                                            ?>
                                  @endforeach
                                 
                                  @if(Session::get('coupon'))
                                              @foreach(Session::get('coupon') as $key=> $cou)
                                                @if($cou['coupon_cond']==1)
                                                <?php
                                                  $total_coupon = ($total*$cou['coupon_method'])/100;
                                                ?>
                                                @elseif($cou['coupon_cond']==2)
                                                <?php
                                                  $total_coupon = $total - $cou['coupon_method'];
                                                ?>
                                                @endif
                                              @endforeach
                                              
                                  @endif
                                   @if(Session::get('feemoney') && !Session::get('coupon'))
                                           <?php
                                            $total_after_fee = $total + Session::get('feemoney');
                              
                                            ?>
                                    
                                  @elseif(Session::get('feemoney') && Session::get('coupon'))
                                            <?php
                                            $total_after_fee = $total - $total_coupon + Session::get('feemoney');
                                            ?>
                                    
                                  @endif
                              @endif
                              
                                           <input type="hidden" id="cusid" name="customer_id" value="{{ Session::get('customer_id') }}" >
                                            <input type="hidden" id="totalAll" name="tongtatca" value="{{ $total_after_fee }}">
                                <form class="validateOrder" method="POST">
                                    
                                    <h3>Thông tin đặt hàng</h3>
                                    <div class="row">
                                        <div class="loadtt">
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Họ và tên <span class="required">*</span></label>
                                                <input style="width: 570px;" placeholder="Điền họ & tên" type="text" name="shipping_cusname" class="shipping_cusname">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Địa chỉ <span class="required">*</span></label>
                                                <input style="width: 570px;" placeholder="Điền địa chỉ của bạn" type="text" name="shipping_address" class="shipping_address">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email <span class="required">*</span></label>
                                                <input style="width: 570px;" placeholder="Điền Email" type="email" name="shipping_email" class="shipping_email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Số điện thoại  <span class="required">*</span></label>
                                                <input style="width: 570px;" type="text" name="shipping_phone" placeholder="Điền số điện thoại" class="shipping_phone">
                                            </div>
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
                                 <div style="float:none;margin:auto;">
                                            <button data-paymentmethod ="1" style="width: 180px;margin-left: 80px;margin-bottom: 30px;" class="register-button mt-0 sendorder" type="submit" name="sendorder" style="font-size: 1rem">Thanh toán COD</button>
                                        </div>
                                        
                                </form>
                                <div>
                                            <button style="width: 200px;margin-left: 50px;margin-bottom: 30px;" class="register-button mt-0 vnpay" type="submit" name="payment" value="2" style="font-size: 1rem">Thanh toán online</button>
                                        </div>
                                @if(Session::get('fee'))
                                <input type="hidden" name="order_fee" class="order_fee" value="{{ Session::get('fee') }}">
                                @endif

                                @if(Session::get('coupon'))
                                  @foreach(Session::get('coupon') as $key => $cou)
                                <input type="hidden" name="order_coupon" class="order_coupon" value="{{ $cou['coupon_code'] }}">
                                  @endforeach
                                @else
                                <input type="hidden" name="order_coupon" class="order_coupon" value="không có coupon">
                                @endif
                               
                                
                                
                          {{--   </form> --}}
                            <br>
                      </div>
                  </div>
              </div>
                        <br></br>

@endsection
@section('scripts')
<script type="text/javascript">
  <?php
                                $messagesc = Session::get('messagesc');
                                $messagef = Session::get('messagef');
                                if($messagesc){
                                    echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$messagesc.'",
                                      icon: "success",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('messagesc',null);
                                }elseif($messagef){
                                     echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$messagef.'",
                                      icon: "error",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('messagef',null);
                                }
                            ?>

var spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>';



    if($('.validateOrder'). length > 0){
                                                $('.validateOrder').validate({
                                                errorClass:"errors",
                                                rules: {
                                                    shipping_cusname:{
                                                        required: true,
                                                    },
                                                    shipping_address:{
                                                        required: true,
                                                    },
                                                    shipping_email: {
                                                        required: true,

                                                    },
                                                    shipping_phone: {
                                                        required: true,
                                                        number:true,
                                                    },
                                                    shipping_notes: {
                                                        required: true,

                                                    },
                                                },
                                                messages:{
                                                    shipping_address:{
                                                        required:"Vui lòng không để trống địa chỉ",
                                                    },
                                                    shipping_cusname:"Tên của bạn không được để trống",
                                                    shipping_email:{
                                                        required:"Email không được bỏ trống",
                                                    },
                                                    shipping_phone:{
                                                        required:"Số điện thoại không được để trống",
                                                        number:"Vui lòng chỉ nhập số điện thoại cho trường này",
                                                    },
                                                    shipping_notes:{
                                                        required:"Vui lòng viết một số ghi chú cho đơn hàng",
                                                    },
                                                },
                                                submitHandler: function(form)
                                                {
                                                    OnOrder(form);
                                                }
                                            }); 
                                            }

    function OnOrder(form){
        Swal.fire({
                  title: 'Xác nhận đơn đặt hàng',
                  text: "Đơn hàng của bạn sẽ được gửi cho cho chúng tôi, bạn có muốn tiếp tục",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Đặt hàng'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $('.sendorder').html(spinner);
                    var shipping_cusname = $('.shipping_cusname').val();
      var shipping_email = $('.shipping_email').val();
      var shipping_address = $('.shipping_address').val();
      var shipping_phone = $('.shipping_phone').val();
      var shipping_notes = $('.shipping_notes').val();
      var order_fee = $('.order_fee').val();
      var order_coupon = $('.order_coupon').val();
      var shipping_method = $('.sendorder').data('paymentmethod');
      var total_price = $('#totalAll').val();
      var _token = $('input[name="_token"]').val();
        setTimeout(function(){
            $.ajax({
            url: '{{url('/confirmorder')}}',
        method: 'POST',
        data:{total_price:total_price,shipping_cusname:shipping_cusname,shipping_notes:shipping_notes,shipping_phone:shipping_phone,shipping_address:shipping_address,shipping_email:shipping_email,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
        success:function(data){
             Swal.fire(
                      'Thông báo',
                      'Đặt hàng thành công',
                      'success'
                    ).then(function(){window.location = "{{url('/thank')}}"});
        }
        });
        },3000);
                  }
                  else
                  {
                     Swal.fire(
                      'Thông báo',
                      'Đơn hàng chưa được gửi!',
                      'warning'
                    );
                  }
                });
    }

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
     $('.hm-menu').remove();

     $('.vnpay').click(function(e){
        e.preventDefault();
        var customer_id = $('#cusid').val();
        var tongtatca = $('#totalAll').val();
        var shipping_cusname = $('.shipping_cusname').val();
      var shipping_email = $('.shipping_email').val();
      var shipping_address = $('.shipping_address').val();
      var shipping_phone = $('.shipping_phone').val();
      var shipping_notes = $('.shipping_notes').val();
      var order_fee = $('.order_fee').val();
      var order_coupon = $('.order_coupon').val();
      var payment = $(this).val();
      var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/savecheckout')}}",
            method:"POST",
            data:{
                customer_id:customer_id,
                tongtatca:tongtatca,
                shipping_cusname:shipping_cusname,
                shipping_email:shipping_email,
                shipping_address:shipping_address,
                shipping_phone:shipping_phone,
                shipping_notes:shipping_notes,
                order_fee:order_fee,
                order_coupon:order_coupon,
                payment:payment,
                "_token":"{{ csrf_token() }}"
            },
            success:function(data){
                if(data == "done")
                {
                    window.location.href = "{{url('/vnpaypayment')}}";
                }
                else
                {
                    Toast.fire({
                                                          icon: 'error',
                                                          title: 'Quý khách vui lòng điền đầy đủ thông tin để xác nhận đặt hàng!'
                                                        });  
                }
            }
        });
     });

    $(document).on("click", ".xacnhan", function(){
      let customer_id = $(this).data('cusid');
      $(this).html(spinner);
      setTimeout(function(){
        $.ajax({
        url:"{{ url('/getallinfocus') }}",
        method:"POST",
        dataType:"JSON",
        data:{customer_id:customer_id,"_token":"{{ csrf_token() }}"},
        success:function(result){
          $(".loadtt").html(result.html);
          $(".xacnhan").text("Thành công");
        }
      });
      },1500);
    });

    
    
  });
</script>
@endsection