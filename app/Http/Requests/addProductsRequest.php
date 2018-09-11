<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;
class addProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'descriptions'=>'required',
            'cat_id'=>'required',
            'Price'=>'required',
            'brand'=>'required',
            // 'Hinh'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Hinh'=>'required',
            'Sale_price'=>'required',
            ];
    }

    public function messages()
    {
        return[
            'name.required'=>'name cannot be empty field',
            'descriptions.required'=>'descriptions cannot be empty field',
            'cat_id.required'=>'category cannot be empty field',
            'Price.required'=>'Price cannot be empty field',
            'brand.required'=>'Brand cannot be empty field',
            'Hinh.required'=>'images cannot be empty field',
            // 'Hinh.mimes'=>'file cannot be image ',
            // 'Hinh.max'=>'image size is not too 150 kilobytes ',
            'Sale_price.required'=>'Sale_price cannot be empty field'
        ];
    }
}
