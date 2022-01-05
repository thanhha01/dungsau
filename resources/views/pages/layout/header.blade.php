<header id="header" class="">
	<div class="header_top wow fadeInDown">
		<div class="container">
			<ul class="header_user">
				@if(Auth::user())
					<li> 
						<a href="javascript:void(0)">
							<i class="fa fa-user" aria-hidden="true"></i>
							@if(Auth::user()->name)
								{{Auth::user()->name}}
							@else
								NULL
							@endif
						</a> 
					</li>
					<li> 
						<a href="{{ url('logout') }}">
							<i class="fa fa-unlock-alt" aria-hidden="true"></i>Đăng xuất
						</a> 
					</li>
				@else
					<li> 
						<a class="btn" onclick="showRigister()">
							<i class="fa fa-user" aria-hidden="true"></i>Đăng Ký
						</a> 
					</li>
					<li> 
						<a class="btn" onclick="showLogin()">
							<i class="fa fa-unlock-alt" aria-hidden="true"></i>Đăng Nhập
						</a> 
					</li>
				@endif
				<li> <a href=""><i class="fa fa-globe" aria-hidden="true"></i>Bản Đồ</a> </li>
			</ul>
			<div class="header_search">
				<form method="post" action="{{ url('tim-kiem.html') }}">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input id="search-field" type="text" name="txt_search">
					<button id="search-submit" type="submit" name="btn_search">
						<i class="fa fa-search fa-lg" aria-hidden="true"></i>
					</button>
				</form>
			</div>
			<div class="header_cart">
				<a href="xem-gio-hang.html" >
					<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
					<span class="count">
						@if(Cart::count())
							{{Cart::count()}}
						@else
							0
						@endif
					</span>
					<span>sản phẩm</span>
				</a>
			</div>
		</div>
	</div>
	@include('pages.layout.menu')
</header>