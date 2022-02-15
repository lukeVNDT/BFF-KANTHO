@if(is_array($info) || is_object($info))
@foreach($info as $if)
<div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Họ và tên <span class="required">*</span></label>
                                                <input style="width: 570px;" value="{{ $if->customer_name }}"  type="text" name="shipping_cusname" class="shipping_cusname">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Địa chỉ <span class="required">*</span></label>
                                                <input value="{{ $if->customer_address }}" style="width: 570px;" placeholder="Điền địa chỉ của bạn" type="text" name="shipping_address" class="shipping_address">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email <span class="required">*</span></label>
                                                <input style="width: 570px;" value="{{ $if->customer_email }}" type="email" name="shipping_email" class="shipping_email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Số điện thoại  <span class="required">*</span></label>
                                                <input style="width: 570px;" type="text" name="shipping_phone" value="{{ $if->customer_phone }}" class="shipping_phone">
                                            </div>
                                        </div>
@endforeach
@endif
