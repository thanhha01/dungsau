@extends('admin.master')

@section('title','add product')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Thêm
                            <small>sản phẩm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.block.error')
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" value="{{old('txtName')}}" name="txtName" placeholder="Please Enter Username" />
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="number" min="0" value="{{old('txtPrice')}}" class="form-control" name="txtPrice" placeholder="Please Enter Price" />
                        </div>
                        <div class="form-group">
                            <label>Giảm %</label>
                            <input type="number" min="0" value="{{old('txtSale')}}" class="form-control" name="txtSale" placeholder="Please Enter Sale" />
                        </div>
                        <div class="form-group">
                            <label>Up hình sản phẩm</label>
                            <input type="file" accept="image/*" name="image">
                        </div>
                         <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea class="form-control" rows="5" name="description" placeholder="Product Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="1" type="radio"> có
                            </label>
                            <label class="radio-inline">
                                <input name="rdoStatus" checked value="0" type="radio"> không
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Chọn thể loại</label>
                                            <select id="cates" name="id_cate" class="form-control">
                                                <option value="">Chọn thể loại</option>
                                                @foreach($cates as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Thể loại cấp 1</label>
                                            <select id="id_cate_lv1" name="id_cate_lv1" class="form-control">
                                                <option value="">Chọn thể loại</option>
                                                @foreach($cates_lv1 as $category_lv1)
                                                <option value="{{$category_lv1->id}}">{{$category_lv1->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Thể loại cấp 2</label>
                                            <select id="id_cate_lv2" name="id_cate_lv2" class="form-control">
                                                <option value="">Chọn thể loại</option>
                                                @foreach($cates_lv2 as $category_lv2)
                                                <option value="{{$category_lv2->id}}">{{$category_lv2->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Reset</button>  
                    </div>
                    <div class="col-lg-4 col-lg-offset-1">
                        @for($i=1; $i<=5; $i++)
                            <div class="form-group">
                                <label>Up hình ảnh chi tiết {{$i}}</label>
                                <input type="file" accept="image/*" name="imagesDetail[]">
                            </div>
                        @endfor
                    </div>
                </div>
            <form>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection