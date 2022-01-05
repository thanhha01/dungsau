<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Cates;
use App\Cates_lv1;
use App\Cates_lv2;
use App\Products;

class cates_lv1Controller extends Controller
{
    function getList(){
    	$cates_lv1 = Cates_lv1::orderBy('order','DESC')->get();
    	return view('admin.cates_lv1.list',['cates_lv1'=>$cates_lv1]);
    }

    function getEdit($id){
    	$cates_lv1 = Cates_lv1::find($id);
    	$cates = Cates::all();
    	return view('admin.cates_lv1.edit',['cates_lv1'=>$cates_lv1,'cates'=>$cates]);
    }

    function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'id_cate'=>'required',
                'txt_name'=>'required|max:150'
            ],
            [
                'id_cate.required'=>'Vui lòng chọn thể loại',
                'txt_name.required'=>'Vui lòng nhập tên thể loại cấp 1',
            ]);
    	$cates_lv1 = Cates_lv1::find($id);
    	$cates_lv1->name = $request->txt_name;
        $cates_lv1->order = $request->order;
    	$cates_lv1->alias = changeTitle($request->txt_name);
    	$cates_lv1->id_cate = $request->id_cate;
    	$cates_lv1->save();
    	return redirect('admin/cates_lv1/edit/'.$id)->with('msg','Sữa thể loại cấp 1 thành công');
    }

    function getAdd(){
    	$cates = Cates::all();
    	return view('admin.cates_lv1.add',['cates'=>$cates]);
    }

    function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'id_cate'=>'required',
    			'txt_name'=>'required|max:150|unique:cates_lv1,name'
    		],
    		[
    			'id_cate.required'=>'Vui lòng chọn thể loại',
    			'txt_name.required'=>'Vui lòng nhập tên thể loại cấp 1',
    			'txt_name.unique'=>'Tên thể loại cấp 1 đã tồn tại'
    		]);
    	$cates_lv1 = new Cates_lv1;
        $order_max = Cates_lv1::max('order');
        if ($request->order == NULL) {
            $cates_lv1->order = $order_max + 1;
        }else {
            $cates_lv1->order = $request->order;
        }
    	$cates_lv1->name = $request->txt_name;
    	$cates_lv1->alias = changeTitle($request->txt_name);
    	$cates_lv1->id_cate = $request->id_cate;
    	$cates_lv1->save();
    	return redirect('admin/cates_lv1/add')->with('msg','Thêm thể loại cấp 1 thành công');
    }

    function delete($id){
    	$count_cates_lv2 = Cates_lv2::where('id_cate_lv1',$id)->count();
        $count_products = Products::where('id_cate_lv1',$id)->count();
        if($count_cates_lv2 > 0 || $count_products > 0){
            if ($count_cates_lv2 > 0) {
                return redirect('admin/cates_lv1/list')->with('err','Phải xóa các thể loại con trước');
            }elseif ($count_products > 0) {
                return redirect('admin/cates/list')->with('err','Phải xóa các sản phẩm của thể loại này trước');
            }    
        }else{
            $cates_lv1 = Cates_lv1::find($id);
            $cates_lv1->delete();
            return redirect('admin/cates_lv1/list')->with('msg','Xóa thể loại thành công');
        }
    }

}
