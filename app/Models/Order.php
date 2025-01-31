<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'addressId', 'paymentId', 'paymentMode', 'price', 'quantity'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    // Relationship with Address
    public function address()
    {
        return $this->belongsTo(Address::class, 'addressId');
    }

    // Relationship with Payment
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'paymentId');
    }

    // Relationship with Order Items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'orderId');
    }
}
