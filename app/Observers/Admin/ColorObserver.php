<?php

namespace App\Observers\Admin;

use App\Models\Admin\Color;

class ColorObserver
{
    public function deleted(Color $color)
    {
        $color->products()->detach();
    }
}
