<?php

namespace App\Http\Requests\contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
    public function rules()
    {
        $rules= [
            'email'=>'required|unique:contacts,email,',
            'phone'=>'required|unique:contacts,phone,',
            'address'=>'required'
        ];
        if(in_array($this->method(), ['PUT', 'PATCH'])){
            $rules= [
                'email'=>'sometimes|unique:contacts,email,'.$this->contact->id.'',
                'phone'=>'sometimes|unique:contacts,phone,'.$this->contact->id.'',
                'address'=>'sometimes'
            ];
        }
        return $rules;
    }
}
