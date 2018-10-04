<?php

namespace App\Http\Requests\CategoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryTransRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return
			[
			'name_vi' => 'required',
			'slug_vi' => 'required',
			'category_id' => 'required',
		];
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name_vi.required' => 'name_vi is required',
			'slug_vi.required' => 'slug_vi is required',
			'category_id.required' => 'transliteration catalog is required',
		];
	}
}
