<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHospitalRequest extends FormRequest
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
            "name"          => "required",
            "email"         => "required|email",
            "phone"         => "required",
            "website"       => "required",
            "establishment_date"    => "required",
            "description"   => "required",
            "address"       => "required",
            "logo"          => "sometimes|image|mimes:jpg,jpeg,png,gif",
            "social"        => 'sometimes|array',
            "user"          => 'required|array',
            "user.name"     => 'required',
            "user.email"    => 'required|email|unique:users,email',
            "user.password" => 'required|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'user.password.confirmed' => 'Password Confirmation Does Not match',
            'user.password.min' => 'Password must be at least 6 characters',
            'user.name.required' => 'User Name is Required',
            'user.email.unique' => 'User Email Already been Taken',
        ];
    }
}
