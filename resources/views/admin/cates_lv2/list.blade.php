@extends('admin.master')

@section('title','list category level 2')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách
                        <small> thể loại cấp 2</small>
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
                            <th>Thể loại cấp 1</th>
                            <th>Thể loại</th>
                            <th>Xóa</th>
                            <th>Sữa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 0; ?>
                        @foreach($cates_lv2 as $item)
                        <?php $stt = $stt + 1; ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{$stt}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->cates_lv1->name}}</td>
                            <td>{{$item->cates_lv1->cates->name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onClick="return confirm('bạn có chắc chắn muốn xóa không ?')" href="{{ asset('admin/cates_lv2/delete/'.$item->id) }}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ asset('admin/cates_lv2/edit/'.$item->id) }}">Sữa</a></td>
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