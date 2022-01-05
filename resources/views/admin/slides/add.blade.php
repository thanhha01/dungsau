@extends('admin.master')

@section('title','add slide')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm
                        <small>slide</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.block.error')
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" value="{{old('txtName')}}" name="txtName" placeholder="Please Enter Name" />
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input value="{{old('txtLink')}}" class="form-control" name="txtLink" placeholder="Please Enter Link" />
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <input value="{{old('txtContent')}}" class="form-control" name="txtContent" placeholder="Please Enter Content" />
                        </div>
                        <div class="form-group">
                            <label>Up hình</label>
                            <input type="file" name="fImage" />
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
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