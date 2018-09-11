<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model {
	protected $table = "categoryTranslation";
	public $timestamps = false;

	protected $fillable = ['category_id', 'name', 'slug', 'locale', 'status'];

	public function category() {
		return $this->belongsTo(Category::class, 'category_id', 'id');

	}

}
