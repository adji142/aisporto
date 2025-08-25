<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    // protected $fillable = ['viewable_type', 'viewable_id', 'user_id', 'ip_address'];
    protected $fillable = [
        'viewable_type',
        'viewable_id',
        'user_id',
        'ip_address',
        'country',
        'city',
        'region',
        'user_agent',
    ];

    public function viewable()
    {
        return $this->morphTo();
    }
}
