@extends('pages.master')
@section('title','trang chu webshop')
@section('content')
	
	@include('pages.layout.slide')
	  
	<!-- Star sản phẩm nổi bật -->
	<div id="showcase">
		<div class="container">
			<div class="main_content col-sm-12 " style="padding-left: 0px; padding-right: 0px; margin: 30px 0px;">
				<h2 class="page_heading">Sản phẩm bán chạy</h2>
				<div class="collection_listing_main row">
					@foreach($products_noibat as $noibat)
					<div class="product_listing_main">
						<div class="product col-sm-2">
							<div class="product_wrapper clearfix">
								<div class="product_img">
									<a class="img_small" href="{{ url(''.$noibat->cates->alias.'/'.$noibat->id.'-'.$noibat->alias.'.html') }}">
										<img src="{{ asset('/upload/image/'.$noibat->image) }}">
									</a>
								</div>
								<div class="product_info">
									<div class="product_name">
										<a href="{{ url(''.$noibat->cates->alias.'/'.$noibat->id.'-'.$noibat->alias.'.html') }}">{{$noibat->name}}</a>
									</div>
									<div class="product_price">
										<span class="money">
											{{$noibat->price}} VNĐ
										</span>
									</div>
									<div class="product_links">
										<button class="btn btn_cart" masp="{{$noibat->id}}" onclick="addCart()">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</button>
										<a class="btn btn_detail" href="{{ url(''.$noibat->cates->alias.'/'.$noibat->id.'-'.$noibat->alias.'.html') }}">
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span class="txt_detail">chi tiết</span>
										</a>
										
									</div>
								</div>
							</div>
							@php($qrcode_url = url($noibat->cates->alias.'/'.$noibat->id.'-'.$noibat->alias.'.html'))
							<p class="qrcode_elm_child">{!! generateQr($qrcode_url) !!} </p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- End sản phẩm nổi bật -->

	

	<!-- Star sản phẩm mới -->
	<div id="showcase">
		<div class="container">
			<div class="main_content col-sm-12 " style="padding-left: 0px; padding-right: 0px; margin: 30px 0px;">
				<h2 class="page_heading">Sản phẩm khuyến mại</h2>
				<div class="collection_listing_main row">
					@foreach($products_moi as $moi)
					<div class="product_listing_main">
						<div class="product col-sm-2">
							<div class="product_wrapper clearfix">
								<div class="product_img">
									<a class="img_small" href="{{ url(''.$noibat->cates->alias.'/'.$moi->id.'-'.$noibat->alias.'.html') }}">
										<img src="{{ asset('/upload/image/'.$moi->image) }}">
									</a>
								</div>
								<div class="product_info">
									<div class="product_name">
										<a href="{{ url(''.$noibat->cates->alias.'/'.$moi->id.'-'.$noibat->alias.'.html') }}">{{$moi->name}}</a>
									</div>
									<div class="product_price">
										<span class="money">
											{{number_format($moi->price)}} VNĐ
										</span>
									</div>
									<div class="product_links">
										<button class="btn btn_cart" masp="{{$moi->id}}" onclick="addCart()">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</button>
										<a class="btn btn_detail" href="{{ url(''.$noibat->cates->alias.'/'.$moi->id.'-'.$noibat->alias.'.html') }}">
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span class="txt_detail">chi tiết</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- End sản phẩm mới -->

	<!-- Star dịch vụ khách hàng -->
	<div id="custom_bottom">
		<div class="container">
			<h3 class="widget_header wow fadeInLeft">
				Dịch vụ khách hàng
			</h3>
			<div class="row">
				<div class="col-sm-6 clearfix custom_bottom__item wow fadeInLeft">
					<a href="">
						<i class="fa"></i>
						<div class="custom_bottom_right">
							<h4> khuyến mãi </h4>
							<p></p>
						</div>
					</a>
				</div>
				<div class="col-sm-6 custom_bottom__item wow fadeInLeft">
					<a href="">
						<i class="fa fa-truck"></i>
						<div class="custom_bottom_right">
							<h4> giao hàng tận nhà </h4>
							<p>Liên doanh với các hãng vận chuyển hàng đầu, traicaysach hỗ trợ dịch vụ giao hàng tận nơi trên tất cả các tỉnh thành. Ngoài ra khách hàng cũng có thể chọn vận chuyển tốc hành, giao hàng theo ngày giờ yêu cầu..</p>
						</div>
					</a>
				</div>
				<div class="col-sm-6 custom_bottom__item wow fadeInLeft">
					<a href="">
						<i class="fa fa-cogs"></i>
						<div class="custom_bottom_right">
							<h4> chính sách bảo hành và đổi trả sản phẩm </h4>
							<p>Quy trình đánh giá chất lượng sản phẩm này có thể cần khoảng 5 ngày làm việc tính từ thời điểm nhận được sản phẩm gửi trả tại kho. Sau đó quý khách sẽ nhận được email thông báo kết quả kiểm tra đánh giá sản phẩm.</p>
						</div>
					</a>
				</div>
				<div class="col-sm-6 custom_bottom__item wow fadeInLeft">
					<a href="">
						<i class="fa fa-credit-card"></i>
						<div class="custom_bottom_right">
							<h4> ưu đải thành viên </h4>
							<p>1. Chương trình ưu đãi giá đặc biệt 5% và tích lũy điểm chỉ được áp dụng khi khách hàng có xuất trình thẻ thành viên khi thanh toán. <br>2. Tiền tích lũy và thông tin phân hạng được cập nhật sau khi khách hàng thanh toán.</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End dịch vụ khách hàng -->

	
@endsection
