
@if(Session::get('cart')==true)
                                                    <?php
                                                    $total = 0;
                                                    $totalqty = 0;
                                                    ?>
<ul class="minicart-product-list">
                                                    
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
                                                 
                                                </ul>
                                                <p class="minicart-total">T???ng: <span>{{ number_format($total).' '.'VND' }}</span></p>
                                                <input type="hidden" id="idqty" value="{{ $totalqty }}">
                                                <div class="minicart-button">
                                                    <a href="{{ URL::to('/showcartajax') }}" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Chi ti???t gi??? h??ng</span>
                                                    </a>
                                                   @if(Session::get('customer_id'))
                                                    <a href="{{URL::to('/checkout')}}" class="li-button li-button-fullwidth">
                                                        <span>Thanh to??n</span>
                                                    </a>
                                                    @else
                                                    <a href="{{URL::to('/logincheckout')}}" class="li-button li-button-fullwidth">
                                                        <span>Thanh to??n</span>
                                                    </a>
                                                    @endif
                                                </div>
                                               
@elseif(Session::get('cart')==null)
                                                <ul class="minicart-product-list">
                                                    <p class="minicart-total" style="text-align: center;"> Gi??? h??ng ??ang tr???ng</span> </p>
                                                </ul>
                                                
@endif