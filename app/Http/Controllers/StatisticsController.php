<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\NewList;
use App\Models\PostHistory;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        //все статьи
        $articles = Article::count();

        //все пользователи
        $news = NewList::count();

        //пользователь с самой длинной статьей
        $userMaxArticles = DB::table('users')
            ->rightjoin('articles','users.id','=','articles.owner_id')
            ->select('users.name')
            ->selectRaw('count(users.id) as count_articles')
            ->groupby('users.id')
            ->orderByDesc('count_articles')
            ->first();

        //все статьи с длинной описания
        $allArticles = DB::table('articles')
            ->select('name','description', 'code')
            ->get()
            ->toArray();

        foreach ($allArticles as $article) {
            $article->length_description = strlen($article->description);
        }

        $allArticles = collect($allArticles)->sortBy('length_description');

        //самая длинная статья
        $longArticle = $allArticles->last();

        //самая короткая статья
        $shortArticle = $allArticles->first();

        $allUsersOneArticle = DB::table('users')
            ->rightjoin('articles','users.id','=','articles.owner_id')
            ->select('users.name')
            ->selectRaw('count(users.id) as count_articles')
            ->groupby('users.id')
            ->orderByDesc('count_articles')
            ->get();

        $activeUsers = $allUsersOneArticle->where('count_articles', '>', '1')->toArray();
        $countArticles = 0;
        foreach ($activeUsers as $user) {
            $countArticles = $countArticles + $user->count_articles;
        }

        //среднее количсетво статей
        $averageCountArticles = round($countArticles / count($activeUsers));

        //самая изменяемая статья
        $changeArticleId = DB::table('post_histories')
            ->select('article_id')
            ->selectRaw('count(article_id) as count_articles')
            ->groupby('article_id')
            ->orderByDesc('count_articles')
            ->first()->article_id;

        $changeArticle = Article::where('id', '=', $changeArticleId)->first();

        //самая обсуждаемая статья
        $commentArticleId = DB::table('comments')
            ->select('article_id')
            ->selectRaw('count(article_id) as count_articles')
            ->groupby('article_id')
            ->orderByDesc('count_articles')
            ->first()->article_id;

        $commentArticle = Article::where('id', '=', $commentArticleId)->first();

        $data = [
            'articles' => $articles,
            'news' => $news,
            'user_more_articles' => $userMaxArticles->name,
            'long_articles' => $longArticle,
            'short_articles' => $shortArticle,
            'average_articles' => $averageCountArticles,
            'more_change' => $changeArticle,
            'more_comments' => $commentArticle,
        ];

        return view('statistics', compact('data'));
    }
}
