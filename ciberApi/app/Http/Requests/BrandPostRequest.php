<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50|unique:brand,name',
            'founder'  => 'required|string|max:50',
            'foundation_data' => 'required|integer|min:1807|max:2500',
            'country' => 'required|string|max:50',
        ];
    }
}
