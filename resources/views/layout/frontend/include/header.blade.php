<div class="loader">
            <img src="{{asset('public/upload/loader/bars.svg')}}">
        </div>
        
<header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Số điện thoại liên lạc:</span><a href="#"> (+0367) 562 680</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>
                                            <div class="ht-setting-trigger"><span>Tùy chọn</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
{{--                                                     <li><a href="{{URL::to('/logincheckout')}}">Tài khoản</a></li> --}}
                                                    <?php
                                                        $customer_id = Session::get('customer_id');
                                                        $shipping_id = Session::get('shipping_id');
                                                    if($customer_id!=NULL){
                                                            
                                                    ?>
                                                    <li><a href="{{URL::to('/checkout')}}">Thanh toán</a></li>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <li><a href="{{URL::to('/logincheckout')}}">Thanh toán</a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                    <?php
                                                        $customer_id = Session::get('customer_id');
                                                        if($customer_id!=NULL){

                                                    ?>
                                                    
                                                    <li><a href="{{URL::to('/memberprofile/'.Session::get('customer_id'))}}">Trang cá nhân</a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                        $customer_id = Session::get('customer_id');
                                                        if($customer_id!=NULL){

                                                    ?>
                                                    <li><a style="color: #a5a5a5;" id="logout" >Đăng xuất</a></li>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <li><a href="{{URL::to('/logincheckout')}}">Đăng nhập</a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                        <li>
                                            <span class="currency-selector-wrapper">Tiền tệ :</span>
                                            <div class="ht-currency-trigger"><span>USD $</span></div>
                                            <div class="currency ht-currency">
                                                <ul class="ht-setting-list">
                                                    <li><a href="#">EUR €</a></li>
                                                    <li class="active"><a href="#">USD $</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                        <li>
                                            <span class="language-selector-wrapper">Ngôn ngữ :</span>
                                            <div class="ht-language-trigger"><span>Tiếng Việt</span></div>
                                            <div class="language ht-language">
                                                <ul class="ht-setting-list">
                                                    <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">English</a></li>
                                                    <li><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">Français</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="{{ URL::to('/') }}">
                                        <img src="{{asset('/public/frontend/limupa/images/menu/logo/logo.png')}}" alt="" style="width:240px;height:60px">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="{{ URL::to('/search') }}" class="hm-searchbox submitsearch" method="POST">
                                    <input type="text" placeholder="Nhập sản phẩm bạn muốn tìm ..." name="keyword" id="recommendajax">
                                    <div id="ajaxload"></div>
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        {{-- <li class="hm-wishlist">
                                            <a href="wishlist.html">
                                                <span class="cart-item-count wishlist-item-count">0</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li> --}}
                                        <!-- Header Middle Wishlist Area End Here -->
                                        
                                        <!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">
                                                    {{-- <span class="cart-item-count">2</span> --}}
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                   
                                                    @if(Session::get('cart')==true)
                                                    <?php
                                                    $total = 0;
                                                    $totalqty = 0;
                                                    ?>
                                                    @foreach(Session::get('cart') as $cart)
                                        <?php
                                                $subtotal = $cart['product_price']* $cart['product_qty'];
                                                $totalqty += $cart['product_qty'];
                                                $total += $subtotal;
                                               
                                            ?>
                                                    <li>
                                                        <a href="single-product.html" class="minicart-product-image">
                                                            <img src="{{ asset('/public/upload/product/'.$cart['product_img']) }}" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="single-product.html">{{ $cart['product_name'] }}</a></h6>
                                                            <span>{{ $cart['product_price'].' '.'VND'.' '.'x'.' '.$cart['product_qty'] }}</span>
                                                        </div>
                                                        <button data-idxoaitem="{{ $cart['session_id'] }}" class="close xoaitem">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </li>
                                                    @endforeach
                                                    @else

                                                    <p class="minicart-total" style="text-align: center;">Giỏ hàng trống </span></p>
                                                    @endif
                                                </ul>
                                                {{-- <p class="minicart-total">Tổng: </span></p> --}}
                                                {{-- <div class="minicart-button">
                                                    <a href="{{ URL::to('/showcartajax') }}" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>View Full Cart</span>
                                                    </a>
                                                    <a href="checkout.html" class="li-button li-button-fullwidth">
                                                        <span>Checkout</span>
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->
                 
                                    </ul>

                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <style type="text/css">
                    /*body{
                        margin: 0;
                        font-size: 100%;
                        font-family: arial, sans-serif;
                    }*/
                    .top-nav ul{
                        padding: 0;
                        margin: 0;
                        list-style-type: none;
                    }
                    .top-nav .main a{
                        display: block;
                        color: #fff;
                        text-decoration: none;
                        font-weight: bold;
                    }
                    .top-nav .main li{
                        display: inline-block;
                        vertical-align: top;
                        position: relative;
                    }
                    .top-nav .dropdown{
                        z-index: 2;
                        position: absolute;
                        background-color: rgb(252, 255, 250);
                        width: 200px;
                        left: 0;
                        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
                        display: none;
                    }
                     .top-nav .dropdown a {
                      color: #999999;
                    }
                    .top-nav .dropdown li,
                    .top-nav .dropdown ul li{
                        display: block;
                        width: 100%;
                    }
                    .top-nav .dropdown ul{
                        left: 200px;
                        top: 0;
                    }
                    .top-nav .dropdown li{
                        text-align: center;
                    }
                    .top-nav .main > li > a{
                        padding: 20px;
                    }
                    .top-nav ul li:hover > .dropdown{
                        display: block;
                    }
                    .top-nav .main li:hover > a{
                        background-color:   #ffd600;
                    }
                    .top-nav .dropdown li a{
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }
                </style>
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                               {{--  <div class="hb-menu"> --}}
                                    @include('layout.frontend.include.mainmenu')
                                {{-- </div> --}}
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            