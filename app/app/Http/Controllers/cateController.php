<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Cates;
use App\Cates_lv1;
use App\Products;
class cateController extends Controller
{
    function getList(){
    	$cates = Cates::orderBy('order','DESC')->get();
    	return view('admin.cates.list',['cates'=>$cates]);
    }

    function getEdit($id){
    	$cates = Cates::find($id);
    	return view('admin.cates.edit',['cates'=>$cates]);
    }

    function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'txt_name'=>'required|max:150'
            ],
            [
                'txt_name.required'=>'Vui lòng nhập tên thể loại',
                'txt_name.max'=>'Tên thể loại phải ngắn hơn 150 ký tự',
            ]);

    	$cates = Cates::find($id);
    	$cates->name = $request->txt_name;
        $cates->order = $request->order;
    	$cates->alias = changeTitle($request->txt_name);
    	$cates->save();
    	return redirect('admin/cates/edit/'.$id)->with('msg','Sữa thể loại thành công');
    }

    function getAdd(){
    	return view('admin.cates.add');
    }

    function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'txt_name'=>'required|unique:cates,name|max:150'
    		],
    		[
    			'txt_name.required'=>'Vui lòng nhập tên thể loại',
    			'txt_name.unique'=>'Tên thể loại đã tồn tại',
    			'txt_name.max'=>'Tên thể loại phải ngắn hơn 150 ký tự',
    		]);
    	$cates = new Cates;
        $order_max = Cates::max('order');
        if ($request->order == NULL) {
            $cates->order = $order_max + 1;
        }else {
            $cates->order = $request->order;
        }
    	$cates->name = $request->txt_name;
    	$cates->alias = changeTitle($cates->name);
    	$cates->save();
    	return redirect('admin/cates/add')->with('msg','Thêm thể loại thành công');
    }

    public function delete(Request $request, $id){
        $count_cates_lv1 = Cates_lv1::where('id_cate',$id)->count();
        $count_products = Products::where('id_cate',$id)->count();
        if($count_cates_lv1 > 0 || $count_products > 0){
            if ($count_cates_lv1 > 0 ) {
                return redirect('admin/cates/list')->with('err','Phải xóa các thể loại con trước');
            }elseif ($count_products > 0) {
                return redirect('admin/cates/list')->with('err','Phải xóa các sản phẩm của thể loại này trước');
            }
        }else{
            // foreach ($products as $pduct) {
            //     if (file_exists('public/upload/image/'.$pduct->image)) {
            //         unlink('public/upload/image/'.$pduct->image);
            //     }
            // }
            $cates = Cates::find($id);
            $cates->delete();
            return redirect('admin/cates/list')->with('msg','Xóa thể loại thành công');
        }
    }
}
