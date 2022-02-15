@extends('welcome')
@section('content')
<style type="text/css">
        .product_view .modal-dialog{max-width: 800px; width: 100%;}
        .pre-cost{text-decoration: line-through; color: #a5a5a5;}
        .space-ten{padding: 10px 0;}
         i.bxs-heart
                            {
                                color: #DC143C;
                            }
                            i.far.fa.heart
                            {
                                color: #a5a5a5;
                            }


                            .post-module {
                                margin-top: 20px;
                                margin-right: 15px;
  position: relative;
  z-index: 1;
  display: block;
  background: #FFFFFF;
  min-width: 270px;
  height: 470px; 
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  transition: all 0.3s linear 0s;
}
.post-module:hover,
.hover {  
  box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
}
.post-module:hover .thumbnail img,
.hover .thumbnail img {
  transform: scale(1.1);
  opacity: .6;
}
.post-module .thumbnail {
  background: #000000;
  height: 335px;
  overflow: hidden;
  border-radius: 20px;
}
.post-module .thumbnail .date {
  position: absolute;
  top: 20px;
  right: 20px;
  z-index: 1;
  background: #e74c3c;
  width: 55px;
  height: 55px;
  padding: 12.5px 0;
  -webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  border-radius: 100%;
  color: #FFFFFF;
  font-weight: 700;
  text-align: center;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.post-module .thumbnail .date .day {
  font-size: 18px;
}
.post-module .thumbnail .date .month {
  font-size: 12px;
  text-transform: uppercase;
}
.post-module .thumbnail img {
  display: block;
  width: 385px;
  height: 335px; 
  transition: all 0.3s linear 0s;
}
.post-module {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

.post-module .post-content {

  position: absolute;
  bottom: 0;
  background: #FFFFFF;
  width: 100%;
  padding: 30px;
  box-sizing: border-box;
  transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
}
.post-module .post-content .category {
    background: linear-gradient(to right, #fe8c00, #f83600);
  position: absolute;
  top: -34px;
  left: 0;
 /* background: #e74c3c;*/
  padding: 10px 15px;
  color: #FFFFFF;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
}
.post-module .post-content .title {
  margin: 0;
  padding: 0 0 10px;
  color: #333333;
  font-size: 26px;
  font-weight: 700;
}
.post-module .post-content .sub_title {
  margin: 0;
  padding: 0 0 20px;
  color: #e74c3c;
  font-size: 20px;
  font-weight: 400;
}
.post-module .post-content .description {
  display: none;
  color: #666666;
  font-size: 14px;
  line-height: 1.8em;
}
.post-module .post-content .post-meta {
  margin: 30px 0 0;
  color: #999999;
}
.post-module .post-content .post-meta .timestamp {
  margin: 0 16px 0 0;
}
.post-module .post-content .post-meta a {
  color: #999999;
  text-decoration: none;
}
.hover .post-content .description {
  display: block !important;
  height: auto !important;
  opacity: 1 !important;
}
/*.container {
  max-width: 800px;
  min-width: 640px;
  margin: 0 auto;
}*/
.container:before,
.container:after {
  content: '';
  display: block;
  clear: both;
}
.container .column {
  width: 50%;
  padding: 0 25px;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  float: left;
}
.container .column .demo-title {
  margin: 0 0 15px;
  color: #666666;
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
}
.container .info {
  width: 300px;
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 24px;
  font-weight: bold;
  color: #333333;
}
.container .info span {
  color: #666666;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #e74c3c;
}


.testimonials{position: relative;background-repeat: no-repeat;background-size: cover;padding:50px 0;}
.testimonials::before{content:'';position: absolute;right:0;left:0;top:0;bottom:0;
    /*background: linear-gradient(to right, #ffafbd, #ffc3a0);*/
background: #fff6df;}
.testimonials .title {text-align: center;margin-bottom: 50px;position: relative;padding: 20px 0;max-width: 600px;margin: 0 auto;}
.testimonials .title h5 {color: #EB6D2F;line-height: 1.2em;font-size: 18px;font-weight: 900;margin-bottom: -3px;}
.testimonials .title h2 {color: #5A3733;line-height: 1.2em;font-weight: 900;font-size: 41px;letter-spacing: -1px;margin:0}
.testimonials .title img {margin-top: -10px;}
.testimonials .title p {margin: 0 0 10px;margin-bottom: 0;color: #5A3733;}
.testimonials .testi .item {background: radial-gradient(#f588d8, #c0a3e5);padding: 50px 30px;border-radius:20px;box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;}
.testimonials .testi .item .profile {display:flex;padding-left: 15px;}
.testimonials .testi .item .profile img {border-radius: 100%;width:50px;height:50px;object-fit:cover}
.testimonials .testi .item .profile .information {padding-left:20px;margin-bottom:15px}
.testimonials .testi .item .profile .information .stars i {color:#ffd832}
.testimonials .testi .item .profile .information p {font-size: 24px;margin: 0px auto 0px;color: #5A3733;font-weight: 600;line-height: 1;}
.testimonials .testi .item .profile .information span {color: #EB6D2F;font-weight: bold;margin-top: -4px;line-height: 1.6em;font-size: 14px;}
.testimonials .testi .item>p {margin-bottom: 15px;font-size: 16px;line-height: 1.6em;display: block;z-index: 2;font-style: italic;color: #5A3733;text-align: center;}
.testimonials .testi .item .icon {text-align: center;}
.testimonials .testi .item .icon i {font-size: 32px;color: #5A3733;}

.carousel-item {
  height: 100vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}

#carouselExampleIndicators
{
    bottom: 20px;
}



</style>

<!-- Begin Slider With Banner Area -->
            {{-- <div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Slider Area -->
                        <div class="col-lg-8 col-md-8">
                            <div class="slider-area">
                                <div style="z-index: 1;" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <?php
        $i = 0;
    ?>
    @foreach($slide as $sl)
    <?php
    $i++;
    ?>
    <div class="carousel-item {{ $i==1 ? 'active' : '' }} ">
      <img height="475px" class="d-block w-100" src="{{ URL::to('/public/upload/slide/'.$sl->slide_image) }}" alt="First slide">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                        <!-- Begin Li Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                            @foreach($slide2 as $sl2)
                            <div class="li-banner" style="z-index: 1;">
                                <a href="#">
                                    <img src="{{ asset('/public/upload/slide/'.$sl2->slide_image) }}" alt="" style="width: 370px;height: 230px; margin-bottom: 1rem;">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Li Banner Area End Here -->
                    </div>
                </div>
            </div> --}}


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php
        $i = 0;
    ?>
    @foreach($slide as $sl)
    <?php
    $i++;
    ?>
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item {{ $i==1 ? 'active' : '' }}" style="background-image: url({{url('/public/upload/slide/'.$sl->slide_image)}})">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">{{$sl->slide_name}}</h2>
          <p class="lead">{!!$sl->slide_content!!}</p>
          <a href="{{$sl->slide_link}}">
              <button class="btn btn-warning">Xem ngay</button>
          </a>
          
        </div>
      </div>
      
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>

  
            <!-- Slider With Banner Area End Here -->
            <!-- Begin Product Area -->
            <div class="product-area pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản phẩm nổi bật</span></a></li>
                                   
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($product as $key => $pro)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <form>
                                            @csrf
                                        <input type="hidden" class="cart_product_id_{{ $pro->product_id }}" value="{{ $pro->product_id }}">
                                        <input type="hidden" class="cart_product_name_{{ $pro->product_id }}" value="{{ $pro->product_name }}">
                                        <input type="hidden" class="cart_product_img_{{ $pro->product_id }}" value="{{ $pro->product_img }}">
                                        <input type="hidden" class="cart_product_quantity_{{ $pro->product_id }}" value="{{ $pro->product_quantity }}">
                                        
                                        <input type="hidden" class="cart_product_price_{{ $pro->product_id }}" value="{{ $pro->product_price }}">
                                        <input type="hidden" class="cart_product_qty_{{ $pro->product_id }}" value="1">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{URL::to('/chitietsp/'.$pro->product_id)}}">
                                                    <img src="{{ URL::to('/public/upload/product/'.$pro->product_img) }}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <style type="text/css">
                            i.fa.fa-star.active
                            {
                                color: #ffc107;
                            }

                            i.fa.fa-star
                            {
                                color: #a5a5a5;
                            }

                            span.fa.fa-star
                            {
                                color: #ffc107;
                            }
                            i.fas.fa-star.active
                            {
                                color: #ffc107;
                            }
                            i.fas.fa-star
                            {
                                color: #a5a5a5;
                            }
                            i.fas.fa-heart
                            {
                                color: #DC143C;
                            }
                        </style>
                                            <?php
                                        $tbsao = 0;
                                        if($pro->product_total_rating)
                                        {
                                            $tbsao = round($pro->product_total_star / $pro->product_total_rating, 2);
                                            
                                        }
                                    ?>
                                    {{--  @foreach(Session::get('cart') as $cart)
                                        

                                            <input type="hidden" class="currentqty_{{$cart['product_id']}}" value="{{$cart['product_qty']}}">
                                                    @endforeach --}}
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html">Đánh giá</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                 @for($i = 1; $i <= 5; $i++)
                                            <a><i class="fa fa-star {{ $i <= $tbsao ? 'active' : '' }}"></i></a>
                                            @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{URL::to('/chitietsp/'.$pro->product_id)}}">{{ $pro->product_name }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($pro->product_price).' '.'VNĐ' }}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                         <li class="add-cart active"><a style="background-color: #f48fb1;color: #fff; font-size: 12px; box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;border-radius: 35px" class="add-to-cart" data-id_pro="{{ $pro->product_id }}" href="" type="button">Thêm vào giỏ</a></li>
                                                        {{-- <button type="button" class="btn btn-default add-to-cart" name="addtocart" data-id_pro="{{ $pro->product_id }}">Thêm vào giỏ</button> --}}
                                                        {{-- <li type="button" id="addcart" type="button" class="add-cart active addtocart"><a >Thêm vào giỏ</a></li> --}}
                                                        
                                                      
                                                        {{-- <script type="text/javascript">
                                                            alert('k the them');
                                                        </script> --}}
                                                        

                                                       
                                                        <li><a href="{{ URL::to('/quickview/'.$pro->product_id) }}" title="quick view" class="quick-view-btn xemnhanh" data-toggle="modal" data-target="#product_view"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            
            


            <!-- Begin Li's Static Banner Area -->
            <div class="li-static-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Single Banner Area -->
                        @foreach($slide3 as $sl3)
                        <div class="col-lg-4 col-md-4 text-center">
                            <div class="single-banner">
                                <a href="#">
                                    <img src="{{ asset('public/upload/slide/'.$sl3->slide_image) }}" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Banner Area End Here -->
                        <!-- Begin Single Banner Area -->
                        <!-- Single Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Static Banner Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-60 pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Sản phẩm Hot</span>
                                </h2>
                                {{-- <ul class="li-sub-category-list">
                                    @foreach($category as $key=>$cate)
                                    <li class="active"><a href="{{ URL::to('/danhmucsp/'.$cate->category_id) }}">{{ $cate->category_name }}</a></li>
                                    @endforeach
                                </ul> --}}
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($hot_product as $key =>$prod)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <input type="hidden" class="cart_product_id_{{ $prod->product_id }}" value="{{ $prod->product_id }}">
                                        <input type="hidden" class="cart_product_name_{{ $prod->product_id }}" value="{{ $prod->product_name }}">
                                        <input type="hidden" class="cart_product_img_{{ $prod->product_id }}" value="{{ $prod->product_img }}">
                                        <input type="hidden" class="cart_product_quantity_{{ $prod->product_id }}" value="{{ $prod->product_quantity }}">
                                        
                                        <input type="hidden" class="cart_product_price_{{ $prod->product_id }}" value="{{ $prod->product_price }}">
                                        <input type="hidden" class="cart_product_qty_{{ $prod->product_id }}" value="1">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{URL::to('/chitietsp/'.$prod->product_id)}}">
                                                    <img src="{{ URL::to('/public/upload/product/'.$prod->product_img) }}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">Hot</span>
                                            </div>
                                            <?php
                                        $tbsao = 0;
                                        if($prod->product_total_rating)
                                        {
                                            $tbsao = round($prod->product_total_star / $prod->product_total_rating, 2);
                                            
                                        }
                                    ?>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html">Đánh giá</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                 @for($i = 1; $i <= 5; $i++)
                                            <a><i class="fa fa-star {{ $i <= $tbsao ? 'active' : '' }}"></i></a>
                                            @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{URL::to('/chitietsp/'.$prod->product_id)}}">{{ $prod->product_name }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($prod->product_price). 'VNĐ' }}</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a style="background-color: #f48fb1;color: #fff; font-size: 12px; box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;border-radius: 35px" class="add-to-cart" data-id_pro="{{ $prod->product_id }}" href="" type="button">Thêm vào giỏ</a></li>
                                                         <li><a href="{{ URL::to('/quickview/'.$prod->product_id) }}" title="quick view" class="quick-view-btn xemnhanh" data-toggle="modal" data-target="#product_view"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>


                <div class="modal fade modal-wrapper" id="product_view" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body loadquickview">
                            
                        </div>
                    </div>
                </div>
            </div>

            </section>

            <div class="product-area pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Bài viết mới</span></a></li>
                                   
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
<br><br>
            <div class="blog-slider">
  <div class="blog-slider__wrp swiper-wrapper">
    @foreach($article as $post)
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        
        <img src="{{asset('public/upload/article/'.$post->article_avatar)}}" alt="">
      </div>
      <div class="blog-slider__content">
        <span class="blog-slider__code">26 December 2019</span>
        <div class="blog-slider__title">{{$post->article_name}}</div>
        <div class="blog-slider__text">{!!$post->article_desc!!}</div>
        <a href="{{URL::to('/articledetail/'.$post->article_id)}}" class="blog-slider__button">READ MORE</a>
      </div>
    </div>
    
    @endforeach
    
  </div>
  <div class="blog-slider__pagination"></div>
</div>
</div>
</div>

<br><br>

          {{--  background-image: url('https://images.unsplash.com/photo-1580912458702-6fa698fc553e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'); --}}
            <!-- Li's Laptop Product Area End Here -->
            <section class="testimonials" >
        <div class="container">
            <div class="title">
                <h5>Testimonial</h5>
                <h2>Khách hàng nói gì?</h2>
            </div>
            <div class="owl-carousel owl-theme testi">
              <!-- Single Starts -->
                                <div class="item">
                  <div class="profile">
                      <img src="{{asset('public/upload/avtHai.jpg')}}" alt="">
                      <div class="information">
                          <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <p>Lại Chí Hải</p>
                          <span>Web Developer</span>
                      </div>
                    </div>
                      <p>Các sản phẩm của BFF Kantho đều rất tươi, thái độ phục vụ khách hàng rất tốt. Không quá khi nói BFF Kantho là cửa hàng hoa nằm ở top đầu trong thành phố.</p>
                      <div class="icon">
                          <i class="fa fa-quote-right" aria-hidden="true"></i>
                      </div>
                </div>
              <!-- Single Ends -->
                <div class="item">
                  <div class="profile">
                      <img src="{{asset('public/upload/avtDao.jpg')}}" alt="">
                      <div class="information">
                          <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <p>Lê Ngọc Đào</p>
                          <span>Angular Developer</span>
                      </div>
                    </div>
                      <p>Các sản phẩm của BFF Kantho đều rất tươi, thái độ phục vụ khách hàng rất tốt. Không quá khi nói BFF Kantho là cửa hàng hoa nằm ở top đầu trong thành phố.</p>
                      <div class="icon">
                          <i class="fa fa-quote-right" aria-hidden="true"></i>
                      </div>
                </div>
                <div class="item">
                  <div class="profile">
                      <img src="https://images.unsplash.com/photo-1521225099409-8e1efc95321d?ixlib=rb-1.2.1&auto=format&fit=crop&h=153&q=80" alt="">
                      <div class="information">
                          <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <p>Furkan Giray</p>
                          <span>Web Developer</span>
                      </div>
                    </div>
                      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita velit labore suscipit distinctio, officiis deserunt rem blanditiis ducimus. Voluptate quaerat assumenda qui veniam facilis doloribus maiores impedit ducimus cum accusamus.</p>
                      <div class="icon">
                          <i class="fa fa-quote-right" aria-hidden="true"></i>
                      </div>
                </div>
            </div>
        </div>
    </section>

          
@endsection

@section('scripts')
<?php
$message = Session::get('messagesuccess');
if($message){
    echo '
    <script type="text/javascript">
                                    Swal.fire(
                                      "Thông báo",
                                      "'.$message.'",
                                      "success"
                                    );
                             </script>';
    Session::put('messagesuccess',null);
}
?>
<script type="text/javascript">
    $(window).load(function() {
  $('.post-module').hover(function() {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);
  });
});

    $(document).ready(function(){

        $('.testi.owl-carousel').owlCarousel({
  items: 2,
  margin:10,
  lazyLoad: true,
  dots:true,
  autoPlay: true,
  autoPlayTimeout: 3000,
  responsive:{
    0:{
      items:1,
    },
    600:{
      items:2,
    },
    1000:{
      items:2,
    }
  }
});
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

        $(document).on("click",".xemnhanh", function(){
            var url = $(this).attr('href');

            $.ajax({
                url:url,
            success:function(data){
                $('.loadquickview').html(data.result);
            }
            });
        });

        $(document).on("click",".btnfavorrite",function(){
        var customer_id =  $(this).data('customerid');
        var product_id = $(this).data('productidfavor');
        var product_name = $(this).data('productname');
        var product_img = $(this).data('productimg');
        var product_price = $(this).data('productprice');
        var heartIcon = '<i class="fas fa-heart"></i>';
        $.ajax({
            url:"{{ url('/addfavorite') }}",
            method:"POST",
            data:
            {
                "_token":"{{ csrf_token() }}",
                customer_id:customer_id,
                product_id:product_id,
                product_name:product_name,
                product_img:product_img,
                product_price:product_price
            },
            success:function(data){
                if(data.done)
                {
                    $('.btnfavorrite').html(heartIcon);
                }
                else if(data.require)
                {
                   Toast.fire({
                  icon: 'warning',
                  title: 'Bạn cần phải đăng nhập để thêm sản phẩm yêu thích'
                }).then(()=> window.location = "{{ url('/logincheckout') }}"); 
                }
                else
                {
                    Toast.fire({
                  icon: 'error',
                  title: 'Sản phẩm này đã được yêu thích'
                }).then(() => window.location = "{{ url('/listfavorite') }}" ); 
                }
                
            }
        });

        });
        function render(res){
            $('.minicart').empty();
            $('.minicart').html(res);
            $('.cart-item-count').text($('#idqty').val());
        };
        $(document).on('click','.xoaitem', function(e){
        e.preventDefault();
        var id = $(this).data('idxoaitem');
        $.ajax({
            url: 'xoaitem/'+id,
            type: 'GET'
        }).done(function(res){
           render(res);
        });
    });
       

        $('.add-to-cart').click(function(e){
            e.preventDefault();
            var id = $(this).data('id_pro');
            var cart_product_id = $('.cart_product_id_'+ id).val();
            var cart_product_name = $('.cart_product_name_'+ id).val();
            var cart_product_img = $('.cart_product_img_'+ id).val();
            var cart_product_quantity = $('.cart_product_quantity_'+ id).val();
            var cart_product_price = $('.cart_product_price_'+ id).val();
            var cart_product_qty = $('.cart_product_qty_'+ id).val();
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
        <?php
                                $message = Session::get('messagefailed');
                                if($message){
                                    echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$message.'",
                                      icon: "error",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('messagefailed',null);
                                }
                            ?>
    });
</script>
@endsection