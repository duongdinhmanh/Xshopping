<?php

namespace App;
use App\Category;
use App\productsTranslation;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class products extends Model {
	use Translatable;
	protected $table = 'products';
	protected $fillable = ['cat_id', 'imges', 'options_price', 'sale', 'location', 'post', 'status'];

	public $translatedAttributes = ['name', 'slug', 'info', ' description', 'info_sale_product', 'status'];

	public function productTranslation() {
		return $this->hasMany(productsTranslation::class, 'products_id', 'id');

	}

	public function pro_cat() {
		return $this->belongsTo(Category::class, 'cat_id', 'id');
	}

}
