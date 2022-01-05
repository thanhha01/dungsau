@extends('admin.master')

@section('title','list product')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách
                        <small>sản phẩm</small>
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
                            <th>Hình</th>
                            <th>Giá</th>
                            <th>Nổi bật</th>
                            <th>Ngày</th>
                            <th>Thể loại</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 0; ?>
                        @foreach($products as $item)
                        <?php $stt = $stt + 1; ?>
                        <tr class="even gradeC" align="center">
                            <td>{{$stt}}</td>
                            <td>{{$item->name}}</td>
                            <td><img width="80px" src="{!! asset('/upload/image/'.$item->image) !!}">
                            </td>
                            <td><?php echo number_format($item->price) ?></td>
                            <td>
                                <?php 
                                    if ($item->noibat == 1) {
                                        echo "có";
                                    }else {
                                        echo "không";
                                    }
                                 ?>
                            </td>
                            <td>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() !!}
                            </td>
                            <td>
                                {{$item->cates->name}}<br>
                                @if($item->cates_lv1)
                                    {{$item->cates_lv1->name}}<br>
                                @endif
                                @if($item->cates_lv2)
                                    {{$item->cates_lv2->name}}
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn  xóa không ?')" href="{{ asset('admin/products/delete/'.$item->id) }}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ asset('admin/products/edit/'.$item->id) }}">Sửa</a></td>
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