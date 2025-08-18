<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HighlightProduct extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'price',
    ];
}
