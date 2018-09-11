<?php

namespace App\Http\Controllers\admin;
use App\Category;
use App\Http\Controllers\Controller;
use App\products;
use App\productsTranslation;
use Illuminate\Http\Request;

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
		$list = products::select('id', 'images', 'name', 'cat_id', 'location', 'status');
		return Datatables::of($list)->addColumn('action', function ($list) {
			return '<a href="' . route("Products.edit", $list->id) . '" class="btn btn-xs btn-primary" title="order_detail" style="float:left">
                        <i class="glyphicon glyphicon-edit"></i>
                        detail
                    </a>
                    <a href="e' . $list->id . '" class="btn btn-xs btn-danger" style="float:right" title="delete order">
                        <i class="fa fa-trash" style="float:right; padding: 3px"></i>
                    </a>';
		})->addColumn('status', function ($list) {
			$order_status = $list->status;
			if ($order_status == 0) {
				return '<button class="btn btn-xs btn-warning">no checked</button>';
			} else {
				return '<button class="btn btn-xs btn-success">checked</button>';
			}
		})->rawColumns(['status', 'action'])->make(true);
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
		$data_cat_img = array();
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

		return redirect()->route('Products.index')->with('info_add', 'Add new products ');

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
}
