<?php

namespace App;

use App\CategoryTranslation;
use App\products;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	use Translatable;
	protected $table = "category";
	protected $fillable = ['imges', 'status'];

	public $translatedAttributes = ['name', 'slug'];

	public function cat_pro() {
		return $this->hasMany(products::class, 'cat_id', 'id');
	}

	public function categoryTranslation() {
		return $this->hasMany(CategoryTranslation::class, 'category_id', 'id');
	}

}
