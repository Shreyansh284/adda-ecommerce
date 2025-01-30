<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'userId'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
