<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'categories' => 'nullable|array',
            'tags' => 'nullable|array',
            'prices' => 'nullable|array',
        ];
    }
}
