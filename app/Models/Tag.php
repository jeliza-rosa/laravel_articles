<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tag extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $guarded = [];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggables');
    }

    public function news()
    {
        return $this->morphedByMany(NewList::class, 'taggables');
    }

    public static function tagsCloud()
    {
        return (new static)->get();
    }
}
