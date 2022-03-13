<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_article = [];
        $articlesId = \App\Models\Article::all()->pluck('id')->toArray();
        $tagsId = \App\Models\Tag::all()->pluck('id')->toArray();

        for ($i = 0; $i <= 20; $i++) {
            $tag_article[$i] = [
                'article_id' => $articlesId[rand(0, count($articlesId) - 1)],
                'tag_id' => $tagsId[rand(0, count($tagsId) - 1)]
            ];
        }

        DB::table('tag_article')->insert($tag_article);
    }
}
