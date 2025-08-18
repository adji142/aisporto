<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title','slug','summary','description',
        'icon_type','icon','icon_image',
        'cta_label','cta_url','is_active','sort',
    ];
}
