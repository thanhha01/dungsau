@extends('pages.master')

@section('title')
	{{$product->name}}
@endsection

@section('content')
	<div id="main">
		<div class="container">
			<div class="row">
				<div class="main_content col-sm-9">
					<div class="product_wrap">
						<div class="row">
							<div class="col-sm-7">
								<div>
									<?php 
				                		
				                		$hinh1 = $product_img->shift();
				                	?>
				                	@if($hinh1)
									<img src="{{ asset('/upload/detail/'.$hinh1->image) }}">
									@endif
								</div>
							</div>
							<div class="col-sm-5">
								<div class="product_name">
									<h2>{{$product->name}}</h2>
								</div>
								<div class="product_price">
									<span class="money">
										{{number_format($product->price)}} VNĐ
									</span>
									<span style="color: red;">{{$product->quantity > 0 ? "(Còn hàng)" : "(Hết hàng)"}}</span>
								</div>
								<div class="product_description">{{ $product->description }}</div>
								<button class="btn btn-primary btn-lg btn_cart" masp="{{$product->id}}" onclick="addCart()">
									Mua ngay
								</button>
								<button onclick="linkcart()" class="btn btn-primary btn-lg">Xem giỏ hàng</button>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<h3>Hình ảnh chi tiết</h3>
								<p>
									@foreach($product_img as $item_img)
									<img src="{{ asset('/upload/detail/'.$item_img->image) }}">
									@endforeach
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- sidebar_widget -->
				<div class="col-sm-3 sidebar_widget">
					<h2 class="page_heading2">Mua nhiều nhất</h2>
					<div class="widget_content">
						@foreach($products_noibat as $item_noibat)
						<div class="product wow zoomInUp">
							<div class="product_wrapper">
								<div class="product_img widget_img">
									<a class="img_small" href="{{ url(''.$item_noibat->cates->alias.'/'.$item_noibat->id.'-'.$item_noibat->alias.'.html') }}">
										<img src="{{ asset('/upload/image/'.$item_noibat->image) }}">
									</a>
								</div>
								<div class="product_info">
									<div class="product_name">
										<a href="{{ url(''.$item_noibat->cates->alias.'/'.$item_noibat->id.'-'.$item_noibat->alias.'.html') }}">
											{{$item_noibat->name}}
										</a>
									</div>
									<div class="product_price">
										<span class="money">{{number_format($item_noibat->price)}} VNĐ</span>
									</div>
									<div class="product_links">
										<a class="btn_cart" masp="{{$item_noibat->id}}" onclick="addCart()" href="javascript:void(0)">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</a>
										<a class="" href="{{ url(''.$item_noibat->cates->alias.'/'.$item_noibat->id.'-'.$item_noibat->alias.'.html') }}">
											<span class="">chi tiết</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<!-- Star cung danh muc -->
			@if(count($product_cate)>0)
			<div class="row">
				<div id="showcase">
					<div class="main_content col-sm-12 ">
						<hr>
						<h2 class="page_heading">Sản phẩm cùng danh mục</h2>
						<div class="collection_listing_main row">
							@foreach($product_cate as $prd_cate)
							<div class="product_listing_main">
								<div class="product col-sm-4">
									<div class="product_wrapper clearfix">
										<div class="product_img">
											<a class="img_small" href="{{ url(''.$prd_cate->cates->alias.'/'.$prd_cate->id.'-'.$prd_cate->alias.'.html') }}">
												<img src="{{ asset('/upload/image/'.$prd_cate->image) }}">
											</a>
										</div>
										<div class="product_info">
											<div class="product_name">
												<a href="{{ url(''.$prd_cate->cates->alias.'/'.$prd_cate->id.'-'.$prd_cate->alias.'.html') }}">{{$prd_cate->name}}</a>
											</div>
											<div class="product_price">
												<span class="money">
													{{number_format($prd_cate->price)}} VNĐ
												</span>
											</div>
											<div class="product_links">
												<button class="btn btn_cart" masp="{{$prd_cate->id}}" onclick="addCart()">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<a class="btn btn_detail" href="{{ url(''.$prd_cate->cates->alias.'/'.$prd_cate->id.'-'.$prd_cate->alias.'.html') }}">
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
			@endif
			<!-- End sản phẩm nổi bật -->
		</div>
	</div>
@endsection