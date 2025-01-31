<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'productId', 'status', 'price', 'quantity'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    // Relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }

    
}
