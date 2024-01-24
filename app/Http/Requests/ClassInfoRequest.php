<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:10|min:3',
            'is_active'=>'nullable|string|max:1'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name should be minimum 3 characters',
            'name.max' => 'Name should be maximum 10 characters',
            'is_active.max' => 'is_active should be maximum 1 characters',
        ];
    }
}
