<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $tablename = "ratings";
    public $fillable = [
        'productId',
        'userId',
        'title',
        'description',
        'rating',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function users()
    {
        return $this->hasMany(
            User::class,
            'id',
            'userId'
        );
    }
}
