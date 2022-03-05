<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $guarded = [];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'tag_article');
    }

    public static function tagsCloud()
    {
        return (new static)->has('articles')->get();
    }
}