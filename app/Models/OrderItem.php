<?php

namespace App\Models;

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
        return $this->belongsTo(CampSession::class);
    }

    public function campSessionSlot()
    {
        return $this->belongsTo(CampSessionSlot::class);
    }
}
