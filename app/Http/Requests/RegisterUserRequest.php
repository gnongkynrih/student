<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password'=>'required|string|min:6|max:14',
            'mobile'=>'required|string|min:10|max:10|unique:admission_users',
            'email' => 'required|email|unique:admission_users'
        ];
    }

    public function messages(): array{
        return [
            'password.required'=>'Password is required',
            'password.min|password.max'=>'Password must be between 6 and 14 characters',
            'mobile.required'=>'Mobile no is mandatory',
            'mobile.min|mobile.max'=>'Invalid mobile number',
            'mobile.unique'=>'The mobile number is already taken'
        ];
    }
}
