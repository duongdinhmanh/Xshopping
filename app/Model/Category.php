<?php

namespace App\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	use Translatable;
	protected $table = "category";
	protected $fillable = ['parent_id', 'imges', 'status'];

	public $translatedAttributes = ['name', 'slug'];

	public function cat_pro() {
		return $this->belongsToMany('App\Model\Products', 'category_product', 'product_id', 'category_id');
	}

	public function CategoryTranslation() {
		return $this->hasMany('App\Model\CategoryTranslation', 'category_id', 'id');
	}

	public static function scopeCatParent($query) {
		return $query->where('parent_id', 0);
	}

	public static function scopeSubCate($query, $id) {
		return $query->where('parent_id', $id);
	}

}
