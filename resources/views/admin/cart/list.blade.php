@extends('admin.master')

@section('title','list cart')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách
                        <small>hóa đơn</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div style="clear: both;"></div>
                @include('admin.block.error')
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Phone</th>
                            <th>Tổng tiền</th>
                            <th>Ngày</th>
                            <th>Xem</th>
                            <th>Xóa</th>
                            <th>Trạng thái</th>     
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 0; ?>
                        @foreach($hoadon as $item)
                        <?php $stt = $stt + 1; ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{$stt}}</td>
                            <td>{{$item->hoten}}</td>
                            <td>{{$item->sdt}}</td>
                            <td>{{number_format($item->tongtien)}} VNĐ</td>
                            <td>
                            	{!! \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() !!}
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ asset('admin/cart/view/'.$item->id) }}">Xem</a></td>
                            <td class="center">
                                <i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="{{ asset('admin/cart/delete/'.$item->id) }}"> Xóa</a>
                            </td>    
                            <td>
                                @php $status = $item->status ? "success" : "danger" @endphp
                                @php $textStatus = $item->status ? "Đã Xác Nhận" : "Đang Chờ" @endphp
                                <span class="text-{{ $status }}">{{ $textStatus }}</span>
                            </td>              
                        </tr>

                        
                       @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection