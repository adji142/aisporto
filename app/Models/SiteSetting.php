<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_title',
        'site_description',
        'site_tags',
        'headline',
        'sub_headline',
        'favicon',
        'contact_phone',
        'contact_email',
        'contact_address',
        'contact_hours',
        'map_embed',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
    ];

    public function banners()
    {
        return $this->hasMany(SiteBanner::class);
    }
}
