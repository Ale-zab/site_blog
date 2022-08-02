<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['*'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_article');
    }

    public function scopePublish($query)
    {
        return $query->where('status', 1)->latest()->get();
    }

    public function get($url) {
       return self::where('url', '=', $url)->first();
    }
}


