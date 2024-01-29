<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoFormRequest extends FormRequest
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
            'first_name'=>'required|string|min:3|max:30',
            'last_name'=>'required|string|min:3|max:30',
            'middle_name'=>'nullable|string',
            'category'=>'required|string|max:3',
            'gender'=>'nullable|string|max:6',
            'dob'=>'required|date',
            'state'=>'required|string|max:30',
            'nationality'=>'required|string|max:30',
            'religion_id'=>'required|integer',
            'language'=>'required|string|max:30',
            'community'=>'required|string|max:30',
            'is_catholic'=>'nullable|string',
            'balang'=>'nullable|string',
            'class_name' =>'required|string|max:10',
        ];
    }
}
