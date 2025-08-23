<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
   protected $fillable = [
    'user_id', 
    'first_name', 
    'last_name', 
    'email', 
    'address', 
    'city', 
    'state', 
    'zip_code', 
    'phone', 
    'payment_method',
    'subtotal',
    'shipping',
    'total',
    'total_amount',
    'status',
    'stripe_session_id',
    'stripe_payment_intent_id'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
