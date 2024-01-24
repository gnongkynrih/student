<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateReligionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name' => 'required|string|min:2|max:30',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name is mandatory',
            'name.string' => 'Name must be string',
            'name.min' => 'Religion Name must be at least 2 characters',
            'name.max' => 'Name must be at most 3 characters',
        ];
    }
    
}
