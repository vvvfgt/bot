<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class Category
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Product[] $products
*/

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
