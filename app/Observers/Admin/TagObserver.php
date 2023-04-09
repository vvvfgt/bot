<?php

namespace App\Observers\Admin;

use App\Models\Admin\Tag;

class TagObserver
{
    public function deleting(Tag $tag)
    {
        $tag->products()->detach();
    }
}
