<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'products' => 'array',
            'name' => 'required|string',
            'email' => 'required|string',
            'total_price' => 'required|integer',
        ];
    }
}
