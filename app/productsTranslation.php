<?php

namespace App;

use App\products;
use Illuminate\Database\Eloquent\Model;

class productsTranslation extends Model {
	protected $table = "productsTranslation";

	protected $fillable = ['products_id', 'name', 'slug', 'info', ' description', 'info_sale_product', 'locale', 'status'];

	public function products() {
		return $this->belongsTo(products::class, 'products_id', 'id');

	}
}
