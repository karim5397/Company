<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function messages(){
        return[
            "name.required"=>"please input the name",
            "phone.required"=>"please input the phone",
            "email.required"=>"please input the email",
            "password.required"=>"please input the password",
        ];

    }
    public function rules()
    {
        $rules = [
            "name" => "required|max:255",
            "email" => "required|unique:users,email",
            "password" => "required|confirmed",
            "image" => "sometimes|mimes:png,jpg,jpeg,webp,gif,svg",
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules = [
            "name" => "required|max:255",
            'email' => 'sometimes|unique:users,email,'.$this->user->id.'',
            'password' => 'sometimes|confirmed',
            "image" => "sometimes|mimes:png,jpg,jpeg,webp,gif,svg",

            ];
        }
        return $rules;
    }

}
