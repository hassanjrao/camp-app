<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];


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


    protected function startDateTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('m/d/y h:i a', strtotime($value)),

        );
    }

    protected function endDateTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('m/d/y h:i a', strtotime($value)),

        );
    }

    protected $appends=['is_expired'];

    public function getIsExpiredAttribute()
    {
        $startEndDateTimeArr=[strtotime($this->start_date_time),strtotime($this->end_date_time)];

        return (time() > $startEndDateTimeArr[1] || time() < $startEndDateTimeArr[0]) ? true : false;
    }
}
