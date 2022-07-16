<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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




    public function messages()
    {
      return [
        'title.required' =>'Please Insert Data',
        'sub_description.required' =>__('Please Insert Data'),
        'icon_name.required' =>__('Please Insert Data'),
    ];
    }

    public function rules()
    {

            return [
                'title' => 'required',
                'sub_description' => 'required',
                'icon_name' => 'required',
            ];
    }


}
