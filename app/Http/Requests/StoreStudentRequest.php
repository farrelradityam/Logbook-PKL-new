<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10', 'max:20'],
            'batch_school_major_id' => ['required', 'exists:batch_school_majors,id'],
            'mentor_id' => ['required', 'exists:mentors,id'],
            'industry_advisor_id' => ['required', 'exists:industry_advisors,id'],
        ];
    }
}
