<?php

namespace App\Models;

class Article extends Model
{
    public function getRouteKeyName()
    {
        return 'code';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_article');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
