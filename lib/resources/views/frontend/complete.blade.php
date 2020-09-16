@extends('frontend.master')
@section('title','thanh toán thành công qua mail')
@section('main')
	<link rel="stylesheet" href="css/complete.css">
					<div id="wrap-inner">
						<div id="complete">
							<p class="info">Quý khách đã đặt hàng thành công!</p>
							<p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
						</div>
						<p class="text-right return"><a href="{{asset('/')}}">Quay lại trang chủ</a></p>
					</div>					
			@stop	