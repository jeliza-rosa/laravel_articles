<?php

namespace App\Services;

use App\Models\Model;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public static function sync(Collection $tags, Model $model)
    {
        $arrayTags = collect(explode(',', request('tags'))); //tags

        $syncIds = $tags->intersectByKeys($arrayTags)->pluck('id')->toArray();

        $tagsToAttach = $arrayTags->diffKeys($tags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
    }
}
