<?php
namespace App\Repositories\EloquentRepository;

use App\Model\Category;
use App\Model\CategoryTranslation;
use App\Repositories\InterfaceRepository\CategoryInterfaceRepository;

class CategoryRepository implements CategoryInterfaceRepository {
	protected $category;

	public function __construct(Category $category) {
		$this->model = new Category();
		$this->category = $category;
	}
	public function all() {
		return $this->category->orderBy('id', 'desc');
	}

	public function find($id) {
		return $this->category->find($id);
	}

	public function store(array $input) {
		$new_cat = new Category();
		$new_cat->parent_id = $input['parent_id'];
		$new_cat->images = getImage($input['images'], 'category');
		$new_cat->status = $input['status'];
		$new_cat->save();

		$cat_id = $new_cat->id;
		$new_catLang_en = new categoryTranslation();
		$new_catLang_en->name = $input['name'];
		$new_catLang_en->category_id = $cat_id;
		$new_catLang_en->locale = 'en';
		$new_catLang_en->slug = $input['slug'];
		$new_catLang_en->status = $input['status'];
		$new_catLang_en->save();

		return $new_cat;
	}
	public function update(array $input, $id) {
		$update_cat = $this->category->find($id);
		if ($input['images']) {
			$path_images = getImage($input['images'], 'category');
			$update_cat->images = getImage($input['images'], 'category');
			$update_cat->update($input);
		} else {
			$update_cat->images = null;
			$update_cat->update($input);
		}

		return $update_cat;
	}

	public function destroy($id) {
		return $this->category->destroy($id);
	}

}
