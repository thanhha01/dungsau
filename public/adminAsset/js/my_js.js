$(document).ready(function(){
	$('.alert').delay(5000).slideUp();

	// Ràng buộc ajax để lấy ra các chuyên mục con của thể loại đó
	$("#cates").change(function(event) {
		var id_cate =  $(this).val();
		var url = 'admin/products/ajaxCate_lv1';
		$.ajax({
			url: url,
			type: 'GET',
			data: {'id_cate': id_cate},
			success:function(data){
                $("#id_cate_lv1").html(data);
			}
		});		
	});

	// Ràng buộc ajax để lấy ra các chuyên mục con của thể loại đó
	$("#id_cate_lv1").change(function(event) { 
		var id_cate_lv1 = $(this).val();
		var url = 'admin/products/ajaxCate_lv2';
		$.ajax({
			url: url,
			type: 'GET',
			data: {'id_cate_lv1': id_cate_lv1},
			success:function(data){
                $("#id_cate_lv2").html(data);
			}
		});	
	});

	$(".insert_file").click(function(event) {
		$("#insert_file").append("<p><input type='file' accept='image/*' name='imagesDetail[]'></p>");
	});

	// Xử lý ajax khi click xóa hình chi tiết
	$(".del_img").click(function(event) {
		var flag = confirm('Bạn có chắc chắn muốn xóa không ?');
		if (flag == false) {
			return;
		}else{
			var idImg = $(this).parent().find('img').attr('idImg');
			var boxImg = $(this).parent().attr('id');
			$.ajax({
				url: 'admin/products/ajax_delImage/'+idImg,
				type: 'GET',
				data: {'idImg':idImg},
				success:function(data){
					if (data == 'success') {
						$("#"+boxImg).remove();
					}else{
						alert('Xẩy ra lổi');
					}
				}
			})
		}
	});

	// Xử lý thêm xóa disabled ở input password
	$('#editPass').click(function(event) {
		if ($(this).is(':checked')) {
			$('.pass').removeAttr('disabled');
		}else{
			$('.pass').attr('disabled', '');
		}
	});
});