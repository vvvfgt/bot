<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class Order
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property array $products
 * @property string $email
 * @property int $total
 * @property bool $public
 * @property ?string $secret_key
 * @property bool $paid
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|OrderProduct[] $orderProducts
*/

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'products',
        'email',
        'total',
        'public',
        'secret_key',
        'paid',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'public' => 'boolean',
        'paid' => 'boolean',
    ];

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function scopeActive($query)
    {
       return $query->where('public', 1);
    }
}
