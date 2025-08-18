<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteBanner extends Model
{
    protected $fillable = [
        'site_setting_id',
        'image',
    ];

    public function siteSetting()
    {
        return $this->belongsTo(SiteSetting::class);
    }
}
