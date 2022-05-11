<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\NewList;
use App\Models\PostHistory;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            ->select('name','detail', 'code')
            ->get()
            ->toArray();

        foreach ($allArticles as $article) {
            $article->length_detail = strlen($article->detail);
        }

        $allArticles = collect($allArticles)->sortBy('length_detail');

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
        if (count($activeUsers) != 0) {
            $averageCountArticles = round($countArticles / count($activeUsers));
        } else {
            $averageCountArticles = 'Активных пользователей пока нет';
        }

        //самая изменяемая статья
        $changeArticleId = DB::table('post_histories')
            ->select('article_id')
            ->selectRaw('count(article_id) as count_articles')
            ->groupby('article_id')
            ->orderByDesc('count_articles')
            ->first();

        if ($changeArticleId != null) {
            $changeArticle = Article::where('id', '=', $changeArticleId->article_id)->first();
        } else {
            $changeArticle = 'Статей пока нет или ни одна статья не изменялась';
        }

        //самая обсуждаемая статья
        $commentArticleId = DB::table('comments')
            ->select('article_id')
            ->selectRaw('count(article_id) as count_articles')
            ->groupby('article_id')
            ->orderByDesc('count_articles')
            ->first();

        if ($commentArticleId != null) {
            $commentArticle = Article::where('id', '=', $commentArticleId->article_id)->first();
        } else {
            $commentArticle = 'Статей пока нет или ни одна статья не прокомментирована';
        }

        $data = [
            'articles' => $articles,
            'news' => $news,
            'user_more_articles' => ($userMaxArticles) ? $userMaxArticles->name : 'Нет пользователей или нет статей',
            'long_articles' => $longArticle,
            'short_articles' => $shortArticle,
            'average_articles' => $averageCountArticles,
            'more_change' => $changeArticle,
            'more_comments' => $commentArticle,
        ];

        return view('statistics', compact('data'));
    }
}
