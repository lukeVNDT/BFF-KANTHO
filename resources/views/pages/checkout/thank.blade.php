@extends('welcome')
@section('content')
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li class="active">Xác nhận</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Error 404 Area Start -->
            <div class="error404-area pt-30 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="error-wrapper text-center ptb-50 pt-xs-20">
                                <div class="error-text">
                                    <h2>Cảm ơn quý khách đã sử dụng dịch vụ của DTsport</h2>
                                    <p>Chúng tôi sẽ vận chuyển hàng đến cho bạn sớm. Chúc bạn mua sắm vui vẻ.</p>
                                </div>
                                <div class="error-button">
                                    <a href="{{ URL::to('/') }}">Tiếp tục mua sắm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Error 404 Area End -->
@endsection