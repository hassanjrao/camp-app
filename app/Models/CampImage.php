<?php

namespace App\Models;

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
}
