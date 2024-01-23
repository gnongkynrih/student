<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentTypeCheckRequest extends FormRequest
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
            'passport' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:100',
            'family_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:500',
            'baptism_certificate' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:500',
            'father_id' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:500',
            'mother_id' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:500',
            'caste_certificate' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:500',
            'birth_certificate' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:500',
            'address_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:500',
            
        ];
    }
    public function  messages(){
        return [
            'family_pic.max' => 'The family picture should not be greater than 500 kilobytes.',
        ];
    }
}
