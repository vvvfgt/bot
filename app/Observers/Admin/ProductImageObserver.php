<?php

namespace App\Observers\Admin;

use App\Models\Admin\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageObserver
{
    public function deleting(ProductImage $productImage)
    {
        if (Storage::disk('public')->exists($productImage->file_path)) {
            Storage::disk('public')->delete($productImage->file_path);
        }
    }
}
