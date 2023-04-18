<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampSessionSlot extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function campSession()
    {
        return $this->belongsTo(CampSession::class);
    }

    
}
