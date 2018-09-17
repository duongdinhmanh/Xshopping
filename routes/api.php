<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('admin/products', function (Request $request) {
	$search = DB::table('products')->select(DB::raw('products.*,productsTranslation.name as name, productsTranslation.slug as slug,productsTranslation.locale as locale'))->join('productsTranslation', 'products.id', '=', 'productsTranslation.products_id')->where('productsTranslation.locale', 'en')->where('name', 'like', '%' . $request->value . '%')->get();
	return response()->json($search);;
});
