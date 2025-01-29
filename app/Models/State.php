<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $table = 'states';
    protected $fillable = [
        'state',  // Add this field
        'codeState',  // Add this field
    ];
}
