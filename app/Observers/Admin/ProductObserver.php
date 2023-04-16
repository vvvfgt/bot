<?php

namespace App\Observers\Admin;

use App\Models\Admin\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    public function deleting(Product $product)
    {
        $product->tags()->detach();
        $product->colors()->detach();
        $product->productImages()->delete();
        if ($product->preview_image) {
            if (Storage::disk('public')->exists($product->preview_image)) {
                Storage::disk('public')->delete($product->preview_image);
            }
        }
    }
}
