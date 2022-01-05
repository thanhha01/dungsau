@extends('pages.master')
@section('title')
	Tìm kiếm
@endsection
@section('content')
	<div class="breadcrumb_wrap">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="./">Trang chủ</a>
				</li>
				<li>
					<a href="javascript:void(0)">Tìm kiếm</a>
				</li>
			</ul>
		</div>
	</div>
	@if(count($dataSearch) == 0 || $tukhoa == '%')
		<div class="container">
		  <div style="
		  			text-align: center;
		  			height: 200px; 
		  			width: 100%; 
		  			border-radius: 4px;
		  			background-color: #eaeaea; 
		  			margin: 50px 0;
		  		">
			  	<p style="
			  		line-height: 200px;
			  	">
			  		Không có kết quả tìm kiếm nào với từ khóa {{$tukhoa}}
			  	</p>
		  </div>
		</div>
	@else
	<!-- Star category -->
	<?php  
		function doimau($tukhoa,$str){
			return str_replace($tukhoa, "<span style='color:#d1b600;'>$tukhoa</span>", $str);
		}
	?>
	<div id="showcase">
		<div class="container">
			<div class="main_content col-sm-12 " style="padding-left: 0px; padding-right: 0px; margin: 30px 0px;">
				<h2 class="page_heading">{{$tukhoa}}</h2>
				<div class="collection_listing_main row">
					@foreach($dataSearch as $itemSearch)
					<div class="product_listing_main">
						<div class="product col-sm-2">
							<div class="product_wrapper clearfix">
								<div class="product_img">
									<a class="img_small" href="{{ url(''.$itemSearch->cates->alias.'/'.$itemSearch->id.'-'.$itemSearch->alias.'.html') }}">
										<img src="{{ asset('/upload/image/'.$itemSearch->image) }}">
									</a>
								</div>
								<div class="product_info">
									<div class="product_name">
										<a href="{{ url(''.$itemSearch->cates->alias.'/'.$itemSearch->id.'-'.$itemSearch->alias.'.html') }}">
										<?php echo doimau($tukhoa,$itemSearch->name) ?>
										</a>
									</div>
									<div class="product_price">
										<span class="money">
											{{number_format($itemSearch->price)}} VNĐ
										</span>
									</div>
									<div class="product_links">
										<button class="btn btn_cart" masp="{{$itemSearch->id}}" onclick="addCart()">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</button>
										<a class="btn btn_detail" href="{{ url(''.$itemSearch->cates->alias.'/'.$itemSearch->id.'-'.$itemSearch->alias.'.html') }}">
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span class="txt_detail">chi tiết</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<div class="container clearfix">
						
					   {{ $dataSearch->links() }}
						
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
@endsection
				