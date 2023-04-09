<?php

namespace App\Observers\Admin;

use App\Models\Admin\Category;

class CategoryObserver
{
    public function deleting(Category $category)
    {
        $category->products()->delete();
    }
}
