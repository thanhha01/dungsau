@extends('admin.master')

@section('title','edit category level 2')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sữa
                        <small>thể loại lv2</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.block.error')
                    <form action="" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" value="{{$cates_lv2->name}}" name="txt_name" placeholder="Please Enter Category Name" />
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> Thể loại</label>
                                            <select id="cates" name="id_cate" class="form-control">
                                                @foreach($cates as $item)
                                                <option <?php 
                                                    if ($item->id == $cates_lv2->cates_lv1->id_cate) {
                                                        echo "selected";
                                                    } ?> value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Thể loại cấp 1</label>
                                            <select id="id_cate_lv1" name="id_cate_lv1" class="form-control">
                                                @foreach($cates_lv1 as $item_lv1)
                                                <option <?php 
                                                    if ($item_lv1->id == $cates_lv2->id_cate_lv1) {
                                                        echo "selected";
                                                    } ?>
                                                  value="{{$item_lv1->id}}">{{$item_lv1->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Sữa</button>
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