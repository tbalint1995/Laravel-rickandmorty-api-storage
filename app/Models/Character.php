<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $guarded = [];

    function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    //Az "image" attribútum egy kiegészítő attribútum, ami egy kép HTML elemét reprezentálja a karakter képével.
    function getImageAttribute()
    {
        return '<img src="' . $this->attributes["image"] . '" class="col-md-6 col-lg-4 img-thumbnail" alt="' . $this->attributes["name"] . '">';
    }
}
