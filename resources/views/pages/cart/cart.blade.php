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
                                    <?php 
                                    $content = Cart::content();
                                    ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">Xóa</th>
                                                <th class="li-product-thumbnail">Hình ảnh</th>
                                                <th class="cart-product-name">Sản phẩm</th>
                                                <th class="li-product-price">Đơn giá</th>
                                                <th class="li-product-quantity">Số lượng</th>
                                                <th class="li-product-subtotal">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($content as $value)
                                            <tr>
                                                <td class="li-product-remove"><a href="{{URL::to('/deletecartitem/'.$value->rowId)}}"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{URL::to('/public/upload/product/'.$value->options->image)}}" alt="Li's Product Image" style="widows: 100px;height: 100px"></a></td>
                                                <td class="li-product-name"><a href="#">{{ $value->name }}</a></td>
                                                <td class="li-product-price"><span class="amount">{{ number_format($value->price).' '.'VNĐ' }}</span></td>
                                                <td class="quantity">
                                                    <form action="{{URL::to('/updateqty')}}" method="post">
                                                    @csrf
                                                    <div class="cart_quantity_button">
                                                        <input class="cart_quantity_input" value="{{ $value->qty }}" type="number" name="qty" style="width: 50px;height: auto">
                                                        <input type="hidden" name="rowId" value="{{ $value->rowId }}" class="form-control">
                                                        <input type="submit" name="updateqty" value="Cập nhật" style="width: 75px;height: 31px" class="btn btn-default btn-sm">
                                                    </div>
                                                    </form>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">
                                                    <?php
                                                        $sub = $value->price * $value->qty;
                                                        echo number_format($sub).' '.'VNĐ';
                                                    ?>
                                                </span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Mã coupon" type="text">
                                                <input class="button" name="apply_coupon" value="Áp dụng" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Cập nhật" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Tổng <span>{{ Cart::Subtotal().' '.'VNĐ' }}</span></li>
                                                <li>Thành tiền <span>{{ Cart::Subtotal().' '.'VNĐ' }}</span></li>
                                            </ul>
                                            <a href="{{ URL::to('/logincheckout') }}">Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
@endsection