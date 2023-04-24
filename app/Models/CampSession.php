<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampSession extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function camp()
    {
        return $this->belongsTo(Camp::class);
    }

    public function campSessionSlots()
    {
        return $this->hasMany(CampSessionSlot::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


    // public function getSessionIdAttribute()
    // {
    //     return "Session ".$this->id;
    // }


    protected function sessionId(): Attribute
    {
        // set: increment the last session id
        return Attribute::make(
            get: fn ($value) => "Session " . $value,

        );
    }

    protected function startDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('m/d/y', strtotime($value)),

        );
    }

    protected function endDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('m/d/y', strtotime($value)),

        );
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
