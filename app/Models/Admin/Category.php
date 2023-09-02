<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class Category
 * @package App\Models
 * @property int $id
 * @property int $group_id
 * @property string $title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Product[] $products
 * @property Group $group
*/

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'group_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
