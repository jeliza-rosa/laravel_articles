<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'code';
    }
}
