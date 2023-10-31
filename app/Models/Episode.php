<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [];

    function characters(){
        return $this->belongsToMany(Character::class);
    }

    function setCreatedAttribute($value) {
        $this->attributes['created'] = date('Y-m-d H:i:s', strtotime($value));
    }
    function setAirDateAttribute($value) {
        $this->attributes['air_date'] = date('Y-m-d H:i:s', strtotime($value));
    }
}
