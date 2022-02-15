<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mã khuyến mãi dành cho khách hàng</title>
</head>
<body>
	<h1>Mã dành cho khách hàng của DTSport <a target="_blank" href="http://localhost:8012/dtbrand/">http://localhost:8012/dtbrand/</a></h1>
	<div class="container">
		<p class="code">Sử dụng mã giảm sau: <span class="promo">{{ $coupon['coupon_code'] }}</span></p>
		<p class="code">Số lượng mã là: <span class="promo">{{ $coupon['coupon_time'] }}</span></p>
		@if($coupon['coupon_condition']==1)
		GIẢM {{ $coupon['coupon_method'] }} %
		@else
		GIẢM {{ number_format($coupon['coupon_method'],0,',','.') }} VNĐ
		@endif
		Cho tổng đơn hàng
		<p class="expire">Ngày sử dụng từ ngày: {{ $coupon['start_day'] }}</p>
		<p class="expire">Ngày hết hạn đến hết ngày: {{ $coupon['end_day'] }}</p>
	</div>
</body>
</html>