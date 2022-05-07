<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NewList extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggables');
    }

    public function comment()
    {
        return $this->belongsToMany(User::class, 'news_comments')
            ->withPivot(['text_comment']);
    }
}
