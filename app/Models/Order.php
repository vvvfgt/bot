<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'product',
        'public',
        'secret_key',
    ];

    public function scopeActive($query)
    {
       return $query->where('public', 1);
    }
}
