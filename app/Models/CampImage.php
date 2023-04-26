<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function camp()
    {
        return $this->belongsTo(Camp::class);
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
