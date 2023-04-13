<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property int $category_id
 * @property int $group_id
 * @property string $title
 * @property ?string $description
 * @property ?string $preview_image
 * @property int $price
 * @property int $count
 * @property bool $is_published
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property ?string $imageUrl
 *
 * @property Category $category
 * @property Group $group
 *
 * @property Collection|Tag[] $tags
 * @property Collection|Color[] $colors
 *
*/

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'group_id',
        'title',
        'description',
        'preview_image',
        'price',
        'count',
        'is_published',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function group(): BelongsTo
    {
       return $this->belongsTo(Group::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function colors(): BelongsToMany
    {
       return $this->belongsToMany(Color::class);
    }

    public function tags(): BelongsToMany
    {
       return $this->belongsToMany(Tag::class);
    }

    public function getImageUrlAttribute(): ?string
    {
       return url('storage/' . $this->preview_image);
    }
}
