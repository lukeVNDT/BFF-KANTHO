<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index28:48-->
<head>
        <meta property="fb:admins" content="100000686899395"/>
        <meta property="fb:app_id" content="903125927198846" />
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>BFF Kantho</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta property="og:title"       content="{{ $title }}" />
        <meta property="og:description" content="{{ $desc }}" />
        <meta property="og:image"       content="{{ $img }}" /> --}}
        <!-- Favicon -->
        <link rel="canonical" href="{{ Request::url() }}"/>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/public/upload/lotus-flower.png')}}">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/material-design-iconic-font.min.css')}}">
        <link href="{{asset('public/backend/sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/font-awesome.min.css')}}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/fontawesome-stars.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/meanmenu.css')}}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/owl.carousel.min.css')}}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/slick.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/animate.css')}}">
        <!-- Jquery-ui CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('public/frontend/limupa/blogcard.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/venobox.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/nice-select.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/magnific-popup.css')}}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        {{-- <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/bootstrap.min.css')}}"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/helper.css')}}">
         <link rel="stylesheet" href="{{asset('public/frontend//css/multilevelCategory.css')}}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/darkmode.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/limupa/css/responsive.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;900&display=swap" rel="stylesheet">
  
        <!-- Modernizr js -->
        <script src="{{asset('public/frontend/limupa/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <style type="text/css">
            .loader
            {
                width: 100%;
                height: 100%;
                position: fixed;
                padding-top: 19%;
                /*background: #fed700;*/
                /*background: #8d7acb;*/
                background: linear-gradient(to right, #da22ff, #9733ee);
                padding-left: 48%;
                margin: 0 auto;
                z-index: 99999;
            }
            .ba-we-love-subscribers {
    width: 290px;
    height: 50px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0px 12px 45px rgba(0, 0, 0, .15);
    font-family: 'Poppins', sans-serif;
    text-align: center;
    margin: 0 0 10px 0;
    overflow: hidden;
    opacity: 0;
}
.ba-we-love-subscribers.open {
    height: 270px;
    opacity: 1;
}
.ba-we-love-subscribers.popup-ani {
    -webkit-transition: all .8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transition: all .8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.ba-we-love-subscribers h1 {
    font-size: 20px;
    color: #757575;
    padding: 25px 0;
    margin: 0;
  font-weight:400;
  font-family: 'Poppins', sans-serif;

}
.ba-we-love-subscribers .love {
    width: 20px;
    height: 20px;
    background-position: 35px 84px;
    display: inline-block;
    margin: 0 6px;
    background-size: 62px;
}


.ba-we-love-subscribers input {
    font-size: 14px;
    padding: 12px 15px;
    border-radius: 15px;
    border: 0;
    outline: none;
    margin: 8px 0;
    width: 100%;
    box-sizing: border-box;
    line-height: normal;
    /*Bootstrap Overide*/
    font-family: sans-serif;
    /*Bootstrap Overide*/
}
.ba-we-love-subscribers form {
    padding: 5px 30px 0;
    margin-bottom: 15px;
}
.ba-we-love-subscribers input[name="email"] {
    background-color: #eee;
    width: 230px;
}
.ba-we-love-subscribers input[name="submit"] {
    background-color: #00aeef;
    cursor: pointer;
    color: #fff;
}
.ba-we-love-subscribers input[name="submit"]:hover {
    background-color: #26baf1;
}
.ba-we-love-subscribers .img {
    background-image: url("https://4.bp.blogspot.com/-1J75Et4_5vc/WAYhWRVuMiI/AAAAAAAAArE/gwa-mdtq0NIqOrlVvpLAqdPTV4VAahMsQCPcB/s1600/barrel-we-love-subscribers-img.png");
}
.ba-we-love-subscribers-fab {
    width: 50px;
    height: 50px;
    background-color: #00aeef;
    border-radius: 30px;
    float: right;
    box-shadow: 0px 12px 45px rgba(0, 0, 0, .3);
    z-index: 5;
    position: relative;
   /* bottom: 100px;*/
}
.ba-we-love-subscribers-fab .img-fab {
    height: 30px;
    width: 30px;
    margin: 10px auto;
    background-image: url("https://4.bp.blogspot.com/-1J75Et4_5vc/WAYhWRVuMiI/AAAAAAAAArE/gwa-mdtq0NIqOrlVvpLAqdPTV4VAahMsQCPcB/s1600/barrel-we-love-subscribers-img.png");
    background-position: -1px -53px;
}
.ba-we-love-subscribers-fab .wrap {
    transform: rotate(0deg);
    -webkit-transition: all .15s cubic-bezier(0.15, 0.87, 0.45, 1.23);
    transition: all .15s cubic-bezier(0.15, 0.87, 0.45, 1.23);
}
.ba-we-love-subscribers-fab .ani {
    transform: rotate(45deg);
    -webkit-transition: all .15s cubic-bezier(0.15, 0.87, 0.45, 1.23);
    transition: all .15s cubic-bezier(0.15, 0.87, 0.45, 1.23);
}
.ba-we-love-subscribers-fab .close {
    background-position: -2px 1px;
    transform: rotate(-45deg);
    float: none;
     margin: 10px auto;
    /*Bootstrap Overide*/
    opacity: 1;
    /*Bootstrap Overide*/
}
.ba-we-love-subscribers-wrap {
    position: fixed;
    right: 30px;
    bottom: 150px;
    z-index: 1000;
}
.ba-settings {
    position: absolute;
    top: -25px;
    right: 0px;
    padding: 10px 20px;
    background-color: #555;
    border-radius: 5px;
    color: #fff;
}
        </style>
    </head>
    <body>
        <div class="loader">
            <img src="{{asset('public/upload/loader/bars.svg')}}">
        </div>
        

<div class="ba-we-love-subscribers-wrap">
    <div class="ba-we-love-subscribers popup-ani">
        <header>
            <h1>Đăng ký nhận tin<i class="img love"></i></h1>
        </header>
        {{-- <form id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate> --}}
                                           
                                              
                                                <input name="email" type="email" autocomplete="off" placeholder="Nhập Email của bạn..." />
                                                <button name="submit" style="border-radius: 35px;width: 100px;height: 30;background-color: #f6b6cc;color: #fff; font-size: 12px; box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;" class="btn subcription" >Đăng kí</button>
                                                {{-- <button  class="btn subcription" >Đăng kí</button> --}}
                                              
                                           
                                       {{--  </form> --}}
        
    </div>
    <div class="ba-we-love-subscribers-fab">
        <div class="wrap">
            <div class="img-fab img"></div>
        </div>
    </div>
</div>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
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
                                                    <li><a href="{{URL::to('/checkout')}}" >Thanh toán</a></li>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <li style="display:none;"><a href="{{URL::to('/logincheckout')}}">Thanh toán</a></li>
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
                                                        if($customer_id==NULL){

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
                                            <div class="ht-currency-trigger"><span>VNĐ</span></div>
                                            <div class="currency ht-currency">
                                                <ul class="ht-setting-list">
                                                    <li><a href="#">EUR €</a></li>
                                                    <li class="active"><a href="#">VNĐ</a></li>
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
                                                    <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">Tiếng Việt</a></li>
                                                    <li><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">English</a></li>
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
                                        <img src="{{asset('/public/upload/logo3ver2.png')}}" alt="" style="float: left;width:350px;height:65px">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                {{-- <form action="{{ URL::to('/search') }}" class="hm-searchbox submitsearch" method="POST">
                                    <input type="text" placeholder="Nhập sản phẩm bạn muốn tìm ..." name="keyword" id="recommendajax">
                                    <div id="ajaxload"></div>
                                    <button style="background-color: #c2cd4a;color: #fff;" class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form> --}}
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
                                            <div class="minicart" style="z-index:2;">
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
                                                            <span>{{ number_format($cart['product_price']).' '.'VND'.' '.'x'.' '.$cart['product_qty'] }}</span>
                                                        </div>
                                                        <button data-idxoaitem="{{ $cart['session_id'] }}" class="close xoaitem">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                        <input type="hidden" class="currentqty_{{$cart['product_id']}}" value="{{$cart['product_qty']}}">
                                                    </li>
                                                    @endforeach
                                                     <p class="minicart-total">Tổng: <span>{{ number_format($total).' '.'VND' }}</span></p>
                                                    <input type="hidden" id="idqty" value="{{ $totalqty }}">
                                                    <div class="minicart-button">
                                                    <a href="{{ URL::to('/showcartajax') }}" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Chi tiết giỏ hàng</span>
                                                    </a>
                                                    @if(Session::get('customer_id'))
                                                    <a href="{{URL::to('/checkout')}}" class="li-button li-button-fullwidth">
                                                        <span>Thanh toán</span>
                                                    </a>
                                                    @else
                                                    <a href="{{URL::to('/logincheckout')}}" class="li-button li-button-fullwidth">
                                                        <span>Thanh toán</span>
                                                    </a>
                                                    @endif
                                                </div>
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
                    * {
                        
                          outline: none;
                        font-family: 'Poppins', sans-serif;
                        font-size: 14px; 
                        }
                    .top-nav ul{
                        padding: 0;
                        margin: 0;
                        list-style-type: none;
                    }
                    .top-nav .main a{
                        display: block;
                        color: #fff;
                        text-decoration: none;
                        /*font-weight: bold;*/
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
                        border-radius: 5px;
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
                        border-radius: 5px;
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
                        /*background-color:   #ffd600;*/
                        background-color:rgba(218, 34, 255);
                        color: #fff;
                        border-radius: 5px;
                    }
                    .top-nav .dropdown li a{
                        padding-top: 10px;
                        padding-bottom: 10px;

                    }
                    .top-nav .dropdown li:hover > a{
                        background-color: #f5f5f5;
                        color: #643886;
                    }


/* search form  */ 
.searchform{padding:10px 15px; float:right} 
.searchform .btn{ color:rgba(200,200,200,.5);border: 1px solid transparent; background-color:#da22ff;
box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;color: #fff; }
.searchform .form-control{
    border:0; color:#fff;
    background-color:rgba(200,200,200,0.2);
    width:120px!important;
   -webkit-transition: all .5s ease;
   -moz-transition: all .5s ease;
   transition: all .5s ease;
}
.searchform .form-control:hover, .searchform .form-control:focus {
   width: 170px!important;
}

                </style>
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                               {{--  <div class="hb-menu"> --}}
                                    <nav class="top-nav">

                                        <ul class="main">
                                            <li><a href="{{ URL::to('/') }}">Trang chủ</a>
                                                
                                            </li>
                                          @foreach($cate as $item)
                                            <li>
                                                <a href="{{ URL::to('/danhmucsp/'.$item->category_id) }}">{{$item->category_name}}</a>
                                                @include('layout.frontend.include.mainmenu', ['childs' => $item->childs])
                                            </li>
                                         @endforeach
                                         
                                            
                                            
                                            <li><a href="{{ URL::to('/contact') }}">Liên hệ</a></li>
                                            <li><a href="{{ url('/articleindex') }}">Bài viết</a></li>
                                            <li style="float: right;margin-top: 5px;"><form action="#" method="get" class="searchform navbar-form" role="search">
    <input type="hidden" value="search" name="view">
    <div class="input-group">
    <input type="text"  name="searchword" required class="form-control" placeholder="Tìm kiếm..." name="q">
        <div class="input-group-btn">
    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
    </form></li>
                                           {{--  
                                             <li class="megamenu-holder"><a href="shop-left-sidebar.html">Nhãn hiệu</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li>
                                                        <ul>
                                                           
                                                        </ul>
                                                    </li>
                                                    
                                                </ul>
                                            </li> --}}
                                            
                                            
                                        </ul>
                                        
                                    </nav>
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
            <!-- Header Area End Here -->
            <!-- Begin Slider With Banner Area -->
            @yield('content')
            <!-- Li's Trendding Products Area End Here -->
            <!-- Begin Footer Area -->
            <div class="footer">
                <!-- Begin Footer Static Top Area -->
                <div class="footer-static-top">
                    <div class="container">
                        <!-- Begin Footer Shipping Area -->
                        <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                            <div class="row">
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{ asset('/public/frontend/limupa/images/shipping-icon/1.png') }}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Giao hàng nhanh</h2>
                                            <p>và hoàn trả hàng miễn phí.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{ asset('/public/frontend/limupa/images/shipping-icon/2.png') }}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Thanh toán an toàn</h2>
                                            <p>Thanh toán với một trong những phương thức thanh toán an toàn nhất.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{ asset('/public/frontend/limupa/images/shipping-icon/3.png') }}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Tự tin mua sắm</h2>
                                            <p>Bảo vệ người mua của chúng tôi bao gồm việc mua hàng của bạn từ khi nhấp chuột đến khi giao hàng

.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{ asset('/public/frontend/limupa/images/shipping-icon/4.png') }}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Trung tâm hỗ trợ 24/7</h2>
                                            <p>Có câu hỏi? vui lòng liên hệ hoặc chat online.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                            </div>
                        </div>
                        <!-- Footer Shipping Area End Here -->
                    </div>
                </div>
                <!-- Footer Static Top Area End Here -->
                <!-- Begin Footer Static Middle Area -->
                <div class="footer-static-middle">
                    <div class="container">
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row">
                                <!-- Begin Footer Logo Area -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                        <img src="{{ asset('/public/upload/logo3ver2.png') }}" style="width:250px;height:65px" >
                                       
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>Địa chỉ: </span>
                                            Mỹ tú, Thị trấn Huỳnh Hữu Nghĩa
                                        </li>
                                        <li>
                                            <span>Số điện thoại: </span>
                                            <a href="#">(+0367) 562 680</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto://info@yourdomain.com">ynkdn999@gmail.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Sản phẩm</h3>
                                        <ul>
                                            <li><a href="#">Giá</a></li>
                                            <li><a href="#">Sản phẩm mới</a></li>
                                            <li><a href="#">Bán chạy</a></li>
                                            <li><a href="#">Liên hệ</a></li>
                                        </ul>
                                    </div>
                                </div>


                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Cửa hàng chúng tôi</h3>
                                        <ul>
                                            <li><a href="#">Vận chuyển</a></li>
                                            <li><a href="#">Chính sách</a></li>
                                            <li><a href="#">Về chúng tôi</a></li>
                                            <li><a href="#">Liên hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-4">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Theo dõi chúng tôi</h3>
                                        <ul class="social-link">
                                            <li class="twitter">
                                                <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="rss">
                                                <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="RSS">
                                                    <i class="fa fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li class="facebook">
                                                <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Begin Footer Newsletter Area -->
                                    {{-- <div class="footer-newsletter">
                                        <h4>Đăng kí nhận tin</h4> --}}
                                        {{-- <form id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate> --}}
                                          {{--  <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email" />
                                                <button style="background-color: #f6b6cc;color: #fff; font-size: 12px; box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;" class="btn subcription" >Đăng kí</button>
                                                {{-- <button  class="btn subcription" >Đăng kí</button> --}}
                                              <{{-- /div>
                                           </div> --}}
                                       {{--  </form> --}}
                                    {{-- </div> --}}
                                    <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
               {{--  <div class="footer-static-bottom pt-55 pb-55">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <!-- Footer Links Area End Here -->
                                <!-- Begin Footer Payment Area -->
                                <div class="copyright text-center">
                                    <a href="#">
                                        <img src="images/payment/1.png" alt="">
                                    </a>
                                </div>
                                <!-- Footer Payment Area End Here -->
                                <!-- Begin Copyright Area -->
                                <div class="copyright text-center pt-25">
                                    <span><a target="_blank" href="https://www.templateshub.net">DTSport</a></span>
                                </div>
                                <!-- Copyright Area End Here -->
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                   <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            <div class="lg-image">
                                                <img src="images/product/large-size/1.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/2.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/3.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/4.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/5.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/6.jpg" alt="product image">
                                            </div>
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">                                        
                                            <div class="sm-image"><img src="images/product/small-size/1.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/2.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/3.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/4.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/5.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/6.jpg" alt="product image thumb"></div>
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>Today is a good day Framed poster</h2>
                                            <span class="product-details-ref">Reference: demo_15</span>
                                            <div class="rating-box pt-20">
                                                <ul class="rating rating-with-review-item">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="review-item"><a href="#">Read Review</a></li>
                                                    <li class="review-item"><a href="#">Write Review</a></li>
                                                </ul>
                                            </div>
                                            <div class="price-box pt-20">
                                                <span class="new-price new-price-2">$57.98</span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="product-variants">
                                                <div class="produt-variants-size">
                                                    <label>Dimension</label>
                                                    <select class="nice-select">
                                                        <option value="1" title="S" selected="selected">40x60cm</option>
                                                        <option value="2" title="M">60x90cm</option>
                                                        <option value="3" title="L">80x120cm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-add-to-cart">
                                                <form action="#" class="cart-quantity">
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" value="1" type="text">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                                </form>
                                            </div>
                                            <div class="product-additional-info pt-25">
                                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
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
                        </div>
                    </div>
                </div>
            </div>   
            <!-- Quick View | Modal Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <!-- Messenger Plugin chat Code -->
    <div id="fb-root">
        
    </div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your Plugin chat code -->
      <div class="fb-customerchat"
        attribution="page_inbox"
        page_id="101878395068002">
      </div>


      <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=903125927198846&autoLogAppEvents=1" nonce="7KEyUh7X"></script>
      
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

        <!-- Ajax Mail js -->
        <script src="{{asset('public/frontend/limupa/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('public/frontend/limupa/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('public/frontend/limupa/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('public/frontend/limupa/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('public/frontend/limupa/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('public/frontend/limupa/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('public/frontend/limupa/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('public/frontend/limupa/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('public/frontend/limupa/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('public/frontend/limupa/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('public/frontend/limupa/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('public/frontend/limupa/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('public/frontend/limupa/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
/>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <!-- Venobox -->
        <script src="{{asset('public/frontend/limupa/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('public/frontend/limupa/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('public/frontend/limupa/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('public/frontend/limupa/js/main.js')}}"></script>
        <script src="{{asset('public/backend/sbadmin/js/sweetalert.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
        
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        
{{--         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">

            var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });
            
            $(() => {
                setTimeout(() =>{
                    $('.loader').fadeOut(500);
                },1000);
            });
        </script>

        @yield('scripts')
        
    </body>
    {{-- <script type="text/javascript">
        $("#recommendajax").autocomplete({
            source: function(resquest, response){
                $.ajax({
                    url:"{{ url('/recommendajax') }}",
                    data:{
                        term : resquest.term
                    },
                    dataType:"json",
                    success:function(data){
                        response(data);
                    }
                });
            },
            minLength: 1,
        });
        $(document).on("click", ".ui-menu-item",function(){
            $(".submitsearch").submit();
        });
    </script> --}}
    <script type="text/javascript">

        



        $(".ba-we-love-subscribers-fab").click(function() {
    $('.ba-we-love-subscribers-fab .wrap').toggleClass("ani");
    $('.ba-we-love-subscribers').toggleClass("open");
    $('.img-fab.img').toggleClass("close");
});
        $('#recommendajax').keyup(function(){
            var query = $(this).val();
            var html = '';
            html += '<div class="media">';
            html += '<a class="pull-left" href="#">';
            html += '<img class="media-object" width="50" src="{{asset('/public/frontend/limupa/images/menu/logo/logo.png')}}" alt="Image">';
            html += '</a>';
            html += '<div class="media-body">';
            html += '<h4 class="media-heading"><a href="#">Media</a></h4>';
            html += '<p>Lorem</p>';
            html += '</div>';
            html += '</div>';
            $('#ajaxload').html(html);
            // if(query != '')
            // {
            //     $.ajax({
            //         url:"{{ url('/recommendajax') }}",
            //         method:"POST",
            //         data:
            //         {
            //             query:query,
            //             "_token":"{{ csrf_token() }}"
            //         },
            //         success:function(res){
            //             $('#ajaxload').fadeIn();
            //             $('#ajaxload').html(res);
            //         }
            //     });
            // }
            // else
            // {
            //     $('#ajaxload').fadeOut();
            // }
        });
        $(document).on('click','.liajax',function(){
            $('#recommendajax').val($(this).text());
            $('#ajaxload').fadeOut();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){

            

            $(document).on("click","#logout",function(){
                Swal.fire({
                  title: 'Thông báo',
                  text: "Bạn có muốn đăng xuất khỏi tài khoản này chứ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Đăng xuất'
                }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire(
                      'Thông báo!',
                      'Đăng xuất thành công',
                      'success'
                    ).then(() => window.location = "{{ url('/logincheckout') }}");
                  }
                });

            });


            $(document).on("click",".subcription",function(e){
               Swal.fire(
                                      'Thông báo!',
                                      'Chức năng này đang được chúng tôi phát triển, mong quý khách thông cảm',
                                      'warning'
                                    );
            });

            
            $(document).on("click", ".dropdown-menu", function(e){
                e.stopPropagation();

            });
            if($(window).width < 992){
                $('.nav-linkmulti').click(function(e){
                    e.preventDefault();
                    if($(this).next('.submenu').length){
                        ($(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function(){
                        $(this).find('.submenu').hide();
                    });
                });
            }

            

            
        });
    </script>


<!-- index30:23-->
</html>