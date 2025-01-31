<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    public $tablename="sub_categories";

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
