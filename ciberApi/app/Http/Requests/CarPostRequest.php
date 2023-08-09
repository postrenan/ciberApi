<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cylinders' => 'required|integer|min:1|max:30',
            'engine_displacement'  => 'required|numeric|min:1|max:50',
            'drive' => 'required|string|max:100',
            'model' => 'required|string|max:50',
            'trany' => 'required|string|max:50',
            'class' => 'required|string|max:50',
            'year' => 'required|integer|min:1807|max:2500',
            'brand_id' => 'required|integer|max:500'
        ];
    }
}
