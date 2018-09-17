<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productsTranslation extends Model {
	protected $table = "productsTranslation";

	protected $fillable = ['name', 'slug', 'info', ' description', 'info_sale_product', 'locale', 'status'];

	public function products() {
		return $this->belongsTo('App\products', 'products_id', 'id');

	}
}
