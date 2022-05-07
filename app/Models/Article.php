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
        return $this->morphToMany(Tag::class, 'taggables');
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

    public function history()
    {
        return $this->belongsToMany(User::class, 'post_histories')
            ->withPivot(['before', 'after']);
    }

    protected static function boot()
    {
        parent::boot();

//        static::updating(function (Article $article) {
//            $article->comment()->attach(auth()->id());
//        });

        static::updating(function (Article $article) {
            $after = $article->getDirty();
            $article->history()->attach(auth()->id(), [
                'before' => json_encode(Arr::only($article->fresh()->toArray(), array_keys($after))),
                'after' => json_encode($after),
            ]);
        });
    }
}
