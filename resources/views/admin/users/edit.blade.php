@extends('admin.master')

@section('title','add user')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sữa
                        <small>user</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.block.error')
                    <form action="" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="txtUser" value="{{$user->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" disabled="" value="{{$user->email}}" name="txtEmail" placeholder="Please Enter Email" />
                        </div>
                        <div class="form-group">
                            <input id="editPass" type="checkbox" name="checkbox">
                            <label for="editPass" >Sữa mật khẩu</label>
                            <input disabled="" type="password" class="pass form-control" name="txtPass" placeholder="Please Enter Password" />
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu</label>
                            <input disabled="" type="password" class="pass form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                        </div>
                        @if($id_user != Auth::user()->id)
                        <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input <?php if($user->level == 1) echo "checked"; ?>
                                name="rdoLevel" value="1" type="radio"> Admin
                            </label>
                            <label class="radio-inline">
                                <input <?php if ($user->level == 0) echo "checked"; ?> 
                                name="rdoLevel" value="0" type="radio"> Member
                            </label>
                        </div>
                        @endif
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