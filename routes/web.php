<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
	return view('welcome');
});

Route::group(['middleware' => 'locale'], function () {
// Route::get('/',[
	//  'as'=>'home',
	//  'uses'=>'HomeController@getIndex'
	// ]);

// Route::get('About',[
	//  'as'   => 'about',
	//  'uses' => 'HomeController@about'
	// ]);

// Route::get('Contact',[
	//  'as'   => 'getcontact',
	//  'uses' => 'MailController@contact'
	// ]);
	// Route::post('Contact',[
	//  'as'   => 'postcontact',
	//  'uses' => 'MailController@postcontact'
	// ]);

// Route::get('product_Type/{type}',[
	//  'as'=>'product_Type',
	//  'uses'=>'HomeController@getpro_cat'
	// ]);

// Route::get('product_detail/{id}',[
	//  'as'=>'Product_detail',
	//  'uses'=>'HomeController@product_detail'
	// ]);

// Route::get('Cart/{id}/{quantity?}',[
	//  'as'=>'Cart',
	//  'uses'=>'CartController@getCart'
	// ]);
	// // Route::get('Cart-detail/{id}',[
	// //   'as'=>'Cart_update',
	// //   'uses'=>'CartController@UpdateCart'
	// // ]);

// Route::get('Open-Cart',[
	//  'as'=>'OpenCart',
	//  'uses'=>'CartController@OpenCart'
	// ]);

// Route::get('del_cart/{id}',[
	//  'as'=>'del-cart',
	//  'uses'=>'CartController@delCart'
	// ]);

// Route::get('signin',[
	//  'as'=>'signin',
	//  'uses'=>'HomeController@signin'
	// ]);
	// Route::post('post_signin',[
	//  'as'=>'postsignin',
	//  'uses'=>'HomeController@postSignin'
	// ]);
	// Route::post('logIn',[
	//  'as'=>'logIn',
	//  'uses'=>'HomeController@logIn'
	// ]);
	// Route::get('log-Out',[
	//  'as'=>'log-Out',
	//  'uses'=>'HomeController@logOut'
	// ]);
	// Route::post('Order',[
	//  'as'=>'Order',
	//  'uses'=>'HomeController@Order'
	// ]);
	// Route::get('bayment',[
	//  'as' => 'ATM',
	//  'uses' =>'HomeController@ATM'
	// ]);
	// Route::get('Search',[
	//  'as'=>'Search',
	//  'uses'=>'HomeController@Search'
	// ]);

// Route::get('history-Order',[
	//  'as'=>'historyOrder',
	//  'uses'=>'HomeController@historyOrder'
	// ]);
	// Route::get('order-detail/{id}',[
	//  'as'=>'OrderDetail',
	//  'uses'=>'HomeController@or_detail'
	// ]);
	// Route::get('login-facebook',[
	//  'as' => 'facebook',
	//  'uses' => 'HomeController@facebook'
	// ]);

// ************** Phần admin *******************
	Route::get('admin/Login', [
		'as' => 'Login',
		'uses' => 'admin\LoginController@ViewLogin',
	]);
	Route::post('admin/Login', [
		'as' => 'LoginAdmin',
		'uses' => 'admin\LoginController@PostLogin',
	]);

	Route::get('admin/LogOut', 'admin\LoginController@AdminlogOut');

	Route::group(['prefix' => 'admin', 'middleware' => ['adminLogin', 'locale']], function () {
		Route::resource('Dashboard', 'admin\DashboardController');
		Route::get('change-language/{lang}', [
			'as' => 'change_lang',
			'uses' => 'admin\DashboardController@change_lang',
		]);

		Route::resource('Products', 'admin\ProductController');
		Route::get('Products-data', 'admin\ProductController@getdata')->name('getdata_pro');
		Route::post('Products-location/{id?}', 'admin\ProductController@change_location')->name('products_location');

		Route::resource('Category', 'admin\CategoryController');
		Route::post('category-Post', 'admin\CategoryController@add_category_lang')->name('add_category_lang');

		Route::post('category-del/{id?}', 'admin\CategoryController@del_cat')->name('del_category');
		Route::post('sub-category-del/{id?}', 'admin\CategoryController@del_sub_cat')->name('del_sub_category');
		Route::post('sub-category-show/{id?}', 'admin\CategoryController@show_sub_cat')->name('show_sub_category');
		Route::post('category-edit/{id}', 'admin\CategoryController@cat_edit_vi')->name('cat_edit_lang');

	});

});
