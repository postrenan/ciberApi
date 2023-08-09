<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'page.size' => 'integer|max:1000|nullable',
            'page.offset' => 'integer|max:1000|nullable',
            'filter.first_name' => 'string|min:2|max:25',
            'filter.last_name' => 'string|min:2|max:25'
        ];
    }
}
