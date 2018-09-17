<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images_pro extends Model {
	protected $table = 'images_pro';

	public function images_pro() {
		return $this->belongsTo('App\products', 'product_id', 'id');
	}
}
