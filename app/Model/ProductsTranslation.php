<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsTranslation extends Model {
	protected $table = "productsTranslation";

	protected $fillable = ['name', 'slug', 'info', ' description', 'info_sale_product', 'locale', 'status'];

	public function products() {
		return $this->belongsTo('App\Model\Products', 'products_id', 'id');

	}
}
