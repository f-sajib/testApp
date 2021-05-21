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
            "domain"       => "required|unique:hospitals,domain",
            "establishment_date"    => "required",
            "description"   => "required",
            "address"       => "required",
            "logo"          => "sometimes",
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
            'user.password.min' => 'Password Must Be At Least 6 Characters',
            'user.name.required' => 'User Name Is Required',
            'user.email.unique' => 'User Email Already Been Taken',
            'domain.unique' => 'Domain Name Is Already Been taken'
        ];
    }
}
