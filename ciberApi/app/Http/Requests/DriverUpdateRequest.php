<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string|max:50',
            'last_name'  => 'string|max:50',
            'country' => 'string|max:50',
            'phone_number' => 'string|max:30',
            'blood_type' => 'string|max:5',
            'gender' => 'string|max:20','in:Male,Female',
            'birthday' => 'date|after:01-01-1804|before:01-01-2500',
        ];
    }
}
