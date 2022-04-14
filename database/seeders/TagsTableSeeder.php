<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::factory(25)->make()->each(function ($tag) {
            $tag->save();
            $tag->articles()->attach(\App\Models\Article::inRandomOrder()->first(), ['tag_id' => $tag->id]);
            $tag->save();
        });
    }
}
