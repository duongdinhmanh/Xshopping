<?php

namespace App\Http\Controllers\admin;
use App;
use App\Category;
use App\Http\Controllers\Controller;
use App\images_pro;
use App\products;
use App\productsTranslation;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.products.home');
	}

	public function getdata() {
		$list = products::select('id', 'images', 'cat_id', 'location', 'status', 'created_at')->get();
		return Datatables::of($list)->addColumn('action', function ($list) {
			return '<a href="' . route("Products.edit", $list->id) . ' " class="btn btn-xs btn-primary" title="order_detail" >
                        <i class="glyphicon glyphicon-edit"></i>
                        detail
                    </a>
                    <a href=" " class="btn btn-xs btn-danger" title="delete order">
                        <i class="fa fa-trash" style="padding: 3px"></i>
                    </a>';
		})->addColumn('cat_id', function ($list) {
			$pro_cat_id = $list->cat_id;
			$cat_name = Category::where('id', $pro_cat_id)->get();
			foreach ($cat_name as $value) {
				return $value->name;
			}
		})->addColumn('location', function ($list) {
			$pro_location = $list->location;
			if ($pro_location == 1) {
				return '<div class="radio">
			                             <label>
			                               <input  type="radio" name="location" locations="' . route('products_location', $list->id) . '"  value="1" checked>  LATEST
			                             </label>
			                           </div>
			                           <div class="radio">
			                             <label>
			                               <input type="radio" name="location" locations="' . route('products_location', $list->id) . '"   value="2">  TOP RATING
			                             </label>
			                           </div>
			                           <div class="radio">
			                             <label>
			                               <input type="radio"  name="location" locations="' . route('products_location', $list->id) . '"  value="3"> FAVOURITE
			                             </label>
			                           </div>';
			} else if ($pro_location == 2) {
				return '<div class="radio" >
			                           <label>
			                             <input type="radio" name="location" locations="' . route('products_location', $list->id) . '"  value="1" >  LATEST
			                           </label>
			                         </div>
			                       <div class="radio">
			                           <label>
			                               <input  type="radio" name="location" locations="' . route('products_location', $list->id) . '"  checked value="2">  TOP RATING
			                           </label>
			                       </div>
			                       <div class="radio ">
			                           <label>
			                               <input  type="radio" name="location" locations="' . route('products_location', $list->id) . '"  value="3"> FAVOURITE
			                           </label>
			                       </div>';
			} else {
				return '<div class="radio">
			                           <label>
			                             <input type="radio" name="location" locations="' . route('products_location', $list->id) . '"  value="1" >  LATEST
			                           </label>
			                           </div>
			                           <div class="radio">
			                               <label>
			                                   <input type="radio" name="location" locations="' . route('products_location', $list->id) . '"   value="2">  TOP RATING
			                               </label>
			                           </div>
			                           <div class="radio">
			                               <label>
			                                   <input  type="radio" name="location" locations="' . route('products_location', $list->id) . '"  checked value="3"> FAVOURITE
			                               </label>
			                           </div>';
			}
		})->addColumn('status', function ($list) {
			$order_status = $list->status;
			if ($order_status == 0) {
				return '<button class="btn btn-xs btn-warning">no checked</button>';
			} else {
				return '<button class="btn btn-xs btn-success">checked</button>';
			}
		})->addColumn('created_at', function ($list) {
			$time = $list->created_at;
			if ($time) {
				return $time->format('d.m.Y H:i:t');
			}
		})->rawColumns(['cat_id', 'location', 'created_at', 'status', 'action'])->make(true);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$cat_pro = Category::all();
		return view('admin.products.add', compact('cat_pro'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$add_products = new products();
		$add_products->cat_id = $request->cat_id;
		$img_pro = $request->images;
		$data_pro_img = array();
		if ($img_pro) {
			$data_pro_img = explode('/', $img_pro);
			$file = $data_pro_img[6];
			$img = file_get_contents($img_pro);
			if (!empty($img)) {
				$hinh_pro = str_random(4) . "_" . basename($file);
				while (file_exists("assets/upload/products/" . $hinh_pro)) {
					$hinh_pro = str_random(4) . "_" . $file;
				}
				file_put_contents("assets/upload/products/$hinh_pro", $img);
				$add_products->images = $hinh_pro;
			} else {
				$add_products->images = '';
			}
		}
		$sizes = $request->size;
		$prices = $request->price;
		$array_options = array_combine($sizes, $prices);
		$add_products->options_price = json_encode($array_options);
		$add_products->sale = $request->sale;
		$add_products->location = $request->location;
		$array_post = $request->post;
		$add_products->post = json_encode($array_post);
		$add_products->status = $request->status;
		$add_products->save();

		$product_id = $add_products->id;
		$img_pro_detail = $request->images_detail;
		$data_pro_img_detail = array();
		if ($img_pro_detail) {
			foreach ($img_pro_detail as $value) {
				$add_img_pro = new images_pro();
				$add_img_pro->product_id = $product_id;
				$data_pro_img_detail = explode('/', $value);
				$file_img_detai = $data_pro_img_detail[6];
				$img_detail = file_get_contents($value);
				if (!empty($img_detail)) {
					$hinh_pro_detail = str_random(4) . "_" . basename($file_img_detai);
					while (file_exists("assets/upload/products/" . $hinh_pro_detail)) {
						$hinh_pro_detail = str_random(4) . "_" . $file_img_detai;
					}
					file_put_contents("assets/upload/products/$hinh_pro_detail", $img_detail);
					$add_img_pro->image = $hinh_pro_detail;
				} else {
					$add_img_pro->image = '';
				}
				$add_img_pro->save();
			}
		}

		$add_pro_en = new productsTranslation();
		$add_pro_en->products_id = $add_products->id;
		$add_pro_en->name = $request->name;
		$add_pro_en->slug = $request->slug;
		$add_pro_en->info = $request->info;
		$add_pro_en->description = $request->description;
		$add_pro_en->info_sale_product = $request->info_sale_product;
		$add_pro_en->locale = 'en';
		$add_pro_en->status = $request->status;
		$add_pro_en->save();

		return redirect()->route('Products.index')->with('info_add', 'Add new products .. ! ');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function change_location(Request $request, $id) {
		$change_location = products::find($id);
		$change_location->location = $request->location;
		$change_location->save();
		return response()->json(['flag' => 'success', 'message' => 'Update Sussesfully.....']);
	}

}
