<?php

namespace App\Helpers;

use App\Models\View;
use Illuminate\Support\Facades\Auth;

class ViewHelper
{
    public static function log($model)
    {
        $ip = request()->ip();
        $userId = Auth::id();

        // Cegah view berulang dari user/IP yang sama dalam waktu 1 jam
        $exists = View::where('viewable_type', get_class($model))
            ->where('viewable_id', $model->id)
            ->where(function ($q) use ($ip, $userId) {
                if ($userId) {
                    $q->where('user_id', $userId);
                } else {
                    $q->where('ip_address', $ip);
                }
            })
            ->where('created_at', '>=', now()->subHour())
            ->exists();

        if (! $exists) {
            View::create([
                'viewable_type' => get_class($model),
                'viewable_id'   => $model->id,
                'user_id'       => $userId,
                'ip_address'    => $ip,
            ]);
        }
    }
}
