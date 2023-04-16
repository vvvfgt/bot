<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductImage
 * @package App\Models
 * @property int $id
 * @property int $product_id
 * @property string $file_path
 *
 * @property string $imageUrl
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
*/

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'file_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
       return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute(): string
    {
        return url('storage/' . $this->file_path);
    }
}
