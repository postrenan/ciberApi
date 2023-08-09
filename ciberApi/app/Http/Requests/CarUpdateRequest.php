<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'cylinders' => 'integer|min:1|max:50',
            'engine_displacement'  => 'numeric|min:1|max:50',
            'drive' => 'string|max:50',
            'model' => 'string|max:50',
            'trany' => 'string|max:50',
            'class' => 'string|max:50',
            'year' => 'integer|min:1807|max:2500',
            'brand_id' => 'integer|min:1|max:500'
        ];
    }
}
