<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slides;

class slideController extends Controller
{
    function getAdd(){
    	return view('admin.slides.add');
    }

    function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'fImage'=>'required|image',
    		],
    		[
    			'fImage.required'=>'Vui lòng tải lên hình ảnh',
    			'fImage.image'=>'Chỉ cho phép up hình ảnh có đuôi (jpeg, png, bmp, gif, or svg)'
    		]);
    	$slides = new Slides;
    	$slides->name = $request->txtName;
    	$slides->link = $request->txtLink;
    	$slides->content = $request->txtContent;
    	if($request->hasFile('fImage')){
			$file = $request->file('fImage');
			$name = $file->getClientOriginalName();
			$name_random = str_random(4)."_".$name;
			while (file_exists("public/upload/slides/".$name_random)) {
                $name_random = str_random(4)."_".$name;
            }
            $file->move("public/upload/slides",$name_random);
            $slides->image = $name_random;
		}
    	$slides->save();
    	return redirect('admin/slides/add')->with('msg','Thêm slide thành công');
    }

    function listSlide(){
    	$slides = Slides::orderBy('id','DESC')->get();
    	return view('admin.slides.list',['slides'=>$slides]);
    }

    function getEdit($id){
    	$slide = Slides::find($id);
    	return view('admin/slides/edit',['slide'=>$slide]);
    }

    function postEdit(Request $request,$id){
    	$slides = Slides::find($id);
    	$slides->name = $request->txtName;
    	$slides->link = $request->txtLink;
    	$slides->content = $request->txtContent;
    	if($request->hasFile('fImage')){
			$file = $request->file('fImage');
			$name = $file->getClientOriginalName();
			$name_random = str_random(4)."_".$name;
			while (file_exists("public/upload/slides/".$name_random)) {
                $name_random = str_random(4)."_".$name;
            }
            if (file_exists("public/upload/slides/".$slides->image)) {
				unlink("public/upload/slides/".$slides->image);
			}
            $file->move("public/upload/slides",$name_random);
            $slides->image = $name_random;
		}
    	$slides->save();
    	return redirect('admin/slides/edit/'.$id)->with('msg','Sữa slide thành công');
    }

    function delete($id){
    	$slide = Slides::find($id); 
    	if (file_exists("public/upload/slides/".$slide->image)) {
			unlink("public/upload/slides/".$slide->image);
		}
		$slide->delete();
		return redirect('admin/slides/list')->with('msg','Xóa slides thành công');
    }
}
