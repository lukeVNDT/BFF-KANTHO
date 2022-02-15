@extends('pages.admin')
@section('maincontent')

      
<div class="card border-left-primary shadow h-100 py-2 mt-4"
                                                style="border-radius: 10px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                         <table id="datatable" class="table">
        <thead>
          <tr>
          
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
          </tr>
        </thead>
        <tbody>


          <tr>

            <td>{{ $customer->customer_name }}</td>
            <td>{{ $customer->customer_email }}</td>
          <td>{{ $customer->customer_phone }}</td>
          </tr>
        </tbody>
      </table>
                                        
                                    </div>
                                </div>
                            </div>
    

      
      
   
<br><br>

  


     
      
  <div class="card border-left-primary shadow h-100 py-2 mt-4"
                                                style="border-radius: 10px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                         <table id="datatable" class="table">
        <thead>
          <tr>
          
            <th scope="col">Người vận chuyển</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Ghi chú đơn hàng</th>
            <th scope="col">Hình thức thanh toán</th>
          </tr>
        </thead>
        <tbody>


          <tr>

            <td>{{ $shipping->shipping_cusname }}</td>
            <td>{{ $shipping->shipping_address }}</td>
            <td>{{ $shipping->shipping_phone }}</td>
            <td>{{ $shipping->shipping_email }}</td>
            <td>{{ $shipping->shipping_notes }}</td>
            <td>@if($shipping->shipping_method==1)
              Thanh toán khi nhận hàng
              @else
              Thanh toán VNPay
              @endif
            </td>
          
          </tr>

        </tbody>
      </table>
                                        
                                    </div>
                                </div>
                            </div>
    


<br><br>
 <div class="card border-left-primary shadow h-100 py-2 mt-4"
                                                style="border-radius: 10px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <table id="datatable" class="table">
        <thead>
          <tr>
          
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng kho</th>
            <th scope="col">Mã giảm giá</th>
            <th scope="col">Phí ship</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          @php
          $total = 0;
          @endphp
        @foreach($orderdetail as $key =>$orderdt)
        @php
        $subtotal = $orderdt->product->product_price*$orderdt->productsales_quantity;
        $total +=  $subtotal;
        @endphp
          <tr class="color_qty_{{ $orderdt->product_id }}">

            <td>{{ $orderdt->product->product_name }}</td>
            <td>{{ $orderdt->product->product_quantity }}</td>
            <td>@if($orderdt->product_coupon!='không có coupon')
              {{ $orderdt->product_coupon }}
              @else
              Không có mã giảm giá
              @endif
            </td>
            <td>
           
              {{number_format($orderdt->feeship->fee_money,0,',','.')}} VNĐ
              
            </td>
            <td>
                <input disabled type="number" name="product_sales_quantity" class="order_qty_{{ $orderdt->product_id }}" min="1" {{ $order_status==2 ? 'disabled' : '' }} value="{{ $orderdt->productsales_quantity }}" >
              <input type="hidden" name="order_product_id" class="order_product_id" value="{{ $orderdt->product_id }}">
              <input type="hidden" name="order_code" class="order_code" value="{{ $orderdt->order_id }}">
              <input type="hidden" name="order_quanty_storage" class="order_quanty_storage_{{ $orderdt->product_id }}" value="{{ $orderdt->product_quantity }}">
              @if($order_status!=2)
              <input type="hidden" name="">
              {{-- <button type="button" class="btn btn-warning update_sales_quantity" data-product_id="{{ $orderdt->product_id }}" name="update_sales_quantity">Cập nhật</button></td> --}}
              @endif
            <td>{{ number_format($orderdt->product->product_price,0,',','.') }} VNĐ</td>
            <td>{{ number_format($subtotal,0,',','.')  }} VNĐ</td>
            
          </tr>
          @endforeach
          <tr>
            <td>
              @if($coupon_cond==1)
              @php
                $total_after_coupon = ($total*$coupon_money)/100;
                $total_coupon = $total - $total_after_coupon + $orderdt->feeship->fee_money;
                echo 'Tổng giảm: '.number_format($total_coupon,0,',','.').'VNĐ'.'<br>';
              @endphp 
              @elseif($coupon_cond==2)
              @php
                $total_coupon = $total - $coupon_money + $orderdt->feeship->fee_money;
                echo 'Tổng giảm: '.number_format($total_coupon,0,',','.').'VNĐ'.'<br>';
              @endphp
              {{-- @elseif($coupon_cond==1 && $orderdt->fee_if_not_exist = 0)
              @php
                $total_after_coupon = ($total*$coupon_money)/100;
                $total_coupon = $total - $total_after_coupon + $orderdt->feeship->fee_money;
                // echo 'Tổng giảm: '.number_format($total_after_coupon,0,',','.').'VNĐ'.'<br>';
              @endphp
              @elseif($coupon_cond==2 && $orderdt->fee_if_not_exist = 0)
              @php
                $total_coupon = $total - $coupon_money + $orderdt->feeship->fee_money;
                // echo 'Tổng giảm: '.number_format($total_coupon,0,',','.').'VNĐ'.'<br>';
              @endphp --}}
              @endif
              Phí ship: @if($orderdt->fee_id)
              {{number_format($orderdt->feeship->fee_money,0,',','.')}} VNĐ
              @endif
              <br>
              Số tiền thanh toán: {{number_format($total_coupon,0,',','.')}} VNĐ
            </td>
          </tr>
          <tr>
            <td colspan="1">
              @foreach($order as $key => $or)
              @if($or->order_status==1)
              <form>
                @csrf
              <select class="form-control order_detail_status">
                <option value="">----chọn trạng thái đơn hàng----</option>
                <option id="{{ $or->order_id }}" selected value="1">Chưa xử lý</option>
                <option id="{{ $or->order_id }}" value="2">Đã xử lý-đã giao</option>
                <option id="{{ $or->order_id }}" value="3">Hủy đơn-tạm giữ</option>
              </select>
            </form>
            @else
            <form>
              @csrf
              <select disabled class="form-control order_detail_status">
                <option value="">----chọn trạng thái đơn hàng----</option>
                <option id="{{ $or->order_id }}" value="1">Chưa xử lý</option>
                <option id="{{ $or->order_id }}" selected value="2">Đã xử lý-đã giao</option>
               {{--  <option id="{{ $or->order_id }}" value="3">Hủy đơn-tạm giữ</option> --}}
              </select>

            </form>

            @endif
            @endforeach

            </td>
          </tr>
        </tbody>
      </table>
      <a href="{{url()->previous()}}">                
                <button style="float:right;" type="button" class="btn btn-secondary"><i class="fas fa-window-close"></i> Quay lại</button>
              </a>
                                        
                                    </div>
                                </div>
                            </div>

                            <div id="toast">
                              
                            </div>
   
      
   


      
      
   


@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('.order_detail_status').change(function(){
			var order_status = $(this).val();
			var order_id = $(this).children(":selected").attr("id");
			var _token = $('input[name="_token"]').val();
			quantity = [];

			$('input[name="product_sales_quantity"]').each(function(){
				quantity.push($(this).val());
			});
			order_product_id = 	[];
			$('input[name="order_product_id"]').each(function(){
				order_product_id.push($(this).val());
			});
			j = 0;
			for(i=0;i<order_product_id.length;i++){
				var order_qty = $('.order_qty_'+order_product_id[i]).val();
				var order_qty_storage = $('.order_quanty_storage_'+order_product_id[i]).val();
				if(parseInt(order_qty)>parseInt(order_qty_storage)){
					j = j + 1;
					if(j==1){
						swal("Thông báo", "Số lượng trong kho không đủ", "error");
					}
					
					$('.color_qty_'+order_product_id[i]).css('background','#FF0000');
				}
			}
			if(j==0){
				$.ajax({
          url: '{{ url('/updateorderqty') }}',
          method: 'POST',
          data:{order_status,order_id,quantity,order_product_id,_token:_token},
          success:function(data){
            toast({
              title: 'Thông báo',
              message: 'Thay đổi tình trạng đơn hàng thành công!',
              type: 'success',
              duration: 7000
             });
            
          }
        });
			window.setTimeout(function(){
				location.reload();
			},3000);
			}
			
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.update_sales_quantity').click(function(){
			var order_product_id = $(this).data('product_id');
			var order_qty = $('.order_qty_'+ order_product_id).val();
			var order_code = $('.order_code').val();
			var _token = $('input[name="_token"]').val();

			$.ajax({
          url: '{{ url('/updateqty') }}',
          method: 'POST',
          data:{order_product_id:order_product_id,order_qty:order_qty,order_code:order_code,_token:_token},
          success:function(data){
            toast({
              title: 'Thông báo',
              message: 'Thay đổi tình trạng đơn hàng thành công!',
              type: 'success',
              duration: 7000
             });
          }
        });
			window.setTimeout(function(){
				location.reload();
			},3000);
		});
	});
</script>
@endsection