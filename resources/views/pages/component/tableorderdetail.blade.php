
<div class="container padding-bottom-3x mb-1">
        <div class="card mb-3">
          <div class="p-4 text-center text-white text-lg bg-custom rounded-top"><span class="text-uppercase">Mã đơn hàng - </span><span class="text-medium">{{$order_id}}</span></div>
          <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Thanh toán: 
              @if($shipping_method == 2)
              Thanh toán VNPay <i class="fas fa-check-circle check"></i> Paid
              @else
              Thanh toán khi nhận hàng
              @endif
            </span>
          </div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Trạng thái:</span>{{$order_status == 2 ? " Đã xử lý" : " Chưa xử lý"}}</div>
          </div>
          <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-cart"></i></div>
                </div>
                <h4 class="step-title">Tiếp nhận</h4>

              </div>

              <div class="step {{$order_status == 2 ? "completed" : ""}}">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-home"></i></div>
                </div>
                <h4 class="step-title">Đã giao hàng</h4>
              </div>
            </div>
          </div>
        </div>
       
      </div>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Số tiền</th>
      </tr>
    </thead>
    <tbody>
       <?php
      $total = 0;
    ?>
      @foreach($order_detail as $dt)
      <?php
        $subtotal = $dt->product_price*$dt->productsales_quantity;
        $total +=  $subtotal;
    ?>
      <tr>
        <td>{{ $dt->product_name }}</td>
        <td><img height="80" width="80" src="{{ asset('public/upload/product/'.$dt->product_img) }}"></td>
        <td>{{ $dt->productsales_quantity }}</td>
        <td>{{ number_format($dt->product_price).' '.'VNĐ' }}</td>
      </tr>
     @endforeach
    </tbody>
  </table>
  <span class="feeship">Phí vận chuyển: {{number_format($fee_money).' '.'VNĐ'}}</span>
  <br>
  @if($coupon_money != 0)
   @if($coupon_cond==1)
              @php
                $total_after_coupon = ($total*$coupon_money)/100;
                $total_coupon = $total - $total_after_coupon + $fee_money;
                echo 'Số tiền được giảm: '.number_format($total_after_coupon,0,',','.').' '.'VNĐ'.'<br>';
                echo 'Tổng tiền phải thanh toán: '.number_format($total_coupon,0,',','.').' '.'VNĐ'.'<br>';
              @endphp 
              @elseif($coupon_cond==2)
              @php
                $total_after_coupon = $total-$coupon_money;
                $total_coupon = $total - $coupon_money + $fee_money;
                echo 'Số tiền được giảm: '.number_format($total_after_coupon,0,',','.').' '.'VNĐ'.'<br>';
                echo 'Tổng tiền phải thanh toán: '.number_format($total_coupon,0,',','.').' '.'VNĐ'.'<br>';
              @endphp
              @endif
  @else
              @php
                $total = $total + $fee_money;
                echo 'Tổng tiền phải thanh toán: '.number_format($total,0,',','.').' '.'VNĐ'.'<br>';
              @endphp
  @endif

   