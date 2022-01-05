<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Cates;
use App\Cates_lv1;
use App\Cates_lv2;
use App\Products;

class cates_lv2Controller extends Controller
{
	public function __construct(){
		$cates = Cates::all();
    	$cates_lv1 = Cates_lv1::all();
    	view::share('cates',$cates);
    	view::share('cates_lv1',$cates_lv1);
	}

	function getList(){
		$cates_lv2 = Cates_lv2::orderBy('id','DESC')->get();
		return view('admin.cates_lv2.list',['cates_lv2'=>$cates_lv2]);
	}

	function getEdit($id){
		$cates_lv2 = Cates_lv2::find($id);
    	return view('admin.cates_lv2.edit',['cates_lv2'=>$cates_lv2]);
    }

    function postEdit(Request $request,$id){
    	$this->validate($request,
    		[
                'txt_name'=>'required|max:150',
    			'id_cate'=>'required',
    			'id_cate_lv1'=>'required',
    		],
    		[
    			'txt_name.required'=>'Vui lòng nhập tên thể loại cấp 2',
    			'id_cate.required'=>'Vui lòng chọn thể loại',
    			'id_cate_lv1.required'=>'Vui lòng chọn thể loại cấp 1',
    		]);
    	$cates_lv2 = Cates_lv2::find($id);
    	$cates_lv2->name = $request->txt_name;
    	$cates_lv2->alias = changeTitle($request->txt_name);
    	$cates_lv2->id_cate_lv1 = $request->id_cate_lv1;
    	$cates_lv2->save();
    	return redirect('admin/cates_lv2/edit/'.$id)->with('msg','Sữa thể loại cấp 2 thành công');
    }

    function getAdd(){
    	return view('admin.cates_lv2.add');
    }

    function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'txt_name'=>'required|max:150|unique:cates_lv2,name',
    			'id_cate'=>'required',
    			'id_cate_lv1'=>'required',
    		],
    		[
    			'txt_name.required'=>'Vui lòng nhập tên thể loại cấp 2',
    			'txt_name.unique'=>'Tên này đã tồn tại',
    			'id_cate.required'=>'Vui lòng chọn thể loại',
    			'id_cate_lv1.required'=>'Vui lòng chọn thể loại cấp 1',
    		]);
    	$cates_lv2 = new Cates_lv2;
    	$cates_lv2->name = $request->txt_name;
    	$cates_lv2->alias = changeTitle($request->txt_name);
    	$cates_lv2->id_cate_lv1 = $request->id_cate_lv1;
    	$cates_lv2->save();
    	return redirect('admin/cates_lv2/add')->with('msg','Thêm thể loại cấp 2 thành công');
    }

    function delete($id){
    	$products = Products::where('id_cate_lv2',$id)->count();
        if($products > 0){
            return redirect('admin/cates_lv2/list')->with('err','Phải xóa các sản phẩm trong thể loại này trước');
        }else{
            $cates_lv2 = Cates_lv2::find($id);
            $cates_lv2->delete();
            return redirect('admin/cates_lv2/list')->with('msg','Xóa thể loại thành công');
        }
    }
    
}
