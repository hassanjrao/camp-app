<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampSessionSlot extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function campSession()
    {
        return $this->belongsTo(CampSession::class);
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


    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('H:i A', strtotime($value)),

        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('H:i A', strtotime($value)),

        );
    }

}
