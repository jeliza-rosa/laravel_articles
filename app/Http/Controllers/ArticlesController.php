<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FormRequest;
use App\Services\TagsSynchronizer;
use App\Notifications\ArticleCreate;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:update,article')->except(['index','store', 'create']);
    }

    public function index()
    {
        if(auth()->user()->name == 'admin') {
            $articles = Article::with('tags')->where('published', 1)->latest()->get();
        } else {
            $articles = auth()->user()->articles()->with('tags')->where('published', 1)->latest()->get();
        }

        return view('welcome', compact('articles'));
    }

    public function store()
    {
        $article = Article::create(FormRequest::validation());

        $articleTags = $article->tags->keyBy('name');

        TagsSynchronizer::sync($articleTags, $article);

        $article->owner->notify(new ArticleCreate($article, __FUNCTION__));

        flash('Статья успешно создана');

        return redirect('/articles/create');
    }

    public function create()
    {
        return view('article');
    }

    public function show(Article $article)
    {
        return view('show', compact('article'));
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('edit', compact('article'));
    }

    public function update(Article $article)
    {
        $article->update(FormRequest::validation(collect($article)->get('code')));

        $articleTags = $article->tags->keyBy('name');

        TagsSynchronizer::sync($articleTags, $article);

        $article->owner->notify(new ArticleCreate($article, __FUNCTION__));

        flash('Статья успешно обновлена');

        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        $article->owner->notify(new ArticleCreate($article, __FUNCTION__));

        flash('Статья удалена');

        return redirect('/');
    }
}
