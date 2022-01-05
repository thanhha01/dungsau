<div class="header_isStuck">
	<div class="container">
		<div id="logo">
			<a href="./" class="d-inline-block" style="width: 100px">
				<img src="{{ asset('/pages/image/lg.jpg') }}" alt="" class="w-100">
			</a>
		</div>

		<!-- Star menu -->
		<div id="megamenu">
			<ul class="sf-menu">
				<li>
					<a class="active" href="./">Trang Chủ</a>
				</li>
				<li>
					<a class="{{ request()->path() == "gioi-thieu.html" ? "active" : ""}}" href='{{ url("gioi-thieu.html") }}'>Giới Thiệu</a>
				</li>
				<?php 
					$cates = DB::table('cates')->orderBy('order','ASC')->get(); 
				?>
				@foreach($cates as $category)
					<?php $url = url(''.$category->id.'-'.$category->alias.'.html'); ?>
				<li>
					<a <?php 
						if (URL::full() == $url) {
                            echo "class='active'";
                        }
					 ?>
					 href="{{ url(''.$category->id.'-'.$category->alias.'.html') }}">{{$category->name}}</a>
					<?php 
						$cates_lv1 = DB::table('cates_lv1')
							->orderBy('order','ASC')
								->where('id_cate',$category->id)->get(); 
					?>
					@if( $cates_lv1->count() > 0 )
					<ul>
						@foreach($cates_lv1 as $category_lv1)
						<li class="megamenu_item_2 ">
							<div class="submenu submenu_2">
								<div class="col-sm-3 submenu_item">
									<h4>
										<a href="{{ url($category_lv1->alias) }}">{{$category_lv1->name}}</a>
									</h4>
									<ul>
										<?php $cates_lv2 = DB::table('cates_lv2')->where('id_cate_lv1',$category_lv1->id)->get(); ?>
										@foreach($cates_lv2 as $category_lv2)
										<li>
											<a href="{{ url(''.$category->alias.'/'.$category_lv1->alias.'/'.$category_lv2->id.'-'.$category_lv2->alias.'.html') }}">
												<i class="fa fa-angle-right" aria-hidden="true"></i>
												{{$category_lv2->name}}
											</a>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
					@endif
				</li>
				@endforeach
				
				<li>
					<a style="color: red" href="">Hướng Dẩn Mua Hàng</a>
				</li>
			</ul>
			<div class="megamenu_mobile">
				<h2>Menu</h2>
				<ul class="level_1">
					<li>
						<a class="active" href="./">Trang Chủ</a>
					</li>
					@foreach($cates as $category)
					<li>
						<a href="{{ url(''.$category->id.'-'.$category->alias.'.html') }}">{{$category->name}}</a>
						<?php 
							$cates_lv1 = DB::table('cates_lv1')
								->orderBy('order','ASC')
									->where('id_cate',$category->id)->get(); 
						?>
						@if( $cates_lv1->count() > 0 )
						<ul class="level_2">
							@foreach($cates_lv1 as $category_lv1)
							<li>
								<a href="{{ url('danh-muc-'.$category->alias.'/'.$category_lv1->id.'-'.$category_lv1->alias.'.html') }}">{{$category_lv1->name}}</a>
								<?php $cates_lv2 = DB::table('cates_lv2')->where('id_cate_lv1',$category_lv1->id)->get(); ?>
								@if( $cates_lv2->count() > 0 )
								<ul class="level_3">
									@foreach($cates_lv2 as $category_lv2)
									<li>
										<a href="{{ url(''.$category->alias.'/'.$category_lv1->alias.'/'.$category_lv2->id.'-'.$category_lv2->alias.'.html') }}">											
											{{$category_lv2->name}}
										</a>
									</li>
									@endforeach
								</ul>
								@endif
							</li>
							@endforeach
						</ul>
						@endif
					</li>
					@endforeach
					<li>
						<a href="">Tuyển Dụng</a>
					</li>
					<li>
						<a style="color: red" href="">Hướng Dẩn Mua Hàng</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- End menu -->

	</div>
</div>
<div class="pseudoStickyBlock"></div>