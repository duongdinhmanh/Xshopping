<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class products extends Model {
	use Translatable;
	protected $table = 'products';
	protected $fillable = ['cat_id', 'imges', 'options_price', 'sale', 'location', 'post', 'status'];

	public $translatedAttributes = ['name', 'slug', 'info', ' description', 'info_sale_product'];

	public function productTranslation() {
		return $this->hasMany('App\productsTranslation', 'products_id', 'id');

	}

	public function pro_cat() {
		return $this->belongsTo('App\Category', 'cat_id', 'id');
	}

	public function pro_images() {
		return $this->hasMany('App\images_pro', 'product_id', 'id');
	}

}
