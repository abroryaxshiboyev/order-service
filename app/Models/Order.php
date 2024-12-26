<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'delivery_date',
        'total_price',
    ];

    public function items():HasMany{
        return $this->hasMany(OrderItem::class);
    }
}
