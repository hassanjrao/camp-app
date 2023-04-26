<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function getOrderIdAttribute()
    {
        return "#Order-".$this->id;
    }

    public function gettotalPriceAttribute()
    {
        return number_format(floatVal($this->items->map(function($item){
            return $item->campSession->camp->price;
        })->sum()),2);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }


    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('m/d/y h:i a', strtotime($value)),

        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('m/d/y h:i a', strtotime($value)),

        );
    }
}
