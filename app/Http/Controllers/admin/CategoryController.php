<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\CategoryTranslation;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller {

	public function index() {
		$categories = category::where('parent_id', 0)->orderBy('id', 'DESC')->paginate(5);
		return view('admin.category.home', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$category = category::where('parent_id', 0)->get();
		$category_lang = categoryTranslation::where('locale', 'en')->get();
		return view('admin.category.add', compact('category', 'category_lang'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryRequest $request) {
		$new_cat = new category();
		$new_cat->parent_id = $request->parent_id;
		$img_cat = $request->images;
		$data_cat_img = array();
		if ($img_cat) {
			$data_cat_img = explode('/', $img_cat);
			$file = $data_cat_img[6];
			$img = file_get_contents($img_cat);
			if (!empty($img)) {
				$hinh_cat = str_random(4) . "_" . basename($file);
				while (file_exists("assets/upload/category/" . $hinh_cat)) {
					$hinh_cat = str_random(4) . "_" . $file;
				}
				file_put_contents("assets/upload/category/$hinh_cat", $img);
				$new_cat->images = $hinh_cat;
			} else {
				$new_cat->images = '';
			}
		}
		$new_cat->status = $request->status;
		$new_cat->save();

		$new_catLang_en = new categoryTranslation();
		$new_catLang_en->name = $request->name;
		$new_catLang_en->category_id = $new_cat->id;
		$new_catLang_en->locale = 'en';
		$new_catLang_en->slug = $request->slug;
		$new_catLang_en->status = $request->status;
		$new_catLang_en->save();

		return redirect()->route('Category.index')->with('info_add', trans('config.add_category'));

	}

	public function add_category_lang(Request $request) {
		$this->validate($request,
			[
				'name_vi' => 'required',
				'slug_vi' => 'required',
				'category_id' => 'required',
			],
			[
				'name_vi.required' => 'name_vi is required',
				'slug_vi.required' => 'slug_vi is required',
				'category_id.required' => 'transliteration catalog is required',
			]
		);
		$new_catLang_vi = new categoryTranslation();
		$new_catLang_vi->name = $request->name_vi;
		$new_catLang_vi->category_id = $request->category_id;
		$new_catLang_vi->locale = 'vi';
		$new_catLang_vi->slug = $request->slug_vi;
		$new_catLang_vi->status = $request->status;
		$new_catLang_vi->save();
		return redirect()->route('Category.index')->with('info_add', trans('config.add_category'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		// $cat_show = category::find($id);
		// $cat_show->status = 1;
		// $cat_show->save();
		// return response()->json(['flag' => 'success', 'message' => 'Cập nhật thành công']);
	}

	public function show_sub_cat(Request $request, $id) {
		$cat_show = category::find($id);
		$cat_show->status = 1;
		$cat_show->save();
		return response()->json(['flag' => 'success', 'message' => 'Cập nhật thành công']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$cat_edit = category::find($id);
		if ($cat_edit) {
			$category_lang = categoryTranslation::where('locale', 'en')->get();
			$category = category::where('status', 1)->where('parent_id', 0)->get();
			return view('admin.category.edit', compact('cat_edit', 'category', 'category_lang'));
		} else {
			return view('error.404');
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CategoryRequest $request, $id) {
		$category_edit = category::find($id);
		$category_edit->parent_id = $request->parent_id;
		if ($category_edit->parent_id == 0) {
			$img_cat = $request->Hinh_category;
			$data_cat_img = array();
			if (($img_cat)) {
				$data_cat_img = explode('/', $img_cat);
				$file = $data_cat_img[6];
				$img = file_get_contents($img_cat);
				if (!empty($img)) {
					$hinh_cat = str_random(4) . "_" . basename($file);
					while (file_exists("assets/upload/category/" . $hinh_cat)) {
						$hinh_cat = str_random(4) . "_" . $file;
					}
					file_put_contents("assets/upload/category/$hinh_cat", $img);
					$category_edit->images = $hinh_cat;
				}
			}
		} else {
			$category_edit->images = null;
		}

		$category_edit->status = $request->status;
		$category_edit->save();

		$category_editLang_en = categoryTranslation::where('category_id', $id)->where('locale', 'en')->first();
		$category_editLang_en->name = $request->name;
		$category_editLang_en->category_id = $id;
		$category_editLang_en->locale = 'en';
		$category_editLang_en->slug = $request->slug;
		$category_editLang_en->status = $request->status;
		$category_editLang_en->save();
		return redirect()->route('Category.index')->with('info_edit', trans('config.category_edit'));
	}

	public function cat_edit_vi(Request $request, $id) {
		$new_catLang_vi = categoryTranslation::where('category_id', $id)->where('locale', 'vi')->first();
		// $new_catLang_vi = categoryTranslation::find($id);
		// dd($new_catLang_vi);
		$new_catLang_vi->name = $request->name_vi;
		$new_catLang_vi->category_id = $id;
		$new_catLang_vi->locale = 'vi';
		$new_catLang_vi->slug = $request->slug_vi;
		$new_catLang_vi->status = $request->status;
		$new_catLang_vi->save();

		return redirect()->route('Category.index')->with('info_edit', trans('config.category_edit'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$sub_cat_del = category::find($id);
		$sub_cat_del->delete();
		return redirect()->route('Category.index')->with('info_del', 'Deleted Seccsessfully.....');
	}

	public function del_cat(Request $request, $id) {
		$cat_delete = category::findOrFail($id);
		$cat_delete->status = 0;
		$cat_delete->save();
		return response()->json(['flag' => 'success', 'message' => 'Update Seccsessfully.....']);
	}

	public function del_sub_cat(Request $request, $id) {
		$sub_cat_delete = category::findOrFail($id);
		$sub_cat_delete->status = 0;
		$sub_cat_delete->save();
		return response()->json(['flag' => 'success', 'message' => 'Update Seccsessfully.....']);
	}

}
