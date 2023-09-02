<?php

namespace App\Service;

use App\Models\Admin\Category;
use Illuminate\Support\Collection;

class CategoryService
{
    public function groupCategories(int $groupId): ?Collection
    {
        return Category::query()
            ->where('group_id', $groupId)
            ->get();
    }
}
