<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable',
            'preview_image' => 'nullable',
            'price' => 'required',
            'count' => 'required',
            'is_published' => 'nullable',
            'category_id' => 'required',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
