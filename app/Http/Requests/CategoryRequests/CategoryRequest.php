<?php

namespace App\Http\Requests\CategoryRequests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required',
			'parent_id' => 'required',
			'slug' => 'required',
			// 'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		];
	}

	public function messages() {
		return [
			'name.required' => 'name is required.',
			'parent_id.required' => 'parent_id is required',
			'slug.required' => 'slug is required',
			// 'images.mimes' => 'file cannot be image ',
			// 'images.max' => 'image size is not too 150 kilobytes ',

		];
	}
}
