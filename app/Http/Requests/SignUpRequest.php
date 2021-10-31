<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
        return [
            'firstname' => 'required|max:50' ,
            'surname' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'signUpCondition' => 'required|alpha_dash' ,
        ] ;

    }

    public function messages()
    {
        return [
            'signUpCondition.required' => 'Please agree to Terms & Conditions to continue',
        ];
    }
}
