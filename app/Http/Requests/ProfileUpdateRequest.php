<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:2', 'string'],
            'last_name' => ['required', 'min:2', 'string'],
            'student_instructor_id' => [
                'required',
                'regex:/^\d{2}-[A-Z]{2}-\d{4}$/'
            ],
            'profile_picture' => 'nullable|max:10248',
            'account_role' => 'nullable',
            'degree_name' => 'nullable',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)]
            ,[ //vustomized error msg
                'min.first_name' => 'The :attribute should be at least :min',
                'student_instructor_id.min' => 'The :attribute should be at least :min',
                'student_instructor_id.regex' => 'The :attribute should be like 20-AC-9029, try again.',    
            ]
        ];
    }
}
