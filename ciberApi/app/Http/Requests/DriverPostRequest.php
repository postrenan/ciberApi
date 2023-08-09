<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'phone_number' => 'required|string|max:30',
            'blood_type' => 'required|string|max:5',
            'gender' => 'required|string|max:20','in:Male,Female',
            'birthday' => 'required|date|after:01-01-1804|before:01-01-2500',
        ];
    }
}
