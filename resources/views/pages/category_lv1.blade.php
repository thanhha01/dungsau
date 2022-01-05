@extends('pages.master')
@section('title')
	{{$cate_name->name}}
@endsection
@section('content')
	<div class="breadcrumb_wrap">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="./">Trang chủ</a>
				</li>
				<li>
					<a href="{{ url(''.$cate_name->cates->id.'-'.$cate_name->cates->alias.'.html') }}">{{$cate_name->cates->name}}</a>
				</li>
				<li>
					<a href="javascript:void(0)">{{$cate_name->name}}</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- Star category -->
	@if(count($product_cate) == 0 )
		<div class="container">
		  <div class="thump">
			  	<p>
			  		Không có sản phẩm nào trong danh mục {{$cate_name->name}}
			  	</p>
		  </div>
		</div>
	@else
	<div id="showcase">
		<div class="container">
			<div class="main_content col-sm-12 " style="padding-left: 0px; padding-right: 0px; margin: 30px 0px;">
				<h2 class="page_heading">{{$cate_name->name}}</h2>
				<div class="collection_listing_main row">
					@foreach($product_cate as $item)
					<div class="product_listing_main">
						<div class="product col-sm-2">
							<div class="product_wrapper clearfix">
								<div class="product_img">
									<a class="img_small" href="{{ url(''.$item->cates->alias.'/'.$item->id.'-'.$item->alias.'.html') }}">
										<img src="{{ asset('/upload/image/'.$item->image) }}">
									</a>
								</div>
								<div class="product_info">
									<div class="product_name">
										<a href="{{ url(''.$item->cates->alias.'/'.$item->id.'-'.$item->alias.'.html') }}">{{$item->name}}</a>
									</div>
									<div class="product_price">
										<span class="money">
											{{number_format($item->price)}} VNĐ
										</span>
									</div>
									<div class="product_links">
										<button class="btn btn_cart" masp="{{$item->id}}" onclick="addCart()">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</button>
										<a class="btn btn_detail" href="{{ url(''.$item->cates->alias.'/'.$item->id.'-'.$item->alias.'.html') }}">
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
						
					    {{$product_cate->links()}}
						
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
@endsection
				