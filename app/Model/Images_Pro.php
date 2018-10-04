<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Images_Pro extends Model {
	protected $table = 'images_pro';

	public function images_pro() {
		return $this->belongsTo('App\Model\Products', 'product_id', 'id');
	}
}
