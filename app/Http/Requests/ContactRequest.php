<?php

namespace App\Http\Requests;

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
        return [
            "name" => 'required|string|min:6',
            "contact" => 'required|digits:9|unique:contacts',
            "email" => 'required|email|unique:contacts'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Please type your name.",
            "name.gt" => "The name has to be at least 6 characters.",
            "contact.required" => "Please type your contact.",
            "contact.digits" => "The contact has to be 9 digits.",
            "contact.unique" => "This contact already exists.",
            "email.required" => "Please type your email",
            "email.unique" => "This email already exists.",
        ];
    }
}
