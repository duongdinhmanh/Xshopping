<?php

namespace App\Model;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Products extends Model {
	use Translatable;
	protected $table = 'products';
	protected $fillable = ['cat_id', 'imges', 'options_price', 'sale', 'location', 'color', 'post', 'status'];

	public $translatedAttributes = ['name', 'slug', 'info', ' description', 'info_sale_product'];

	public function ProductTranslation() {
		return $this->hasMany('App\Model\ProductsTranslation', 'products_id', 'id');

	}

	public function pro_cat() {
		return $this->belongsToMany('App\Model\Category', 'category_product', 'product_id', 'category_id');
	}

	public function pro_images() {
		return $this->hasMany('App\Model\Images_Pro', 'product_id', 'id');
	}

	public function Pro_Attribite() {
		return $this->belongsToMany('App\Model\Pro_Attribite');
	}

	public static function scopepProductsAll($query) {
		return $query->where('status', 1)->orderBy('id', 'DESC');
	}

}
