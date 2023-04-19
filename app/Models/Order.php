<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nikolag\Square\Traits\HasProducts;

class Order extends Model
{
    use HasFactory, HasProducts;

    protected $table='orders';

    protected $guarded;

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
