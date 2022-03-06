<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function scopePublish($query)
    {
        return $query->where('status', 1)->latest()->get();
    }
}
