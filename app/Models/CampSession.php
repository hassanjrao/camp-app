<?php

namespace App\Models;

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


    public function getSessionIdAttribute()
    {
        return "Session ".$this->id;
    }

}
