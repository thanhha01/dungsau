@extends('pages.master')
@section('title','Giỏ hàng')

@section('content')
	<div id="showcase" style="margin: 30px 0px;">
		<div class="container">
			@if($content->count() == 0 )
			<div class="container">
			  <div class="thump">
				  	<p>
				  		Không có sản phẩm nào trong giỏ hàng !
				  	</p>
			  </div>
			</div>
			@else
			<div class="row">
				<div class="main_content col-sm-9 ">
					<h2 class="page_heading">Giỏ hàng</h2>
					<table class="table table-bordered table-cart">
						<tbody>
							<tr>
								<th> STT </th>									
								<th> Tên sản phẩm </th>
								<th> Hình </th>			
								<th> Số lượng </th>
								<th> Giá </th>
								<th> Thành tiền </th>
								<th> Xóa SP</th>
								<th> Cập nhật </th>
							</tr>
							<?php $stt = 0; ?>
							@foreach($content as $row)
							<?php $stt = $stt + 1; ?>
							<tr>
								<td>{{ $stt }}</td>
								<td>{{$row->name}}</td>
								<td><img width="80px" src="{{ asset('/upload/image/'.$row->options->image) }}"></td>
								<td><input class="qty" type="number" value="{{$row->qty}}" name="" min="1"></td>
								<td>{{number_format($row->price)}} VNĐ</td>
								<td>{{number_format($row->qty*$row->price)}} VNĐ</td>
								<td>
									<a href="xoagiohang/{{$row->rowId}}">
										<img width="20px" src="{{ asset('/pages/image/delete_icon_16.png') }}">
									</a>
								</td>
								<td>
									<a class="updateCart" rowId="{{$row->rowId}}" href="javascript:void(0)">
										<img width="25px" src="{{ asset('/pages/image/update.png') }}">
									</a>
								</td>
							</tr>
							@endforeach
							<tr>
								<td colspan="5"><span style="font-weight: bold;">Tổng tiền hàng</span></td>
								<td colspan="3"><span class="total" style="font-weight: bold; color: blue;">{{number_format($total)}} VNĐ</span></td>
							</tr>
							<tr>
								<td colspan="4">
									<a style="font-weight: bold; color: green;" href="">Tiếp tục mua hàng </a>
									<span style="margin: 0 10px">-</span>
									<a style="font-weight: bold; color: green;" href="xoatoanbogiohang">Xóa giỏ hàng</a>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="row">
						<div class="col-sm-6">
							<button type="button" onclick="showPayCart()" class="btn btn-primary btn-lg btn-block">Hoàn tất đặt hàng</button>										
						</div>
						<div class="col-sm-6">
							<button onclick="linkhome()" type="button" class="btn btn-primary btn-lg btn-block">Về trang chủ</button>										
						</div>
					</div>
				</div>
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
			@endif
		</div>
	</div>
@endsection