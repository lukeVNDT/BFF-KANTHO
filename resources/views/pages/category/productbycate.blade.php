@extends('welcome')
@section('content')

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
.spinner-border{
    position: absolute;
  left: 425px;
  top: 150px;
}
.common_selector{
    height: 15px;
    width: 15px;
}
.checkAll {
  border: 0px;
  color: #e13300;
  margin: 4px;
  padding: 4px 12px;
  cursor: pointer;
  background: transparent;
}
.unCheck {
  border: 0px;
  color: #e13300;
  margin: 4px;
  padding: 4px 12px;
  cursor: pointer;
  background: transparent;
}

.checkAll.active,
.checkAll.active:hover {
  background: #e13300;
  color: #fff;
}
.unCheck.active,
.unCheck.active:hover {
  background: #e13300;
  color: #fff;
}

.checkAll:hover {
  background: #efefef;
}

.unCheck:hover {
  background: #efefef;
}

input[type=checkbox] {
  vertical-align: middle !important;
}

.tree {
  margin: 2% auto;
  width: 80%;
}

.tree ul {
  display: none;
  margin: 4px auto;
  margin-left: 6px;
  border-left: 1px dashed #dfdfdf;
}


.tree li {
  padding: 12px 18px;
  cursor: pointer;
  vertical-align: middle;
  background: #fff;
}

.tree li:first-child {
  border-radius: 3px 3px 0 0;
}

.tree li:last-child {
  border-radius: 0 0 3px 3px;
}

.tree .active,
.active li {
  background: #efefef;
}

.tree label {
  cursor: pointer;
}

.tree input[type=checkbox] {
  margin: -2px 6px 0 0px;
}

.has > label {
  color: #000;
}

.tree .total {
  color: #e13300;
}
#labelHolder {
    height: 7px;
    position: relative;
    border: none;
}
#labelHolder span {
    font-weight: bold;
    color: #bcbcbc;
}
i.bxs-heart
                            {
                                color: #DC143C;
                            }
</style>
<div id="overlay" style="display:none;">
    <div class="spinner"></div>
    <br/>
    Xin chờ...
</div>
<!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                          @foreach($catebyid as $key=>$catebyid)
                          <input type="hidden" id="cateid" value="{{$catebyid->category_id}}">
                            <li><a href="index.html">Trang chủ</a></li>
                            <li class="active">{{ $catebyid->category_name }}</li>
                          @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-1 order-lg-2">
                            <!-- Begin Li's Banner Area -->
                            {{-- <div class="single-banner shop-page-banner">
                                <a href="#">
                                    <img src="{{ asset('public/frontend/limupa/images/banner/banner1.jpg') }}" alt="Li's Static Banner">
                                </a>
                            </div> --}}
                            <!-- Li's Banner Area End Here -->
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                {{-- <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <!-- shop-item-filter-list start -->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                            <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                    <div class="toolbar-amount">
                                        <span>Showing 1 to 9 of 15</span>
                                    </div>
                                </div> --}}
                                <!-- product-select-box start -->
                                <div class="product-select-box">
                                    <div class="product-short">
                                        <p>Sắp xếp:</p>
                                         <input type="hidden" class="selectedinput"/>
                                        <select id="sapxep">
                                            <option value="trending">Relevance</option>
                                            <option value="az">Tên (A - Z)</option>
                                            <option value="za">Tên (Z - A)</option>
                                            <option value="giagiam">Giá giảm dần</option>
                                            <option value="giatang">Giá tăng dần</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="list-view" class="tab-pane fade product-list-view active show" role="tabpanel">
                                        
                                    </div>
                                    <div class="row loadsp" >
                                           
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
                             <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                                 <button type="button" class="btn btn-primary" id="filterAll"
                                style="
                                    background-color: #c2cd4a;
                                    padding: 15px 20px;
                                    border-radius: 10px;
                                    color: #fff;
                                    font-size: 14px;
                                    transition: all 200ms ease;
                                    cursor: pointer;
                                    box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
                                    border: none;
                                    width: 230px;">
                                 Lọc</button>
                             </div>
                             <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                                

                                <div class="sidebar-title mt-2 mb-2">
                                    <h2>Lọc giá sản phẩm</h2>
                                </div>
                                <div id="labelHolder">
                                <span id="gianho"></span>
                                <span id="gialon"></span>
                                </div>
                                <br>
                                <div id="slider-range" style="width: 240px;">
                                                                  
                                </div>
                                
                                {{-- <button type="button" class="btn btn-primary" id="locgia"
                                style="
                                    background-color: #2196f3;
                                    padding: 15px 20px;
                                    border-radius: 10px;
                                    color: #fff;
                                    font-size: 14px;
                                    transition: all 200ms ease;
                                    cursor: pointer;
                                    box-shadow: 0 4px 20px 0 rgba(61, 71, 82, 0.1), 0 0 0 0 rgba(0, 127, 255, 0);
                                    border: none;
                                    width: 230px;">
                                 Lọc giá</button> --}}
                            </div>
                            <!--sidebar-categores-box start  -->
                            
                            <!--sidebar-categores-box end  -->
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box">
                                <div class="sidebar-title">
                                    <h2>Lọc bởi</h2>
                                </div>
                                <!-- btn-clear-all start -->
                               {{--  <button type="button" class="btn btn-primary" id="filterAll"
                                style="
                                    background-color: #2196f3;
                                    padding: 15px 20px;
                                    border-radius: 10px;
                                    color: #fff;
                                    font-size: 14px;
                                    transition: all 200ms ease;
                                    cursor: pointer;
                                    box-shadow: 0 4px 20px 0 rgba(61, 71, 82, 0.1), 0 0 0 0 rgba(0, 127, 255, 0);
                                    border: none;
                                    width: 230px;">
                                 Lọc giá</button> --}}
                                <div class="controls">
                                  <button class="checkAll">Chọn tất cả</button>
                                  <button class="unCheck">Hủy chọn</button>
                                </div>
                                <!-- btn-clear-all end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area">
                                    <h5 class="filter-sub-titel">Nhãn hiệu</h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                @foreach($brand as $key => $br)
                                                <li><input type="checkbox" class="common_selector brandloc" value="{{ $br->brand_id }}"/>   {{ $br->brand_name }}</li>
                                                @endforeach
                                        </form>
                                    </div>
                                 </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Danh mục</h5>
                                    <div class="box">
  {{-- <ul class="directory-list">
    @foreach($category as $cat)
    <li class="folder"><input class="common_selector mr-2" type="checkbox" value="{{$cat->category_id}}" >{{$cat->category_name}}<i class="fas fa-arrow-down"></i>
        @include('layout.frontend.include.listtreecheckbox', ['childs' => $cat->childs])
    </li>
    @endforeach
  </ul> --}}

<ul class="tree">
     @foreach($category as $cat)
     @if($cat->parent_id == 0)
  <li class="has">
    <input id="filtercate" class="common_selector cateloc" type="checkbox" name="domain[]" value="{{$cat->category_id}}">
    <span>{{$cat->category_name}} <span class="total">({{$cat->productCount->count()}})</span></span>
    @include('layout.frontend.include.listtreecheckbox', ['childs' => $cat->childs])
  </li>
  @endif
   @endforeach
</ul>
</div>
                                    {{-- <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                <li><input type="checkbox" name="product-categori"><a href="#">Dụng cụ thể thao</a>
                                                    <ul>
                                                        <li>
                                                            haha
                                                        </li>
                                                    </ul></li>
                                                <li><input type="checkbox" name="product-categori"><a href="#">Dụng cụ fitness</a></li>
                                            </ul>
                                        </form>
                                    </div> --}}
                                 </div>
                               
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!-- category-sub-menu start -->
                            
                        </div>
                    </div>
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
            <!-- Content Wraper Area End Here -->
            <style type="text/css">
                #loading
                {
                    text-align: center;
                    background: url('/public/upload/loader/bars.svg') no-repeat center;
                    height: 150px;

                }
            </style>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        getInitialData();


        $(document).on("click", ".pagination a", function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var min = $('#gianho').val();
            var max = $('#gialon').val();
            var brand = get_filter('brandloc');
            var cate = get_filter('cateloc');
            var filterby = $(".selectedinput").val();
            fetchPaginationData(page,min,max,brand,cate,filterby);
    });

    function fetchPaginationData(page,min,max,brand,cate,filterby){
        let category_id = $('#cateid').val();
      $.ajax({
        url:`{{url('/danhmucsp/fetch_data/${category_id}')}}` + "?page=" + page + "&min=" + min + "&max=" + max +
        "&brand=" + brand + "&cate=" + cate + "&filterby=" + filterby,
        success:function(data){
            $('.loadsp').html(data);
        }
      });
    }

        function getInitialData(){
            let category_id = $('#cateid').val();
            $.ajax({
                url:`{{url('/initialproductbycate/${category_id}')}}`,
                success:function(data){
                    $('.loadsp').html(data);
                }
            });
        }
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
        var growinSpinner = ' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>';
        var circleSpiner = '<div class="text-center"><div style="width: 4.5rem; height: 4.5rem;" class="spinner-border text-warning"role="status"><span class="sr-only">Loading...</span></div></div>';


        $(document).on("click",".xemnhanh", function(){
            var url = $(this).attr('href');

            $.ajax({
                url:url,
            success:function(data){
                $('.loadquickview').html(data.result);
            }
            });
        });


        $(document).on('click', '.tree span', function(e) {
  $(this).next('ul').fadeToggle();
  e.stopPropagation();
});

$(document).on('change', '.tree input[type=checkbox]', function(e) {
  // $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
  // $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
  e.stopPropagation();
});

$(document).on('click', '.checkAll', function(e) {
  switch ($(this).text()) {
    case 'Chọn tất cả':
      $(".tree input[type='checkbox']").prop('checked', true);
      $(".brandloc").prop('checked', true);
      break;
    default:
  }
});

$(document).on('click', '.unCheck', function(e) {
  switch ($(this).text()) {
    case 'Hủy chọn':
      $(".tree input[type='checkbox']").prop('checked', false);
       $(".brandloc").prop('checked', false);
      break;
    default:
  }
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
            var cart_current_qty = $('.currentqty_'+ id).val();
            var _token = $('input[name="_token"]').val();
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

function render(res){
            $('.minicart').empty();
            $('.minicart').html(res);
            $('.cart-item-count').text($('#idqty').val());
        };
        $(document).on('click','.xoaitem', function(e){
        e.preventDefault();
        var id = $(this).data('idxoaitem');
        $.ajax({
            url: `{{url('/xoaitem/${id}')}}`,
            type: 'GET'
        }).done(function(res){
           render(res);
        });
    });


        // $("#locgia").click(function(){
        //     var min = $('#gianho').val();
        //     var max = $('#gialon').val();
        //     $(this).html(growinSpinner);
        //     setTimeout(function(){
        //         $.ajax({
        //         url:"{{ url('/filterbyrange') }}",
        //         method:"POST",
        //         data:
        //         {
        //             min:min,
        //             max:max,
        //             "_token":"{{ csrf_token() }}"
        //         },
        //         success:function(data){
        //             $('#locgia').text('Lọc giá');
        //             $('.loadsp').html(data.html);
        //             if(data.message){

        //                 swal("Thông báo!",data.message, "error");
        //             }
        //         }
        //     });
        //     },1500);
            
        // });
      $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: {{ $min_price_range }},
      max: {{ $max_price_range }},
      values: [ {{ $min_price }}, {{ $max_price }} ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        // $( "#gianho" ).val(ui.values[ 0 ]+" VND");
        // $( "#gialon" ).val(ui.values[ 1 ]+" VND");
        $("#gianho").css('left', ui.values[0] + "%").text(addCommas(ui.values[0]) + "đ - ");
          $("#gialon").css('left', ui.values[1] + "%").text(addCommas(ui.values[1]) + "đ");
        },
        create: function(event, ui) {
          $("#gianho").css('left', v[0] + "%").text(v[0]);
          $("#gialon").css('left', v[1] + "%").text(v[1]);
        }
    });

    function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
        $('#sapxep').change(function(){
            var selected = $(this).val();
            var ip = $('.selectedinput').val(selected);
        });
        function get_filter(class_name){
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
            });
            return filter;
            // var finalcate = cate.toString();
            // var finalbrand = filter.toString();

            // console.log(finalbrand);
            // console.log(finalcate);
            
            // $('.loadsp').html('<div id="loadingsp" style=""></div>');
            
        }
        $(document).on("click","#filterAll",function(){
            var action = 'fetch_data';
            var mindata = $('#gianho').text();
            var maxdata = $('#gialon').text();
            var minsplit = mindata.split('đ -')
            var maxsplit = maxdata.split('đ');
            var min = minsplit[0];
            var max = maxsplit[0];
            var finalbrand = get_filter('brandloc');
            var finalcate = get_filter('cateloc');
            var selected = $(".selectedinput").val();
            $('.loadsp').html(circleSpiner);
            setTimeout(function(e){
                $.ajax({
                url:"{{ url('/fetchfilterproduct') }}",
                method:"POST",
                data:
                {
                    selected:selected,
                    finalbrand:finalbrand,
                    finalcate:finalcate,
                    min:min,
                    max:max,
                    action:action,
                    "_token":"{{ csrf_token() }}"
                },
                success:function(data){
                    if(data.message){
                        Swal.fire(
                          'Thông báo!',
                          data.message,
                          'error'
                        );
                    }
                    else
                    {
                        $('.loadsp').html(data.html);
                    }
                }
            });
            },1500);
        });
    });
</script>
@endsection