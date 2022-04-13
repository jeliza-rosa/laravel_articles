<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tag extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

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
