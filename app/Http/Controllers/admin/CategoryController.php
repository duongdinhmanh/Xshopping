<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests\CategoryRequest;
use App\Http\Requests\CategoryRequests\CategoryTransRequest;
use App\Model\Category;
use App\Model\CategoryTranslation;
use App\Repositories\InterfaceRepository\CategoryInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller {
	protected $categoryRepository;

	public function __construct(CategoryInterfaceRepository $categoryRepository) {
		$this->categoryRepository = $categoryRepository;
	}

	public function index() {
		$categories = $this->categoryRepository->all()->catParent()->paginate(5);
		return view('admin.category.home', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$category = $this->categoryRepository->all()->CatParent()->get();
		$category_lang = CategoryTranslation::catTransEn()->get();
		return view('admin.category.add', compact('category', 'category_lang'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryRequest $request) {
		$this->categoryRepository->store($request->all());
		return redirect()->route('Category.index')->with('info_add', trans('config.add_category'));

	}

	public function add_category_lang(CategoryTransRequest $request) {
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
		$cat_show = $this->categoryRepository->find($id);
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
		$cat_edit = $this->categoryRepository->find($id);
		if ($cat_edit) {
			$category_lang = categoryTranslation::catTransEn()->get();
			$category = $this->categoryRepository->all()->where('status', 1)->get();
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
		$this->categoryRepository->update($request->all(), $id);
		$category_editLang_en = categoryTranslation::catTransEn()->where('category_id', $id)->first();
		$category_editLang_en->name = $request->name;
		$category_editLang_en->category_id = $id;
		$category_editLang_en->locale = 'en';
		$category_editLang_en->slug = $request->slug;
		$category_editLang_en->status = $request->status;
		$category_editLang_en->save();
		return redirect()->route('Category.index')->with('info_edit', trans('config.category_edit'));
	}

	public function cat_edit_vi(Request $request, $id) {
		$new_catLang_vi = categoryTranslation::catTransVi()->where('category_id', $id)->first();
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
		$this->categoryRepository->destroy($id);
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
