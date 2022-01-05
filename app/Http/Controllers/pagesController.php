<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Products;
use App\Cates;
use App\Cates_lv1;
use App\Cates_lv2;
use App\Product_images;
use App\Slides;
use Cart;

class pagesController extends Controller
{
    // public function __construct(){
    //     $cates = Cates::all();
    //     view::share('cates',$cates);
    // }
    function index(){
        $products_noibat = Products::where('noibat',1)->take(10)->orderBy('id','DESC')->get();
        $products_moi= Products::where('id_cate',6)->orderBy('id','DESC')->take(30)->get();
        $slides = Slides::orderBy('id','DESC')->get();
    	return view('pages.index',
            [
                'products_noibat'=>$products_noibat,
                'products_moi'=>$products_moi,
                'slides'=>$slides,
            ]
        );
    }

    function category($id){
        $product_cate = Products::where('id_cate',$id)->orderBy('id','DESC')->paginate(30);
        $cate_name = Cates::find($id);
    	return view('pages.category',
            [
                'product_cate'=>$product_cate,
                'cate_name'=>$cate_name
            ]
        );
    }

    function category_lv1($alias,$id){
        $product_cate = Products::where('id_cate_lv1',$id)->orderBy('id','DESC')->paginate(30);
        $cate_name = Cates_lv1::find($id);
        return view('pages.category_lv1',
            [
                'product_cate'=>$product_cate,
                'cate_name'=>$cate_name
            ]
        );
    }

    function category_lv2($alias,$alias_lv1,$id){
        $product_cate = Products::where('id_cate_lv2',$id)->orderBy('id','DESC')->paginate(30);
        $cate_name = Cates_lv2::find($id);
        return view('pages.category_lv2',
            [
                'product_cate'=>$product_cate,
                'cate_name'=>$cate_name
            ]
        );
    }

    function getSearch(){
        $tukhoa = session('tukhoa');
        $dataSearch = Products::where('name',"like","%$tukhoa%")->orwhere('price',"like","%$tukhoa%")->orderBy('id','DESC')->paginate(30);
        return view('pages/search',
            [
                'dataSearch'=>$dataSearch,
                'tukhoa'=>$tukhoa,
            ]
        );
    }

    function postSearch(Request $request){
        $tukhoa = $request->txt_search;
        session()->put('tukhoa',$tukhoa);
        $dataSearch = Products::where('name',"like","%$tukhoa%")->orwhere('price',"like","%$tukhoa%")->orderBy('id','DESC')->paginate(30);
        return view('pages/search',
            [
                'dataSearch'=>$dataSearch,
                'tukhoa'=>$tukhoa,
            ]
        );
    }

    function getCart(){
        $products_noibat = Products::where('noibat',1)->inRandomOrder()->take(3)->get();
        $content = Cart::content(); 
        $total = Cart::subtotal();
    	return view('pages.cart',
            [
                'products_noibat'=>$products_noibat,
                'content' => $content,
                'total' => $total,
            ]
        );
    }

    function getDetail($alias,$id){
        $product = Products::find($id);
        $products_noibat = Products::where([['noibat','=',1],['id','<>',$id]])
            ->orderBy('id','DESC')->take(10)->get();
        $product_cate = Products::where([['id_cate','=',$product->cates->id],['id','<>',$id]])
            ->inRandomOrder()->take(10)->get();
        $product_img = Product_images::where('id_product',$id)->get();
    	return view('pages.detail',
            [
                'product'=>$product,
                'product_img'=>$product_img,
                'product_cate'=>$product_cate,
                'products_noibat'=>$products_noibat
            ]
        );
    }

    function Logout(){
        Auth::logout();
        return redirect('./');
    }
}
