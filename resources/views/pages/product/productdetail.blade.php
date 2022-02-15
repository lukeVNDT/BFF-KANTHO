@extends('welcome')
@section('content')
{{-- <style type="text/css">
    .rating_text
    {
        display: inline-block;
        position: relative;
        background: #52b858;
        color: #fff;
        padding: 2px 8px;
        box-sizing: border-box;
        font-size: 12px;
        border-radius: 2px;
    }
    .rating_text:after
    {
        right: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-color: rgba(82,184,88,0);
        border-right-color: #52b858;
        border-width: 6px;
        margin-top: -6px;
    }
</style> --}}
      @foreach($detailproduct as $key=>$prodetail)
      <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                            <li class="active">{{$prodetail->product_name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    @foreach($album as $key => $alb)
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="{{asset('/public/upload/album/'.$alb->album_image)}}" data-gall="myGallery">
                                            <img src="{{asset('/public/upload/album/'.$alb->album_image)}}" alt="product image" style="margin-top: 60px;">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">
                                @foreach($album as $key => $ab)                                        
                                    <div class="sm-image"><img src="{{asset('/public/upload/album/'.$ab->album_image)}}" alt="product image thumb" style="margin-top: 20px;"></div>
                                @endforeach
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>
                        <style type="text/css">
                            .errors {
                              color: red;
                           }
                            .SubmitRating{
                               /* background: #242424;*/
                               box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
                               border-radius: 10px;
                               background: #8d7acb;
                                color: #fff !important;
                                width: 80px;
                                font-size: 14px;
                                font-weight: bold;
                                height: 30px;
                                line-height: 30px;
                                text-align: center;
                                left: 110px;
                                right: auto;
                                top: 0;
                                display: block;
                                transition: all 0.3s ease-in-out;
                                border: none;
                                outline: none;
                            }
                            .SubmitRating:hover{
                                background: #9733ee;
                            }
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
                            i.bxs-heart
                            {
                                color: #DC143C;
                            }
                            i.far.fa.heart
                            {
                                color: #a5a5a5;
                            }
                            .spinner-border{
                                    margin-top: 5px;
                                    height: 20px;
                                    width: 20px;
                                }
                            #checkCirlce
                            {
                                color: #64dd17;
                            }
                        </style>
                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2>{{ $prodetail->product_name }}</h2>
                                    <?php
                                        $tbsao = 0;
                                        if($prodetail->product_total_rating)
                                        {
                                            $tbsao = round($prodetail->product_total_star / $prodetail->product_total_rating, 2);
                                            
                                        }
                                    ?>
                                    <div class="rating-box pt-20">
                                        <ul class="rating rating-with-review-item">
                                            @for($i = 1; $i <= 5; $i++)
                                            <a><i class="fa fa-star {{ $i <= $tbsao ? 'active' : '' }}"></i></a>
                                            @endfor
                                            
                                        </ul>
                                    </div>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">{{ number_format($prodetail->product_price).' '.'VNĐ' }}</span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span>{{ $prodetail->product_desc }}
                                            </span>
                                        </p>
                                    </div>
                                    
                                                    

                                   
                                    <div class="single-add-to-cart">
                                        <form action="{{URL::to('/addtocart')}}" class="cart-quantity" method="POST">
                                        	@csrf
                                             <input type="hidden" class="cart_product_id_{{ $prodetail->product_id }}" value="{{ $prodetail->product_id }}">
                                        <input type="hidden" class="cart_product_name_{{ $prodetail->product_id }}" value="{{ $prodetail->product_name }}">
                                        <input type="hidden" class="cart_product_img_{{ $prodetail->product_id }}" value="{{ $prodetail->product_img }}">
                                        <input type="hidden" class="cart_product_price_{{ $prodetail->product_id }}" value="{{ $prodetail->product_price }}">
                                        <input type="hidden" class="cart_product_quantity_{{ $prodetail->product_id }}" value="{{ $prodetail->product_quantity }}">
                                            <div class="quantity">
                                                <label>Số lượng</label>
                                                <div class="cart-plus-minus">
                                                    <input name="product_quantity" class="cart-plus-minus-box cart_product_qty_{{ $prodetail->product_id }}" value="1" type="text">
                                                    <input name="productid_hidden" type="hidden" value="{{ $prodetail->product_id }}">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="button" data-id_pro="{{ $prodetail->product_id }}">Thêm vào giỏ</button>
                                        </form>
                                    </div>
                                    <div class="product-additional-info pt-25">
                                        
                                            <button id="addfavourite" 
                                                    data-productid="{{$prodetail->product_id}}"
                                                    data-customerid="{{Session::get('customer_id')}}" 
                                                    class="btn btn-lg"
                                                    >
                                                <i style="font-size:20px;" class="{{ $favorite > 0 ? 'bx bxs-heart bx-tada' : 'bx bx-heart bx-tada' }}"></i>
                                            </button>

                                        <div class="product-social-sharing pt-25">
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </div>
                                                    <p>Chính sách bảo mật</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-truck"></i>
                                                    </div>
                                                    <p>Chính sách vận chuyển</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-exchange"></i>
                                                    </div>
                                                    <p>Chính sách đổi trả</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Thông tin</span></a></li>
                                   <li><a data-toggle="tab" href="#product-details"><span>Chi tiết sản phẩm</span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                                   <li><a data-toggle="tab" href="#comment"><span>Bình luận</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span>{{ $prodetail->product_desc }}</span>
                            </div>
                        </div>
                        <div id="product-details" class="tab-pane" role="tabpanel">
                            <div class="product-details-manufacturer">
                                <a href="#">
                                    <img src="{{asset('/public/upload/product/'.$prodetail->product_img)}}" alt="Product Manufacturer Image" style="width: 300px;height: 300px">
                                </a>
                                <p>{{$prodetail->product_content}}</p>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                    {{-- <div class="comment-review">
                                        <span>Grade</span>
                                        <ul class="rating">
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div> --}}
                                    <style type="text/css">
                                        .comment-author-infos{
                                            border: 1px solid #ddd;
                                            border-radius: 10px;
                                            background: #fff;
                                        }
                                        
                                    </style>
                                        
                                    <input type="hidden" class="idproduct" value="{{ $prodetail->product_id }}">
                                    <input type="hidden" class="proid" value="{{ $prodetail->product_id }}">
                                    {{ csrf_field() }}
                                    <div id="loadcomment"></div>
                                     <style type="text/css">
                                         .loadmore{
                                                   margin:auto;
                                                    display:block;
                                         }
                                     </style>
                                     
                                   {{--  <div class="comment-details">
                                        <p style="font-weight: bold;">Hãy để lại bình luận nếu bạn có bất cứ câu hỏi nào</p>
                                        <input class="cmt_person" type="text" placeholder="Vui lòng nhập tên...">
                                        <p></p>
                                        <textarea class="cmt_content" placeholder="nhập bình luận của bạn..."></textarea>
                                    </div> --}}
                                    <div class="component_rating">
                                    
                                        <div class="component_rating_content" style="display: flex;align-items: center;border-radius: 5px;border: 1px solid #dedede;">
                                            

                                                <div class="rating_item" style="width: 20%;position: relative;">
                                                    <div class=""><i style="font-size: 125px;display: block;color: #ff9705;margin: 0 auto;text-align: center;" class="bx bxs-star bx-tada"></i><b style="position: absolute;top: 65%;left: 41%;transform: translateY(-50%) translateY(-50%);font-size: 20px;color: white;">{{ number_format($tbsao, 2, '.', ',') }}</b></div>
                                                </div>
                                           
                                           
                                                <div class="list_rating" style="width: 60%;padding: 20px;">
                                                    
                                                    @foreach($arrayrt as $key => $rt)
                                                   <?php
                                                    $trungbinh = round(($rt['solandanhgia'] / $prodetail->product_total_rating) * 100,0);

                                                   ?>
                                                    <div class="rating_item" style="display: flex;">
                                                        
                                                        <div style="width: 10%;font-size: 14px;">
                                                            {{ $key }}<span class="fa fa-star"></span>
                                                        </div>
                                                        <div style="width: 70%; margin: 0 20px;">
                                                            <span style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px;background-color: #dedede;">
                                                                <b style="width: {{ $trungbinh }}%;background-color: #f25800;display: block;border-radius: 5px;height: 100%;"></b>
                                                            </span>
                                                        </div>
                                                        <div style="width: 20%">
                                                            <a href="">{{ $rt['solandanhgia'] }} đánh giá</a>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    @endforeach
                                                   
                                                </div>
                                            
                                            <div style="width: 20%;">
                                                <div class="review-btn">
                                        <a style="border-radius: 5px;" class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết đánh giá</a>
                                      {{--  <button class="btn btn-success submitcmt"><i class="far fa-comments"></i> Bình luận</button> --}}
                                    </div>
                                            </div>
           
                                        </div>
                                    </div>
                                    
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">Viết đánh giá của bạn về sản phẩm</h3>
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                           <div class="li-review-product">
                                                               <img src="{{asset('/public/upload/product/'.$prodetail->product_img)}}" width="150" height="150" alt="Li's Product">
                                                               <div class="li-review-product-desc">
                                                                  {{--  <p class="li-product-name">Today is a good day Framed poster</p>
                                                                   <p> --}}
                                                                       <span>{{ $prodetail->product_desc }}</span>
                                                                   </p>
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Đánh giá</h3>
                                                                        <form id="validatedFormRating" method="POST">
                                                                            <p class="your-opinion">
                                                                                <label>Chọn số sao:</label>
                                                                                <span>
                                                                                    <select class="star-rating">
                                                                                      <option value="1">1</option>
                                                                                      <option value="2">2</option>
                                                                                      <option value="3">3</option>
                                                                                      <option value="4">4</option>
                                                                                      <option value="5">5</option>
                                                                                    </select>
                                                                                </span>
                                                                            </p>
                                                                            
                                                                            
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Nội dung:</label>
                                                                                <textarea id="feedback" name="commentRating" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                                <p class="feedback-form-author">
                                                                                    {{-- <label for="author">Tên:<span class="required">*</span>
                                                                                    </label> --}}
                                                                                    <input type="hidden" id="author" name="author" value="{{ Session::get('customer_id') }}" size="30" aria-required="true" type="text">
                                                                                </p>
                                                                                <input type="hidden" id="proname" value="{{ $prodetail->product_name }}">
                                                                                {{-- <p class="feedback-form-author feedback-form-email">
                                                                                    <label for="email">Email<span class="required">*</span>
                                                                                    </label>
                                                                                    <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                                    <span class="required"><sub>*</sub> Required fields</span>
                                                                                </p> --}}
                                                                                <div class="feedback-btn pb-15">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Đóng</a>
                                                                                    <button
                                                                                    class="SubmitRating"
                                                                                     type="submit" id="submitRating">Gửi</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                        <div id="comment" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                   {{--  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=903125927198846&autoLogAppEvents=1" nonce="wRrkm7P3"></script> --}}
                                    
                                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="1178" data-numposts="5">
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Sản phẩm liên quan</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                	@foreach($related as $key=>$related)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <input type="hidden" class="cart_product_id_{{ $related->product_id }}" value="{{ $related->product_id }}">
                                        <input type="hidden" class="cart_product_name_{{ $related->product_id }}" value="{{ $related->product_name }}">
                                        <input type="hidden" class="cart_product_img_{{ $related->product_id }}" value="{{ $related->product_img }}">
                                        <input type="hidden" class="cart_product_quantity_{{ $related->product_id }}" value="{{ $related->product_quantity }}">
                                        
                                        <input type="hidden" class="cart_product_price_{{ $related->product_id }}" value="{{ $related->product_price }}">
                                        <input type="hidden" class="cart_product_qty_{{ $related->product_id }}" value="1">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{URL::to('/chitietsp/'.$related->product_id)}}">
                                                    <img src="{{URL::to('/public/upload/product/'.$related->product_img) }}" alt="Li's Product Image">
                                                </a>
                                            </div>
                                             <?php
                                        $tbsao = 0;
                                        if($related->product_total_rating)
                                        {
                                            $tbsao = round($related->product_total_star / $related->product_total_rating, 2);
                                            
                                        }
                                    ?>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Đánh giá</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                 @for($i = 1; $i <= 5; $i++)
                                            <a><i class="fa fa-star {{ $i <= $tbsao ? 'active' : '' }}"></i></a>
                                            @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{URL::to('/chitietsp/'.$related->product_id)}}">{{ $related->product_name }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($related->product_price).' '.'VNĐ'}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                       <li class="add-cart active"><a style="background-color: #f48fb1;color: #fff; font-size: 12px; box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;border-radius: 35px" class="add-to-cart-related" data-id_pro="{{ $related->product_id }}" href="" type="button">Thêm vào giỏ</a></li>
                                                       <li><a href="{{ URL::to('/quickview/'.$related->product_id) }}" title="quick view" class="quick-view-btn xemnhanh" data-toggle="modal" data-target="#product_view"><i class="fa fa-eye"></i></a></li>
                                                       
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
            <!-- Li's Laptop Product Area End Here -->
@endsection
@section('scripts')

<script type="text/javascript">
    const spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>';
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
      $("#addfavourite").click(function(){
            var product_id = $(this).data('productid');
            var customer_id = $(this).data('customerid');
            var heartIconAdded = '<i style="font-size:20px;" class="bx bxs-heart bx-tada"></i>';
            var heartIcon = '<i style="font-size:20px;" class="bx bx-heart bx-tada"></i>';
            $.ajax({
                url: "{{ url('/addfavorite') }}",
                method: "POST",
                data: {
                    "_token":"{{ csrf_token() }}",
                    product_id: product_id,
                    customer_id: customer_id
                },
                success:function(data){
                    if(data.done){
                    $('#addfavourite').html(heartIconAdded);
                    Toast.fire({
                  icon: 'success',
                  title: data.message
                });
                }
                else if (data.require){
                     Toast.fire({
                  icon: 'warning',
                  title: data.message
                });
                }
                else
                {
                    $('#addfavourite').html(heartIcon);
                     Toast.fire({
                  icon: 'success',
                  title: data.message
                });
                }
                }
            });
      });
   
    $(document).ready(function(){


         function render(res){
            $('.minicart').empty();
            $('.minicart').html(res);

            $('.cart-item-count').text($('#idqty').val());
        };

      




        // fetch();
        
        // function fetch(){
        //     var product_id = $('.idproduct').val();
        //     $.ajax({
        //         url:"{{ url('fetchcmt') }}",
        //         method:"POST",
        //         data:
        //         {
        //             product_id:product_id,
        //             _token:_token
        //         },
        //         success:function(data){
        //             $('#loadcomment').html(data);
        //         }
        //     });
        // }
        var _token = $('input[name="_token"]').val();
        // loadmoredata('', _token);
        // function loadmoredata(id = '', _token){
        //     var product_id = $('.idproduct').val();
        //     $.ajax({
        //         url:"{{ url('/loadmorecmt') }}",
        //         method:"POST",
        //         data:{
        //             id:id,
        //             product_id:product_id,
        //             _token:_token
        //         },
        //         success:function(data){
        //             $('.loadmore').remove();
        //             $('#loadcomment').append(data);
        //         }
        //     });
        // }
        fetchrating('');

        function fetchrating(id = ''){
            var product_id = $('.idproduct').val();
            $.ajax({
                url:"{{ url('/loadmorert') }}",
                method:"POST",
                data:{
                    id:id,
                    product_id:product_id,
                    _token:_token
                },
                success:function(data){
                    $('.loadmore').remove();
                    $('#loadcomment').append(data);
                }
            });
        }
        if($('#validatedFormRating').length > 0){
            $('#validatedFormRating').validate({
                                                errorClass:"errors",
                                                rules: {
                                                    commentRating: {
                                                        required: true
                                                       
                                                    }
                                                },
                                                messages:{
                                                    
                                                    commentRating:{
                                                        required:"Quý khách vui lòng không để trống trường này"
                                                    },
                                                },
                                                submitHandler: function(form) {
                                                    //Will execute only when the form passed validation.
                                                    onSubmitRating(form);
                                                }
                                            }); 
                                            }
        function onSubmitRating(form){
            var pro_id = $('.proid').val();
            var star = $('.star-rating').val();
            var content = $('#feedback').val();
            var person = $('#author').val();
            var product_name = $('#proname').val();
            $('#submitRating').html(spinner);
            setTimeout(function(){
                $.ajax({
                url:"{{ url('/sendrating') }}",
                method:"POST",
                data:{
                    person:person,pro_id:pro_id,
                    star:star,
                    content:content,
                    product_name:product_name,
                    "_token":"{{ csrf_token() }}"
                },
                success:function(data){
                    if(data == "done"){
                        $('#submitRating').text('Gửi');
                    Toast.fire({
                  icon: 'success',
                  title: 'Gửi đánh giá sản phẩm thành công! Chúng tôi sẽ phê duyệt đánh giá của bạn sao một thời gian nhất định.'
                });
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
                }
                else if(data == "notbuy"){
                    $('#submitRating').text('Gửi');
                    Toast.fire({
                      icon: 'warning',
                      title: 'Bạn chưa mua sản phẩm này nên không thể tiến hành đánh giá!'
                    });
                }
                else if(data == "failed")
                {
                    Swal.fire(
                          'Thông báo!',
                          'Bạn cần phải đăng nhập để có thể đánh giá sản phẩm!',
                          'warning'
                        ).then(()=> window.location = "{{ url('/logincheckout') }}"); 
                }
                // fetchrating('');
                }
            });
            }, 1500);
        }
        $(document).on("click",'.loadmore',function(){
            const spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>';
            id = $(this).data('id');
            $('.loadmore').html(spinner);
            setTimeout(function(){
                fetchrating(id);
            },1500)
            
        });
        // $(document).on("click",'.submitcmt',function(){
        //     var name = $('.cmt_person').val();
        //     var content = $('.cmt_content').val();
        //     var product_id = $('.idproduct').val();
        //     id = $(this).data('id');
        //     $.ajax({
        //         url:"{{ url('/postcmt') }}",
        //         method:"POST",
        //         data:{
        //             name:name,
        //             content:content,
        //             product_id:product_id,
        //             "_token":"{{ csrf_token() }}",
        //             success:function(data){
        //                 alertify.success('Bình luận thành công');
        //             }
        //         }
        //     });
        // });

        function rendercurrentqty(res){
             $('.currentqtyclass').html(res);
        }
            

         $('.add-to-cart-related').click(function(e){
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

        $('.add-to-cart').click(function(){
            var id = $(this).data('id_pro');
            var cart_product_id = $('.cart_product_id_'+ id).val();
            var cart_product_name = $('.cart_product_name_'+ id).val();
            var cart_product_quantity = $('.cart_product_quantity_'+ id).val();
            var cart_product_img = $('.cart_product_img_'+ id).val();
            var cart_product_price = $('.cart_product_price_'+ id).val();
            var cart_product_qty = $('.cart_product_qty_'+ id).val();
            var _token = $('input[name="_token"]').val();
            var cart_current_qty = $('.currentqty_'+ id).val();
            // alert(cart_current_qty);
            // alert(cart_product_quantity);
            // alert(cart_product_qty);
             
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

         $(document).on('click','.xoaitem', function(e){
        e.preventDefault();
        var id = $(this).data('idxoaitem');
        $.ajax({
            url: `{{ url('xoaitem/${id}') }}`,
            type: 'GET'
        }).done(function(res){
           render(res);
        });
    });
        
    });
    
</script>
@endsection