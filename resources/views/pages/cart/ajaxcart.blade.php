@extends('welcome')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li class="active">Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                        
                                <div class="table-content table-responsive">
                                    <form action="{{ URL::to('/updatecartitem') }}" method="POST">
                                        @csrf
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">Hành động</th>
                                                <th class="li-product-thumbnail">Hình ảnh</th>
                                                <th class="cart-product-name">Sản phẩm</th>
                                                <th class="li-product-price">Đơn giá</th>
                                                <th class="li-product-quantity">Số lượng</th>
                                                <th class="li-product-subtotal">Tổng tiền</th>
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
                                            <tr>
                                                <td class="li-product-remove"><a href="{{ URL::to('/deleteitem/'.$value['session_id']) }}"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{ asset('/public/upload/product/'.$value['product_img']) }}" alt="Li's Product Image" style="widows: 100px;height: 100px"></a></td>
                                                <td class="li-product-name"><a href="#">{{ $value['product_name'] }}</a></td>
                                                <td class="li-product-price"><span class="amount">{{ number_format($value['product_price']),0,',','.' }}đ</span></td>
                                                <td class="quantity">
                                                    <div class="cart_quantity_button">
                                                        <input class="cart_quantity" value="{{ $value['product_qty'] }}" min="1" type="number" name="cart_qty[{{ $value['session_id'] }}]" style="width: 50px;height: auto">
                                                        <input type="hidden" name="rowId" value="" class="form-control">
                                                       
                                                    </div>
                                             
                                                </td>
                                                <td class="product-subtotal"><span class="amount">
                                                    {{ number_format($subtotal),0,',','.' }}đ
                                                </span></td>
                                            </tr>
                                            @endforeach

                                            <nav aria-label="breadcrumb">
                                              <ol class="breadcrumb"></li>
                                                <button type="submit" name="updateqty" class="btn btn-primary" style="
                                                background-color: #c2cd4a;
                                                      padding: 15px 20px;
                                                      border-radius: 2px;
                                                      color: #fff;
                                                      font-size: 14px;
                                                      transition: all 200ms ease;
                                                      cursor: pointer;
                                                      box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
                                                      border: none;">
                                                        <i class='bx bxs-message-square-edit bx-tada' style="font-size:20px;" ></i>
                                                        Cập nhật
                                                    </button>
                                               
                                                    <a class="btn btn-danger" href="{{ URL::to('/deleteallitem') }}"
                                                    style="margin-left: 5px;background-color: #ff1744;
                                                      padding: 15px 20px;
                                                      border-radius: 2px;
                                                      color: #fff;
                                                      font-size: 14px;
                                                      transition: all 200ms ease;
                                                      cursor: pointer;
                                                      box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
                                                      border: none;">
                                                        
                                                        <i style="font-size:20px;" class='bx bx-trash bx-tada' ></i>
                                                    Xóa tất cả
                                                </a>
                                              </ol>
                                            </nav>
                                            
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
                                @if(Session::get('customer_id'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <a href="{{ URL::to('/checkout') }}">
                                                <input class="button" name="apply_coupon" value="Đặt hàng" type="submit">
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <a href="{{ URL::to('/logincheckout') }}">
                                                <input class="button" name="apply_coupon" value="Đặt hàng" type="submit">
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               @endif
                                {{-- <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Tổng <span>{{ number_format($total),0,',','.' }}đ</span></li>
                                                <li>Thành tiền <span>{{ number_format($total),0,',','.' }}đ</span></li>
                                            </ul>
                                            <a href="">Thanh toán</a>
                                            
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
@endsection

@section('scripts')
<?php
                                $messagesc = Session::get('messagesc');
                                $messagef = Session::get('messagef');
                                if($messagesc){
                                    echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$messagesc.'",
                                      icon: "info",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('messagesc',null);
                                }elseif($messagef){
                                    echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$messagef.'",
                                      icon: "info",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('messagef',null);
                                }
                            ?>


<script type="text/javascript">
    $(document).ready(function(){
         $('.hm-menu').remove();
    });
</script>
@endsection