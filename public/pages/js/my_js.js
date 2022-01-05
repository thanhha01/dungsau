new WOW().init();
$(document).ready(function(){
	$(".sf-menu > li:has(ul) >a").append("<i class='fa fa-angle-down' aria-hidden='true'></i>");

	// STAR MENU RESPONSIVE
	$('.megamenu_mobile h2').click(function(event) {
		$(this).toggleClass('active');
		$('.megamenu_mobile .level_1').toggleClass('show_menu_resposive');
	});
	$(".megamenu_mobile ul.level_1 li:has(ul)").append("<i class='fa fa-plus-square' aria-hidden='true'></i>");
	$(".megamenu_mobile ul.level_1 >li >i").click(function(event) {
		if ( $(this).hasClass('active') ) {
            $(this).parent().find('ul.level_2').slideUp();
            $(this).removeClass('active');
		}else{
			$('.megamenu_mobile ul.level_2,.megamenu_mobile ul.level_3').slideUp();
			$(this).parent().find('ul.level_2').slideDown();
			$(".megamenu_mobile ul.level_1 li i").removeClass('active');
			$(this).addClass('active');
		}
	});
	$('.megamenu_mobile .level_2 li i').click(function(event) {
		if ( $(this).hasClass('active') ) {
            $(this).parent().find('ul.level_3').slideUp();
            $(this).removeClass('active');
		}else{
			$('.megamenu_mobile ul.level_3').slideUp();
			$(this).parent().find('ul.level_3').slideDown();
			$(".megamenu_mobile ul.level_2 li i").removeClass('active');
			$(this).addClass('active');
		}
	});
	// END MENU RESPONSIVE

	$(".product_links .btn_detail").hover(function() {
		$(this).find('i').addClass('fa-spin');
	}, function() {
		$(this).find('i').removeClass('fa-spin');
	});

	$(".btn_cart").hover(function() {
		$(this).find('i').addClass('pulse');
	}, function() {
		$(this).find('i').removeClass('pulse');
	});

	// addClass menu_fixed và thêm css ở class pseudoStickyBlock để tránh bị gật Menu khi scroll 
	var header_isStuck =  $(".header_isStuck").offset().top + 50;
	$(window).scroll(function(event) {
		if ( $(this).scrollTop() > header_isStuck ) {
			$(".header_isStuck").addClass('menu_fixed');
			$('.pseudoStickyBlock').attr('style', 'position: relative; display: block; height: 115px;');
		}else{
			$(".header_isStuck").removeClass('menu_fixed');
			$('.pseudoStickyBlock').attr('style', '');
		}

		if( $(this).scrollTop() > 300 ){
			$('.top_up').fadeIn('slow/400/fast');			
		}else{
			$('.top_up').fadeOut('slow/400/fast');
		}
	});

	$('.top_up').click(function(event) {
		$("body,html").animate({scrollTop:0}, 500);
	});

	$(".homepage_blog table tr:odd").css('background','white');

	// Không nhập từ khóa tìm kiếm thì vô hiệu hóa submit
	$('#search-submit').click(function(event) {
		var tukhoa = $(this).parent().find('#search-field').val();
		if (tukhoa == '' ) {
			event.preventDefault();
			return false;
		}
	});
	
	// Ẩn thông báo lổi khi input đã có giá trị 
	$('#user_phone').keyup(function(event) {
		$('#register em.err_user:eq(2)').hide();
		$('#register em.err_user:eq(2)').html('');
	});

	$('#txt_pass').keyup(function(event) {
		$('#register em.err_user:eq(3)').hide();
		$('#register em.err_user:eq(3)').html('')
	});

	$('#txt_mail').keyup(function(event) {
		$('#register em.err_user:eq(0)').hide();
		$('#register em.err_user:eq(0)').html('');
	});

	$('#email_login').keyup(function(event) {
		$('#sign-in em.err_user:eq(0)').hide();
		$('#sign-in em.err_user:eq(0)').html('')
	});

	$('#pass_login').keyup(function(event) {
		$('#sign-in em.err_user:eq(1)').hide();
		$('#sign-in em.err_user:eq(1)').html('')
	});

	$('#phone_pay').keyup(function(event) {
		$('#pay_cart em.err_user:eq(0)').html('');
		$('#pay_cart em.err_user:eq(0)').hide();
	});

	$('#email_pay').keyup(function(event) {
		$('#pay_cart em.err_user:eq(3)').html('');
		$('#pay_cart em.err_user:eq(3)').hide();
	});

	// Lấy mã product add cart bằng ajax
	$('.btn_cart').on('click', function(event) {
		var masp = $(this).attr('masp');
		$.ajax({
			url: 'addCart',
			data : {'masp':masp},
			type: 'get',
			success:function(data){
				$('.header_cart .count').html(data);
			}
		});
	});

	// Update giỏ hàng bằng ajax
	$('.table-cart').delegate('.updateCart','click',function(event) {
		var rowId = $(this).attr('rowId');
		var qty = $(this).parent().parent().find(".qty").val();
		$.ajax({
			url: 'updateCart',
			data: {'rowId':rowId,'qty':qty},
			type: 'get',
			success:function(data){
				$('.table-cart').html(data);
			} 
		});
	});

	// Form thanh toán giỏ hàng và xử lý ajax
	$('.doPayCart').click(function(event) {
		var phone_pay = $('#phone_pay').val();
		var name_pay = $('#name_pay').val();
		var address_pay = $('#address_pay').val();
		var email_pay = $('#email_pay').val();
		var note_pay = $('#note_pay').val();
		var _token = $('.token').val();
		var phoneFilter = /^([0-9])+$/;
		var emailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		if (phone_pay == '') {
			$('#pay_cart em.err_user:eq(0)').html('Vui lòng nhập số điện thoại');
			$('#pay_cart em.err_user:eq(0)').show();
			var flag = 'false';
		}else{
			if (phone_pay.length > 15) {
				$('#pay_cart em.err_user:eq(0)').html('Số điện thoại sao dài quá vậy ?');
				$('#pay_cart em.err_user:eq(0)').show();
				var flag = 'false';
			}
			if (phone_pay.length < 7) {
				$('#pay_cart em.err_user:eq(0)').html('Số điện thoại sao ngắn quá vậy ?');
				$('#pay_cart em.err_user:eq(0)').show();
				var flag = 'false';
			}
			if (!phoneFilter.test(phone_pay)) {
				$('#pay_cart em.err_user:eq(0)').html('Số điện thoại không đúng');
				$('#pay_cart em.err_user:eq(0)').show();
				var flag = 'false';
			}
		}
		if (email_pay) {
			if (!emailFilter.test(email_pay)) {
				$('#pay_cart em.err_user:eq(3)').html('E-mail không đúng định dạng');
				$('#pay_cart em.err_user:eq(3)').show();
				var flag = 'false';
			}
		}
		if (flag != 'false') {
			$('#pay_cart span.pay_cart').html('Đang xữ lý');
			$('.ajax-load').show();
			$.ajax({
				url: 'CompletedOrderCart',
				type: 'post',
				async: false,
				data: {
					'phone_pay':phone_pay,
					'name_pay':name_pay,
					'address_pay':address_pay,
					'email_pay':email_pay,
					'note_pay':note_pay,
					'_token':_token,
				},
				success:function(data){
					if (data == 'oke') {
						$('.modal').modal('hide');
						$('#pay_cart input').val('');
						$('#CompletedOrderCart').modal('show');
					}else{
						alert('Có lổi xảy ra');
					}
				}
			});
			$('.ajax-load').hide();
		}
	});

});

// Các function hiển thị modal khi onclick
function showLogin(){
    $('#sign-in').modal('show');
}
function showRigister(){
	$('#register').modal('show');
}
function showOtpVerify(){
	$('#verify_otp').modal('show');
}

function show_reg(){
    $('.modal').modal('hide');
    $('#register').modal('show');
}
function show_login(){
    $('.modal').modal('hide');
    $('#sign-in').modal('show');
}

function addCart(){
	$('.modal').modal('hide');
    $('#add_cart').modal('show');
}

function showPayCart(){
	$('#pay_cart').modal('show');
}

function linkcart(){
	location.href = "xem-gio-hang.html";
}

function linkhome(){
	location.href = "./";
}

// Đăng nhập
function doLogin(){
	var email_login = $("#email_login").val();
	var pass_login = $("#pass_login").val();
	var _token = $('.token_login').val(); 
	var remember = $('#remember').val();
	if (email_login == "") {
		$('#sign-in em.err_user:eq(0)').html('Vui lòng nhập E-mail');
		$('#sign-in em.err_user:eq(0)').show();
		var flag = 'false';
	}
	if (pass_login == "") {
		$('#sign-in em.err_user:eq(1)').html('Vui lòng nhập mật khẩu');
		$('#sign-in em.err_user:eq(1)').show();
		var flag = 'false';
	}
	if ( flag != 'false') {
		$('#sign-in span.sign-in').html('Đang xữ lý');
		$('.ajax-load').show();
		setTimeout(function(){
			$.ajax({
				url:'userLogin',
				type: 'post',
				async: false,
				data: {
					'email_login':email_login,
					'pass_login':pass_login,
					'_token':_token,
					'remember':remember
				},
				dataType: 'json',
				beforeSend : function(){
					
				},
				success:function(data){
					if (data.txt_login == 'admin') {
						window.location.nextUrl = "admin/products/list";
					}
					if (data.txt_login == "user") {
						window.location.nextUrl = window.location.href;
					}
					if (data.txt_login == "error") {
						alert('Thông tin đăng nhập không chính xác');
					}else if(data.verify){
						$('input').val('');
						$('.modal').modal('hide');
						showOtpVerify();
					}else{
						window.location.href = window.location.nextUrl;
					}
				}
			}).always(function() {
			    $('.ajax-load').hide();
		  	});
		}, 200);
		$('#sign-in span.sign-in').html('Đăng nhập');
	}
}

// Đăng kí
function doRigister(){
	var phone = $("#user_phone").val();
	var txt_pass = $('#txt_pass').val();
	var txt_mail = $('#txt_mail').val(); 
	var txt_name = $("#txt_name").val();
	var _token = $('.token').val(); 
	var emailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
	var passFilter = /^([a-zA-Z0-9_.-])+$/;
	var phoneFilter = /^([0-9])+$/;
	if(phone){
		if (phone.length > 15) {
			$('#register em.err_user:eq(2)').html('Số điện thoại dài quá rồi');
			$('#register em.err_user:eq(2)').show();
			var flag = 'false';
		}
		if (!phoneFilter.test(phone) || phone.length < 6) {
			$('#register em.err_user:eq(2)').html('Số điện thoại không đúng');
			$('#register em.err_user:eq(2)').show();
			var flag = 'false';
		}
	}
	if (txt_pass == '') {
		$('#register em.err_user:eq(3)').html('Vui lòng nhập mật khẩu');
		$('#register em.err_user:eq(3)').show();
		var flag = 'false';
	}else{
		if(txt_pass.length < 6){
			$('#register em.err_user:eq(3)').html('Mật khẩu phải có ít nhất 6 ký tự');
			$('#register em.err_user:eq(3)').show();
			var flag = 'false';
		}
		if(!passFilter.test(txt_pass)){
			$('#register em.err_user:eq(3)').html('Mật khẩu không đúng định dạng');
			$('#register em.err_user:eq(3)').show();
			var flag = 'false';
		}
	}
	if (txt_mail == "") {
		$('#register em.err_user:eq(0)').html('Vui lòng nhập E-mail');
		$('#register em.err_user:eq(0)').show();
		var flag = 'false';
	}else{
		if (!emailFilter.test(txt_mail)){
			$('#register em.err_user:eq(0)').html('Mail không đúng định dạng');
			$('#register em.err_user:eq(0)').show();
			var flag = 'false';
		}		
	}	
	if(flag != 'false'){
		$('#register span.register').html('Đang xữ lý');
		$('.ajax-load').show();
		setTimeout(function(){
			$.ajax({
				type: 'post',
				url: 'register',
				async: false,
				data: {
					'phone':phone,
					'txt_pass':txt_pass,
					'txt_mail':txt_mail,
					'txt_name':txt_name,
					'_token':_token
				},
				dataType: 'json',
				beforeSend : function(){
					
				},
				success:function(data){
					if (data.txt == "error") {
						alert('Số E-mail đã tồn tại trong hệ thống');
					}else if(data.txt == 'verify'){
						$("#verify_otp input").val('');
						$('.modal').modal('hide');
						showOtpVerify();
					}else{
						$("#register input").val('');
						$('.modal').modal('hide');
						$('#msg_content').modal('show');   				
					}
				}
			}).always(function() {
			    $('.ajax-load').hide();
		  	});
		}, 200);
		$('#register span.register').html('Đăng ký');
	}
}

function doVerifyOtp(){
	var otpCode = $("#otp_code").val().trim();
	var _token = $('.token').val(); 
	if(otpCode == "") return;
	$('.ajax-load').show();
	$.ajax({
		type: 'post',
		url: 'verify_otp',
		data_type : "json",
		data: {
			'otp':otpCode,
			'_token':_token
		},
		success:function(result){
			alert(result.message);
			if(!result.success){
				return;
			}
			var nextUrl = window.location.nextUrl || false;
			if(nextUrl === false){
				window.location.reload();
			}else{
				window.location.href = nextUrl;
			}
		}
	});
	$('.ajax-load').hide();
}