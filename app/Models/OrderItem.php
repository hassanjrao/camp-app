<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function campSession()
    {
        return $this->belongsTo(CampSession::class)->withTrashed();
    }

    public function campSessionSlot()
    {
        return $this->belongsTo(CampSessionSlot::class)->withTrashed();
    }


    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('m/d/y H:i A', strtotime($value)),

        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('m/d/y H:i A', strtotime($value)),

        );
    }
}
