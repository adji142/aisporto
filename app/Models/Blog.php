<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'headline',
        'category_id',
        'title',
        'content',
        'thumbnail',
        'slug',
        'tags',
        'status'
    ];

    protected $casts = [
        'tags' => 'array', // otomatis decode JSON ke array
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function views()
    {
        return $this->morphMany(\App\Models\View::class, 'viewable');
    }

    public function getViewsCountAttribute()
    {
        return $this->views()->count();
    }
}
