<?php

namespace App\Http\Controllers\admin;
use App;
use App\Http\Controllers\Controller;
use App\Model\Images_Pro;
use App\Model\Products;
use App\Model\ProductsTranslation;
use App\Repositories\InterfaceRepository\CategoryInterfaceRepository;
use App\Repositories\InterfaceRepository\ProductsInterfaceRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	protected $productsRepository;
	protected $categoryRepository;

	public function __construct(ProductsInterfaceRepository $productsRepository, CategoryInterfaceRepository $categoryRepository) {
		$this->productsRepository = $productsRepository;
		$this->categoryRepository = $categoryRepository;
	}

	public function index() {
		return view('admin.products.home');
	}

	public function getdata() {
		$list = Products::select('id', 'images', 'location', 'status', 'created_at')->get();
		return Datatables::of($list)->addColumn('action', function ($list) {
			return true;
		})->addColumn('location', function ($list) {
			$pro_location = $list->location;
			if ($pro_location == 1) {
				return '<div class="radio"> <label><input locations="' . route("products_location", $list->id) . '" checked type="radio"  value="1" id="optionsRadios1" > ' . __('config.LATEST') . '</label></div><div class="radio"> <label><input locations="' . route("products_location", $list->id) . '"  type="radio"  value="2" id="optionsRadios1" >' . __('config.TOP_RATING') . '</label></div><div class="radio"> <label><input locations="' . route("products_location", $list->id) . '"  type="radio"  value="3" id="optionsRadios1" >' . __('config.FAVOURITE') . '</label></div>';
			} else if ($pro_location == 2) {
				return '<div class="radio"> <label><input locations="' . route('products_location', $list->id) . '"  type="radio"  value="1" id="optionsRadios1" > ' . __('config.LATEST') . '</label></div><div class="radio"> <label><input locations="' . route('products_location', $list->id) . '"  checked type="radio"  value="2" id="optionsRadios1" >' . __('config.TOP_RATING') . '</label></div><div class="radio"> <label><input locations="' . route('products_location', $list->id) . '"  type="radio"  value="3" id="optionsRadios1" >' . __('config.FAVOURITE') . '</label></div>';
			} else {
				return '<div class="radio"> <label><input locations="' . route('products_location', $list->id) . '"  type="radio"  value="1" id="optionsRadios1" > ' . __('config.LATEST') . '</label></div><div class="radio"> <label><input locations="' . route('products_location', $list->id) . '" type="radio"  value="2" id="optionsRadios1" >' . __('config.TOP_RATING') . '</label></div><div class="radio"> <label><input checked locations="' . route('products_location', $list->id) . '"  type="radio"  value="3" id="optionsRadios1" >' . __('config.FAVOURITE') . '</label></div>';
			}
		})->addColumn('created_at', function ($list) {
			$time = $list->created_at;
			if ($time) {
				return $time->format('d.m.Y H:i:t');
			}
		})->rawColumns(['location', 'created_at', 'status', 'action'])->make(true);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$cat_pro_main = $this->categoryRepository->all()->catParent()->get();
		$cat_pro_related = $this->categoryRepository->all()->get();
		return view('admin.products.add', compact('cat_pro_main', 'cat_pro_related'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$add_Products = new Products();
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
				$add_Products->images = $hinh_pro;
			} else {
				$add_Products->images = '';
			}
		}

		$img_pro_color = $request->color;
		$data_pro_img_color = array();
		$img_color = array();
		if ($img_pro_color) {
			foreach ($img_pro_color as $val) {
				$data_pro_img_color = explode('/', $val);
				$file_img_detai_color = $data_pro_img_color[6];
				$img_detail = file_get_contents($val);
				if (!empty($img_detail)) {
					$hinh_pro_detail_color = str_random(4) . "_" . basename($file_img_detai_color);
					while (file_exists("assets/upload/images_color/" . $hinh_pro_detail_color)) {
						$hinh_pro_detail_color = str_random(4) . "_" . $file_img_detai_color;
					}
					file_put_contents("assets/upload/images_color/$hinh_pro_detail_color", $img_detail);
					array_push($img_color, $hinh_pro_detail_color);
				} else {
					$add_Products->color = '';
				}
				$add_Products->color = json_encode($img_color);
			}

		}
		$sizes = $request->size;
		$prices = $request->price;
		$array_options = array_combine($sizes, $prices);
		$add_Products->option_price = json_encode($array_options);
		$add_Products->sale = $request->sale;
		$add_Products->location = $request->location;
		$array_post = $request->post;
		$add_Products->post = json_encode($array_post);
		$add_Products->status = $request->status;
		$add_Products->save();

		$product_id = $add_Products->id;
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

		$cat_id = $request->cat_id;
		$product = $this->productsRepository->find($product_id);
		foreach ($cat_id as $cat_pro) {
			$product->pro_cat()->attach($cat_pro);
		}

		$add_pro_en = new ProductsTranslation();
		$add_pro_en->Products_id = $add_Products->id;
		$add_pro_en->name = $request->name;
		$add_pro_en->slug = $request->slug;
		$add_pro_en->info = $request->info;
		$add_pro_en->description = $request->description;
		$add_pro_en->info_sale_product = $request->info_sale_product;
		$add_pro_en->locale = 'en';
		$add_pro_en->status = $request->status;
		$add_pro_en->save();

		return redirect()->route('Products.index')->with('info_add', 'Add new Products .. ! ');

	}

	public function Add_Products_lang(Request $request) {
		$products_lang_vi = new ProductsTranslation();
		$products_lang_vi->products_id = $request->products_id;
		$products_lang_vi->name = $request->name_vi;
		$products_lang_vi->slug = $request->slug_vi;
		$products_lang_vi->info = $request->info_vi;
		$products_lang_vi->description = $request->description_vi;
		$products_lang_vi->info_sale_product = $request->info_sale_product_vi;
		$products_lang_vi->locale = 'vi';
		$products_lang_vi->status = $request->status;
		$products_lang_vi->save();

		return redirect()->route('Products.index')->with('info_add', 'Add new Products .. ! ');
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

	public function change_location(Request $request, $id, $location) {
		$change_location = Products::find($id);
		$change_location->location = $location;
		$change_location->save();
		return response()->json(['flag' => 'success', 'message' => 'Update Sussesfully.....']);
	}

}
