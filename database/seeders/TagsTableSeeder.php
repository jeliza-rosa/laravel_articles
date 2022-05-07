<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\NewList;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory(25)->make()->each(function ($tag) {
            $tag->save();
            $tag->articles()->attach(Article::inRandomOrder()->first(), ['tag_id' => $tag->id]);
            $tag->news()->attach(NewList::inRandomOrder()->first(), ['tag_id' => $tag->id]);
            $tag->save();
        });
    }
}
