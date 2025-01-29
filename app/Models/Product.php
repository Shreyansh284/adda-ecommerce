<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $tablename="products";

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId'); // Using 'categoryId' to reference the 'categories' table
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'productId'); // Using 'productId' to reference the 'images' table
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'productId'); // Assuming you have a 'ratings' table with 'productId' foreign key
    }
}
