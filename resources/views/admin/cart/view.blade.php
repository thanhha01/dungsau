@extends('admin.master')

@section('title','detail cart')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết
                        <small>hóa đơn</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-bordered table-hover table-striped " >
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Hình Ảnh</th>
                            <th>Tên</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $stt = 0; ?>
                    	@foreach($ct_hoadon as $ct_hd)
                    	<?php $stt = $stt + 1; ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{$stt}}</td>
                            <td>
                            	<img width="50px" src="{{ asset('/upload/image/'.$ct_hd->product->image) }}">
                            </td>
                            <td>{{$ct_hd->product->name}}</td>
                            <td>{{$ct_hd->soluong}}</td>
                            <td>{{number_format($ct_hd->product->price)}} VNĐ</td>
                            <td>
                            	{{number_format($ct_hd->product->price*$ct_hd->soluong)}} VNĐ
                            </td>                  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
            	<div class="col-lg-6 row">
            		<table class="table table-bordered info">
            			<thead>
            				<tr>
            					<th colspan="2" class="text-center">Thông Tin Khách Hàng</th>
            				</tr>
            			</thead>
            			<tbody>
            				<tr>
            					<td>Họ tên</td>
            					<td>{{$hoadon->hoten}}</td>
            				</tr>
            				<tr>
            					<td>Số điện thoại</td>
            					<td>{{$hoadon->sdt}}</td>
            				</tr>
            				<tr>
            					<td>Địa chỉ</td>
            					<td>{{$hoadon->diachi}}</td>
            				</tr>
            				<tr>
            					<td>E-mail</td>
            					<td>{{$hoadon->email}}</td>
            				</tr>
            				<tr>
            					<td>Ghi chú</td>
            					<td>{{$hoadon->ghichu}}</td>
            				</tr>
            				<tr>
            					<td>Ngày</td>
            					<td>{{$hoadon->created_at}}</td>
            				</tr>
            				<tr>
            					<td>Tổng tiền</td>
            					<td class="total">{{number_format($hoadon->tongtien)}} VNĐ</td>
            				</tr>
            			</tbody>
            		</table>
            	</div>
            </div>
            @if(!$hoadon->status)
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary" data-id="{{$hoadon->id}}" onclick="confirmCart(this)">Accept</button>
                    </div>
                </div>
            @endif
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
<style type="text/css">
	table{
		font-size: 14px;
	}
	table.info tr td:first-child{
		font-weight: bold;
	}
	table .total{
		color: blue;
		font-weight: bold;
	}
</style>
<script type="text/javascript">
    function confirmCart(el){
        if(!confirm("Accept this cart?")){
            return;
        }
        var id = el.getAttribute("data-id");
        $.ajax({
            "url" : "/admin/cart/confirm/" + id,
            "type" : "POST",
            "dataType" : 'json',
            "data" : {},
            "success" : function(result){
                if(!result.status){
                    alert("Cart not found or change status error!");
                }else{
                    alert("Done!");
                    el.closest(".row").remove();
                }
            }
        })
    }
</script>