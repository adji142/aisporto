<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // Izinkan field ini diisi secara massal (create/update via ->create / ->update)
    protected $fillable = [
        'headline',
        'title',
        'description',
        'thumbnail',
        'slug',
        'link',
        'status'
    ];

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
        return $this->hasMany(PortfolioImage::class);
    }
}
