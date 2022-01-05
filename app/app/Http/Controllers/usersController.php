<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class usersController extends Controller
{
    function getList(){
    	$user = User::all();
    	return view('admin.users.list',['user'=>$user]);
    }

    function getAdd(){
    	return view('admin.users.add');
    }

    function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'txtUser'=>'required|max:150',
    			'phone'=>'required|unique:users,phone',
    			'txtPass'=>'required|max:150',
    			'txtRePass'=>'same:txtPass|required',
    			'txtEmail'=>'required|max:150|unique:users,email|email',
    			'rdoLevel'=>'required|max:150',
    		],
    		[
    			'txtUser.required'=>'Vui nhập tên user',
    			'phone.required'=>'Vui lòng nhập số điện thoại',
    			'phone.unique'=>'Số điện thoại này đã tồn tại',
    			'txtPass.required'=>'Vui lòng nhập mật khẩu',
    			'txtRePass.same'=>'Mật khẩu xác nhận không đúng',
    			'txtEmail.required'=>'Vui lòng nhập email',
    			'txtEmail.unique'=>'Email này đã tồn tại',
    			'txtEmail.email'=>'Email không đúng',
    			'rdoLevel.required'=>'Vui lòng chọn quyền cho user',
    		]);
    	$user = new User;
    	$user->email = $request->txtEmail;
    	$user->name = $request->txtUser;
    	$user->phone = $request->phone;
    	$user->password = bcrypt($request->txtPass);
    	$user->level = $request->rdoLevel;
    	$user->save();
    	return redirect('admin/users/add')->with('msg','Thêm user thành công');
    }

    function getEdit($id){
    	$user = User::find($id);
    	// 1. Không phải Super-Admin mà muốn sữa Super-Admin
    	// 2. Không phải Super-Admin mà muốn sữa Admin, khi Admin đó không phải là chính mình
    	if (Auth::user()->id != 1 && ($user->id == 1 || $user->level == 1 && $user->id != Auth::user()->id) ) {
    		return redirect('admin/users/list')->with('err','Không thể sữa user này');
    	}
    	return view('admin/users/edit',['user'=>$user,'id_user'=>$id]);
    }

    function postEdit(Request $request,$id){
    	$this->validate($request,
    		[
    			'txtUser'=>'required|max:150',
    		],
    		[
    			'txtUser.required'=>'Vui lòng nhập tên',
    		]);
    	$user = User::find($id);
    	$user->name = $request->txtUser;
    	if(Auth::user()->id != $id){
			$user->level = $request->rdoLevel;
		}
    	if ($request->checkbox == 'on') {
    		$this->validate($request,
    			[
    				'txtPass'=>'required|max:150'
    			],
    			[
    				'txtPass.required'=>'Vui lòng nhập mật khẩu'
    			]);
    		$user->password = $request->txtPass;
    	}
    	$user->save();
    	return redirect('admin/users/edit/'.$id)->with('msg','Sữa user thành công');
    }

    function delete($id){
    	$user = User::find($id);
    	if ($user->id == 1 || Auth::user()->id == $user->id || $user->level == 1 && Auth::user()->id != 1) {
    		return redirect('admin/users/list')->with('err','Không thể xóa user này');
    	}    	
    	$user->delete();
    	return redirect('admin/users/list')->with('msg','Xóa user thành công');
    }

    function getLoginAdmin(){
    	return view('admin.login');
    }

    function postLoginAdmin(Request $request){
    	$this->validate($request,
    		[
    			'email'=>'required',
    			'password'=>'required',
    		],
    		[
    			'email.required'=>'Vui lòng nhập E-mail',
    			'password.required'=>'Vui Lòng nhập mật khẩu',
    		]);
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->has('remember'))){
    		return redirect('admin/products/list');
    	}else {
    		return redirect('admin')->with('err','Thông tin đăng nhập không chính xác');
    	}
    }

    function glogouttAdmin(){
    	Auth::logout();
    	return redirect('./');
    }
}
