<?php

namespace App\Observers\Admin;

use App\Models\Admin\Product;

class ProductObserver
{
    public function deleting(Product $product)
    {
        $product->tags()->detach();
        $product->colors()->detach();
    }
}
