@extends('admin.master')

@section('title','list slides')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách
                        <small>slide</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div style="clear: both;"></div>
                @include('admin.block.error')
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Hình</th>
                            <th>Tên</th>
                            <th>Link</th>
                            <th>Nội dung</th>
                            <th>Xóa</th>
                            <th>Sữa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 0; ?>
                        @foreach($slides as $item)
                        <?php $stt = $stt + 1; ?>
                        <tr class="odd gradeX" align="center">
                            <td>{{$stt}}</td>
                            <td>
                            	<img width="180px" src="{{ asset('/upload/slides/'.$item->image) }}">
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->link}}</td>
                            <td>{{$item->content}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="{{ asset('admin/slides/delete/'.$item->id) }}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ asset('admin/slides/edit/'.$item->id) }}">Sửa</a></td>
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