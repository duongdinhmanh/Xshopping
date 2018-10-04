<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model {
	protected $table = "categoryTranslation";
	public $timestamps = false;

	protected $fillable = ['category_id', 'name', 'slug', 'locale', 'status'];

	public function category() {
		return $this->belongsTo(Category::class, 'category_id', 'id');

	}

	public function scopeCatTransEn($query) {
		return $query->where('locale', 'en');
	}
	public function scopeCatTransVi($query) {
		return $query->where('locale', 'vi');
	}

}
