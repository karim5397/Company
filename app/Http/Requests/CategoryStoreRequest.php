<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function messages()
    // {
    //   return [
    //     'category_name.required' =>__('Please Insert Category Name'),
    // ];
    // }

    // public function rules()
    // {
    //     return [
    //         'category_name' => 'required|unique:categories|max:55',
    //     ];
    // }
}
