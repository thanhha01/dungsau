@extends('admin.master')

@section('title','edit category level 1')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sữa
                        <small>thể loại</small>
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
                                @foreach($cates as $item_cate)
                                <option 
                                    <?php if($item_cate->id == $cates_lv1->cates->id) {
                                        echo "selected";
                                    } ?>
                                  value="{{$item_cate->id}}">{{$item_cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" value="{{$cates_lv1->name}}" name="txt_name" placeholder="Please Enter Category Name" />
                        </div>
                        <div class="form-group">
                            <label>Vị trí</label>
                            <input type="number" class="form-control" value="{{$cates_lv1->order}}" name="order" placeholder="Please Enter Order" />
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