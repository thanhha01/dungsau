<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Products;
use App\Cates;
use App\Cates_lv1;
use App\Cates_lv2;
use App\Product_images;

class productsController extends Controller
{
	public function __construct(){
		$cates = Cates::all();
    	$cates_lv1 = Cates_lv1::all();
    	$cates_lv2 = Cates_lv2::all();
    	view::share('cates',$cates);
    	view::share('cates_lv1',$cates_lv1);
    	view::share('cates_lv2',$cates_lv2);
	}

	function getList(){
		$products = Products::orderBy('id','DESC')->get();
		return view('admin.products.list',['products'=>$products]);
	}

    function getAdd(){
    	return  view('admin/products/add');
    }

    function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'txtName'=>'required|max:150',
    			'txtPrice'=>'required',
    			'image'=>'required',
    			'rdoStatus'=>'required',
    			'id_cate'=>'required',   			
    		],
    		[
    			'txtName.required'=>'Vui lòng nhập tên sản phẩm',
    			'txtPrice.required'=>'Vui lòng nhập giá sản phẩm',
    			'image.required'=>'Vui lòng tải lên hình sản phẩm',
    			'rdoStatus.required'=>'Vui lòng chọn phần nổi bật',
    			'id_cate.required'=>'Vui lòng chọn thể loại',
    		]);
    	$products = new Products;
    	$products->name = $request->txtName;
    	$products->alias = changeTitle($request->txtName);
    	$products->price = $request->txtPrice;
    	if(empty($request->txtSale)){
            $products->sale = null;
        }else{
            $products->sale = $request->txtSale;
        }
    	$products->noibat = $request->rdoStatus;
    	$products->id_cate = $request->id_cate;
    	$products->id_cate_lv1 = $request->id_cate_lv1;
    	if(empty($request->id_cate_lv1)){
            $products->id_cate_lv1 = null;
        }else{
            $products->id_cate_lv1 = $request->id_cate_lv1;
        }
    	if(empty($request->id_cate_lv2)){
            $products->id_cate_lv2 = null;
        }else{
            $products->id_cate_lv2 = $request->id_cate_lv2;
        }
    	if($request->hasFile('image')){
			$file = $request->file('image');
			$name = $file->getClientOriginalName();
            /*
            * $name = time().'.'.$file->getClientOriginalExtension(); 
            * tự động random tên file / lấy đuôi file  
            */
			$name_random = str_random(4)."_".$name;
			while (file_exists("public/upload/image/".$name_random)) {
                $name_random = str_random(4)."_".$name;
            }
            $file->move("public/upload/image",$name_random);
            $products->image = $name_random;
		}
		$products->save();
		$product_id = $products->id;

		if($request->hasFile('imagesDetail')){
			foreach ($request->file('imagesDetail') as $file) {
			 	$product_img = new Product_images;
				if(isset($file)){
					$name_img = $file->getClientOriginalName();
					$name_img_rd = str_random(4)."_".$name_img;
					while(file_exists("public/upload/detail/".$name_img_rd)){
						$name_img_rd = str_random(4)."_".$name_img;
					}
					$product_img->image = $name_img_rd;
					$product_img->id_product = $product_id;
					$file->move('public/upload/detail',$name_img_rd);
					$product_img->save();
				}
			} 
		}
		return redirect('admin/products/add')->with('msg','Thêm sản phẩm thành công');
    }

    function postEdit(Request $request,$id){
    	$this->validate($request,
    		[
    			'txtName'=>'required|max:150',
    			'txtPrice'=>'required',
    			'rdoStatus'=>'required',
    			'id_cate'=>'required',   			
    		],
    		[
    			'txtName.required'=>'Vui lòng nhập tên sản phẩm',
    			'txtPrice.required'=>'Vui lòng nhập giá sản phẩm',
    			'rdoStatus.required'=>'Vui lòng chọn phần nổi bật',
    			'id_cate.required'=>'Vui lòng chọn thể loại',
    		]);
    	$products = Products::find($id);
    	$products->name = $request->txtName;
    	$products->alias = changeTitle($request->txtName);
    	$products->price = $request->txtPrice;
    	if(empty($request->txtSale)){
            $products->sale = null;
        }else{
            $products->sale = $request->txtSale;
        }
    	$products->noibat = $request->rdoStatus;
    	$products->id_cate = $request->id_cate;
    	if(empty($request->id_cate_lv1)){
            $products->id_cate_lv1 = null;
        }else{
            $products->id_cate_lv1 = $request->id_cate_lv1;
        }
    	if(empty($request->id_cate_lv2)){
            $products->id_cate_lv2 = null;
        }else{
            $products->id_cate_lv2 = $request->id_cate_lv2;
        }
    	if($request->hasFile('image')){
			$file = $request->file('image');
			$name = $file->getClientOriginalName();
			$name_random = str_random(4)."_".$name;
			while (file_exists("public/upload/image/".$name_random)) {
                $name_random = str_random(4)."_".$name;
            }
   //          if (file_exists("public/upload/image/".$products->image)) {
			// 	unlink("public/upload/image/".$products->image);
			// }
            $file->move("public/upload/image",$name_random);
            $products->image = $name_random;
		}
		$products->save();
		$product_id = $products->id;

		if($request->hasFile('imagesDetail')){
			foreach ($request->file('imagesDetail') as $file) {
			 	$product_img = new Product_images;
				if(isset($file)){
					$name_img = $file->getClientOriginalName();
					$name_img_rd = str_random(4)."_".$name_img;
					while(file_exists("public/upload/detail/".$name_img_rd)){
						$name_img_rd = str_random(4)."_".$name_img;
					}
					$product_img->image = $name_img_rd;
					$product_img->id_product = $product_id;
					$file->move('public/upload/detail',$name_img_rd);
					$product_img->save();
				}
			} 
		}
		return redirect('admin/products/edit/'.$id)->with('msg','Sữa sản phẩm thành công');
    }

    function getEdit($id){
    	$products = Products::find($id);
    	$product_images = Product_images::where('id_product',$id)->get();
    	return view('admin/products/edit',['products'=>$products,'product_images'=>$product_images]);
    }

    function delete($id){
    	$products = Products::find($id);
    	// if (file_exists('public/upload/image/'.$products->image)) {
    	// 	unlink('public/upload/image/'.$products->image);
    	// }
    	$product_images = Product_images::where('id_product',$id)->get();
    	// foreach ($product_images as $product_img) {
    	// 	if (file_exists('public/upload/detail/'.$product_img->image)) {
    	// 		unlink('public/upload/detail/'.$product_img->image);
    	// 	}
    	// }
    	$products->delete();
    	return redirect('admin/products/list')->with('msg','Xóa sản phẩm thành công');
    }

    function ajaxCate_lv1(Request $request){
        if($request->ajax()){
            $id_cate = $request->get('id_cate');
            $cates_lv1 = Cates_lv1::where('id_cate',$id_cate)->get();
            foreach ($cates_lv1 as $item) {
                echo "<option value='$item->id'>$item->name</option>";
            }
        }
    }

    function ajaxCate_lv2(Request $request){
    	if ($request->ajax()) {
    		$id_cate_lv1 = $request->get('id_cate_lv1');
    		$cates_lv2 = Cates_lv2::where('id_cate_lv1',$id_cate_lv1)->get();
    		foreach ($cates_lv2 as $item) {
    			echo "<option value='$item->id'>$item->name</option>";
    		}
    	}
    }

    function ajax_delImage(Request $request,$id){
    	if ($request->ajax()) {
    		$idImg = $request->get('idImg');
    		$product_images = Product_images::find($id);
    		// if ( file_exists('public/upload/detail/'.$product_images->image) ) {
    		// 	unlink('public/upload/detail/'.$product_images->image);
    		// }
    		$product_images->delete();
    		return "success";
    	}
    }
}
