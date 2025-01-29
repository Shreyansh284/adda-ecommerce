<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    public $tablename="ratings";
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
