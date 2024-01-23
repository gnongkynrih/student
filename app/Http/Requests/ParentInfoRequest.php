<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentInfoRequest extends FormRequest
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
            'admission_user_id'=>'required|integer',
            'applicant_id'=>'required|integer',
            'father_name'=>'nullable|string|max:60',
            'mother_name'=>'required|string|max:60',
            'father_occupation'=>'nullable|string|max:60',
            'mother_occupation'=>'required|string|max:60',
            'father_phone'=>'nullable|string|max:10',
            'mother_phone'=>'nullable|string|max:10',
            'corresponding_address'=>'required|string|max:60',
            'permanent_address'=>'required|string|max:60',
            'father_designation' => 'required|string|max:60',
            'mother_designation' => 'required|string|max:60',
            'guardian_name' => 'nullable|string|max:60',
            'guardian_address'=>'nullable|string|max:60',
            'guardian_phone'=>'nullable|string|max:10',
            'father_id'=>'nullable|string|max:80',
            'mother_id'=>'nullable|string|max:80',
            'boys'=>'nullable|integer',
            'girls'=>'nullable|integer',
            'total_members'=>'nullable|integer',
        ];
    }
}
