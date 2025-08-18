<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'thumbnail', 'price',
        'file_path', 'type', 'status'
    ];

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }
    public function views()
    {
        return $this->morphMany(\App\Models\View::class, 'viewable');
    }

    public function getViewsCountAttribute()
    {
        return $this->views()->count();
    }
    public function images()
    {
        return $this->hasMany(ProductsImage::class);
    }
}
