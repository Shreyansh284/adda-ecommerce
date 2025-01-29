<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $table = 'colors';

    // Mass assignable attributes
    protected $fillable = [
        'color',
        'hexcode',
    ];
}
