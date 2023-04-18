<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function campImages()
    {
        return $this->hasMany(CampImage::class);
    }

    public function campSessions()
    {
        return $this->hasMany(CampSession::class);
    }
}
