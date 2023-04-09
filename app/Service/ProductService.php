<?php

namespace App\Service;

use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRestore;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public static function storeProduct(StoreRequest $request)
    {
        $data = $request->validated();
        if (!empty($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
        } else {
            $data['preview_image'] = '';
        }
        if (!empty($data['tags'])) {
            $tagIds = $data['tags'];
            unset($data['tags']);
        }
        if (!empty($data['colors'])) {
            $colorIds = ($data['colors']);
            unset($data['colors'], $data['colors']);
        }

        $product = Product::create($data);

        if (!empty($tagIds)) {
            $product->tags()->attach($tagIds);
        }

        if (!empty($colorIds)) {
            $product->colors()->attach($colorIds);
        }
    }

    public static function updateProduct(UpdateRestore $request, Product $product)
    {
        $data = $request->validated();

        if (!empty($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
        }

        $tagIds = [];
        $colorIds = [];

        if (!empty($data['tags'])) {
            $tagIds = $data['tags'];
            unset($data['tags']);
        }

        if (!empty($data['color'])) {
            $colorIds = $data['colors'];
            unset($data['colors']);
        }

        $product->update($data);
        $product->tags()->sync($tagIds);
        $product->colors()->sync($colorIds);
    }
}
