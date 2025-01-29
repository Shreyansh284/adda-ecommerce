<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = 'cities';

    // Mass assignable attributes
    protected $fillable = [
        'city',
        'pincode',
        'stateId',
        'status',
    ];
    public function state()
    {
        return $this->belongsTo(State::class, 'stateId');
    }
}
