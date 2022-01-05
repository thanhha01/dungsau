<div class="container">
	  <!-- Modal register -->
	  <div class="modal fade" id="register" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <div class="col-md-12 text-center">
	          	<img width="80px;" src="{{ asset('/pages/image/lg.jpg') }}">
	          </div>
	        </div>
	        <div class="modal-body">
	        	<div class="col-sm-11">
		            <form class="form-horizontal" action="register" method="post">
		            	<input type="hidden" class="token" name="_token" value="{{csrf_token()}}">
		              <div class="form-group">
					    <label for="txt_mail" class="col-sm-4 control-label">Email <span style="color: red;">(*)</span></label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="txt_mail" placeholder="Email">
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="txt_name" class="col-sm-4 control-label">Họ tên</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="txt_name" placeholder="Họ tên">
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="user_phone" class="col-sm-4 control-label">Số điện thoại</label>
					    <div class="col-sm-8">
					      <input name="user_phone" class="form-control" id="user_phone" placeholder="Số điện thoại">
					      <em class="err_user"></em>
					    </div>
					  </div> 
					  <div class="form-group">
					    <label for="txt_pass" class="col-sm-4 control-label">Mật khẩu <span style="color: red;">(*)</span></label>
					    <div class="col-sm-8">
					      <input type="password" name="txt_pass" class="form-control" id="txt_pass" placeholder="Mật khẩu" required>
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <span style="color: red;">(*)</span> <em>Những thông tin bắt buộc phải nhập</em>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <button type="button" onclick="doRigister()" class="btn btn-default btn_register">
					      	<span class="register">Đăng ký</span> 
					      	<img class="ajax-load" src="/pages/image/ajax.gif">
					      </button>
					      <span>đã có tài khoản</span>
					      <button type="button" class="btn btn-default" onclick="show_login()">Đăng nhập</button>
					    </div>
					  </div>
					</form>
				</div>
	        </div>
	        <div class="modal-footer modal_footer"></div>
	      </div>
	    </div>
	  </div>
	   <!-- Modal sign in -->
	  <div class="modal fade" id="sign-in" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <div class="col-md-12 text-center">
	          	<img width="80px;" src="{{ asset('/pages/image/lg.jpg') }}">
	          </div>
	        </div>
	        <div class="modal-body">
	        	<div class="col-sm-11">
		            <form action="userLogin" method="post" class="form-horizontal">
		            	<input type="hidden" class="token_login" name="_token" value="{{csrf_token()}}">
		              <div class="form-group">
					    <label for="email_login" class="col-sm-4 control-label">E-mail</label>
					    <div class="col-sm-8">
					      <input class="form-control listen-key" name="email_login" id="email_login" placeholder="E-mail">
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="pass_login" class="col-sm-4 control-label">Mật khẩu</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control listen-key" name="pass_login" id="pass_login" placeholder="Mật khẩu">
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <div class="checkbox">
					        <label>
					          <input id="remember" type="checkbox"> Nhớ tài khoản
					        </label>
					      </div>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <button type="button" onclick="doLogin()" class="btn btn-default">
					      	<span class="sign-in">Đăng nhập</span> 
					      	<img class="ajax-load" src="/pages/image/ajax.gif">
					      </button>
					       <span>chưa có có tài khoản</span>
					      <button type="button" class="btn btn-default" onclick="show_reg()">Đăng kí</button>
					    </div>
					  </div>
					</form>
				</div>
	        </div>
	        <div class="modal-footer modal_footer"></div>
	      </div>
	    </div>
	  </div>
	  <!-- Modal verify OTP -->
	  <div class="modal fade" id="verify_otp" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <div class="col-md-12 text-center">
	          	<img width="80px;" src="{{ asset('/pages/image/lg.jpg') }}">
	          </div>
	        </div>
	        <div class="modal-body">
	        	<div class="col-sm-11">
		            <form class="form-horizontal" action="verify_otp" method="post">
	            		<input type="hidden" class="token" name="_token" value="{{csrf_token()}}">
		              <div class="form-group">
					    <label for="txt_mail" class="col-sm-4 control-label">Mời bạn nhập mã OTP để hoàn thành đăng ký : <span style="color: red;">(*)</span></label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="otp_code" placeholder="OTP Code" name="otp_code">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <button type="button" onclick="doVerifyOtp()" class="btn btn-default btn_register">
					      	<span class="register">Verify</span> 
					      	<img class="ajax-load" src="/pages/image/ajax.gif">
					      </button>
					    </div>
					  </div>
					</form>
				</div>
	        </div>
	        <div class="modal-footer modal_footer"></div>
	      </div>
	    </div>
	  </div>
	  <!-- Modal pay cart -->
	  <div class="modal fade" id="pay_cart" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <div class="col-md-12 text-center">
	          	<img width="80px;" src="{{ asset('/pages/image/lg.jpg') }}">
	          </div>
	        </div>
	        <div class="modal-body">
	        	<div class="col-sm-11">
		            <form class="form-horizontal" method="post">
		            	<input type="hidden" class="token" name="_token" value="{{csrf_token()}}">
		              <div class="form-group">
					    <label for="phone_pay" class="col-sm-4 control-label">Số điện thoại <span style="color: red;">(*)</span></label>
					    <div class="col-sm-8">
					      <input class="form-control" id="phone_pay" placeholder="Số điện thoại" >
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="name_pay" class="col-sm-4 control-label">Họ tên</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="name_pay" placeholder="Họ tên">
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="address_pay" class="col-sm-4 control-label">Địa chỉ</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="address_pay" placeholder="Địa chỉ">
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="email_pay" class="col-sm-4 control-label">Email</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="email_pay" placeholder="Email">
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="note_pay" class="col-sm-4 control-label">Ghi chú</label>
					    <div class="col-sm-8">
					      <textarea class="form-control" id="note_pay"></textarea>
					      <em class="err_user"></em>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <span style="color: red;">(*)</span> <em>Những thông tin bắt buộc phải nhập</em>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <button type="button" class="btn btn-default doPayCart">
					      <span class="pay_cart">Mua ngay</span> 
					      	<img class="ajax-load" src="/pages/image/ajax.gif">
					      </button>
					    </div>
					  </div>
					</form>
				</div>
	          </div>
	        <div class="modal-footer modal_footer"></div>
	      </div>
	    </div>
	  </div>
	  <!-- Modal add cart-->
	  <div class="modal fade" id="add_cart" role="dialog">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Sản phẩm đã được thêm vào giỏ hàng</h4>
	        </div>
	        <div class="modal-footer">
		        <a href="javascript:void(0)" data-dismiss="modal">Tiếp tục mua hàng</a>
		        <a href="xem-gio-hang.html">Xem giỏ hàng</a>
	        </div>
	      </div>
	    </div>
	  </div>
	  <!-- Modal thông báo Đặt hàng -->
	  <div class="modal fade" id="CompletedOrderCart" role="dialog">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button onclick="linkhome()" data-dismiss="modal" type="button" class="close">&times;</button>
	          <h4 class="modal-title">Đặt hàng thành công</h4>
	        </div>
	        <div class="modal-body">
	          <p>Shop sẽ chủ động gọi điện thoại cho bạn để xác nhận đơn hàng. Cảm ơn !</p>
	        </div>
	        <div class="modal-footer">
	        	<div class="col-sm-12">
	        		<div class="col-sm-3"></div>
	        		<div class="col-sm-6">
	        			<button style="width: 100%;" onclick="linkhome()" data-dismiss="modal" type="button" class="btn btn-primary">Đồng ý</button>
	        		</div>
	        		<div class="col-sm-3"></div>
	        	</div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="modal fade" id="msg_content" role="dialog">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Đăng ký thành công</h4>
	        </div>
	        <div class="modal-footer">
	        	<p>Xin mời <a onclick="show_login()" href="javascript:void(0)">đăng nhập</a></p>
	        </div>
	      </div>
	    </div>
	  </div>
</div>
<script type="text/javascript">
	window.addEventListener('DOMContentLoaded', function(e){
	    $("form[action='userLogin'] input.listen-key").on("keypress", function(e){
	    	if(e.keyCode == 13){
	    		doLogin();
	    	}
	    })
	    $("form[action='register'] input").on("keypress", function(e){
	    	if(e.keyCode == 13){
	    		doRigister();
	    	}
	    })
	});
</script>