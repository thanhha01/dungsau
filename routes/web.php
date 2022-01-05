<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PageController@index');
Route::get('/ve-doanh-nghiep','PageController@getIntroduce');
Route::get('xem-gio-hang.html','PageController@getCart');
Route::get('gioi-thieu.html','PageController@getIntroduce');
Route::get('{id}-{alias}','PageController@category');
Route::get('danh-muc-{alias}/{id}-{alias_lv1}','PageController@category_lv1');
Route::get('{alias}/{alias_lv1}/{id}-{alias_lv2}','PageController@category_lv2');
Route::get('{alias}/{id}-{aliasProduct}','PageController@getDetail');
Route::get('logout','PageController@Logout');
Route::get('tim-kiem.html','PageController@getSearch');
Route::post('tim-kiem.html','PageController@postSearch');

Route::post('register','userAjaxController@register');
Route::post('verify_otp','userAjaxController@verifyOtp');
Route::post('userLogin','userAjaxController@userLogin');

Route::get('addCart','xulycartController@addCart');
Route::get('xoagiohang/{rowId}','xulycartController@deleteCart');
Route::get('xoatoanbogiohang','xulycartController@deleteAllCart');
Route::get('updateCart','xulycartController@updateCart');
Route::post('CompletedOrderCart','xulycartController@CompletedOrderCart');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	Route::get('','usersController@getLoginAdmin');
	Route::post('','usersController@postLoginAdmin');
	Route::get('/logout','usersController@glogouttAdmin');

	Route::group(['prefix'=>'cates'],function(){
		Route::get('list','cateController@getList');

		Route::get('add','cateController@getAdd');
		Route::post('add','cateController@postAdd');

		Route::get('edit/{id}','cateController@getEdit');
		Route::post('edit/{id}','cateController@postEdit');

		Route::get('delete/{id}','cateController@delete');
	});
	Route::group(['prefix'=>'cates_lv1'],function(){
		Route::get('list','cates_lv1Controller@getList');

		Route::get('add','cates_lv1Controller@getAdd');
		Route::post('add','cates_lv1Controller@postAdd');

		Route::get('edit/{id}','cates_lv1Controller@getEdit');
		Route::post('edit/{id}','cates_lv1Controller@postEdit');

		Route::get('delete/{id}','cates_lv1Controller@delete');
	});
	Route::group(['prefix'=>'cates_lv2'],function(){
		Route::get('list','cates_lv2Controller@getList');

		Route::get('add','cates_lv2Controller@getAdd');
		Route::post('add','cates_lv2Controller@postAdd');

		Route::get('edit/{id}','cates_lv2Controller@getEdit');
		Route::post('edit/{id}','cates_lv2Controller@postEdit');

		Route::get('delete/{id}','cates_lv2Controller@delete');
	});
	Route::group(['prefix'=>'products'],function(){
		Route::get('list','productsController@getList');

		Route::get('add','productsController@getAdd');
		Route::post('add','productsController@postAdd');

		Route::get('edit/{id}','productsController@getEdit');
		Route::post('edit/{id}','productsController@postEdit');

		Route::get('delete/{id}','productsController@delete');

		Route::get('ajaxCate_lv1','productsController@ajaxCate_lv1');
		Route::get('ajaxCate_lv2','productsController@ajaxCate_lv2');
		Route::get('ajax_delImage/{id}','productsController@ajax_delImage');
	});
	Route::group(['prefix'=>'users'],function(){
		Route::get('list','usersController@getList');

		Route::get('add','usersController@getAdd');
		Route::post('add','usersController@postAdd');

		Route::get('edit/{id}','usersController@getEdit');
		Route::post('edit/{id}','usersController@postEdit');

		Route::get('delete/{id}','usersController@delete');
		Route::get('ajaxProducts','usersController@ajaxProducts');
		Route::get('ajax_delImage/{id}','usersController@ajax_delImage');
	});
	Route::group(['prefix'=>'cart'],function(){
		Route::get('list','xulycartController@listCart');
		Route::get('view/{id}','xulycartController@viewDetailCart');
		Route::get('delete/{id}','xulycartController@delete_Cart');
		Route::post('confirm/{id}', 'xulycartController@confirmCart');
	});
	Route::group(['prefix'=>'slides'],function(){
		Route::get('list','slideController@listSlide');

		Route::get('add','slideController@getAdd');
		Route::post('add','slideController@postAdd');

		Route::get('edit/{id}','slideController@getEdit');
		Route::post('edit/{id}','slideController@postEdit');
		Route::get('delete/{id}','slideController@delete');
	});
});

// Route::any truyền địa chỉ ko tồn tại lên thanh địa chỉ thì chuyển hướng đến trang chủ
Route::any('{all?}','PageController@index')->where('all','.*');

// Route::get('test',function(){
// 	$theloai = App\Cates_lv2::find(1)->product->toArray();
// 	var_dump($theloai);
// });