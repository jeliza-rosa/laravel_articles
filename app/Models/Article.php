<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public $guarded = [];

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
