<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Arr;

class Article extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function comment()
    {
        return $this->belongsToMany(User::class, 'comments')
            ->withPivot(['text_comment']);
    }

//    public function comment()
//    {
//        return $this->belongsToMany(\App\Models\User::class, 'comments');
//    }
//
//    protected static function boot()
//    {
//        parent::boot();
//
//        static::updating(function (Article $article) {
//            $article->comment()->attach(auth()->id());
//        });
//    }
}
