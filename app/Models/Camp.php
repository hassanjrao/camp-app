<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camp extends Model
{
    use HasFactory, SoftDeletes;

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
