@extends('admin.master')

@section('title','add category level 1')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm 
                        <small>thể loại cấp 1</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.block.error')
                    <form action="" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Chọn thể loại</label>
                            <select name="id_cate" class="form-control">
                                <option value="">Please Choose Category</option>
                                @foreach($cates as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" value="{{old('txt_name')}}" name="txt_name" placeholder="Please Enter Category Name" />
                        </div>
                        <div class="form-group">
                            <label>Vị trí</label>
                            <input type="number" class="form-control" value="{{old('order')}}" name="order" placeholder="Please Enter Order" />
                        </div>
                        <button type="submit" class="btn btn-default">Thêm </button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection