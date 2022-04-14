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
        $this->middleware('can:update,article')->except(['index','store', 'create', 'show', 'edit', 'update']);
    }

    public function index()
    {
        if(auth()->user()->email == config('admin.admin_email')) {
            $articles = Article::with('tags')->where('published', 1)->latest()->simplePaginate(20);
        } else {
            $articles = auth()->user()->articles()->with('tags')->where('published', 1)->latest()->simplePaginate(10);
        }

        return view('welcome', compact('articles'));
    }

    public function store()
    {
        $article = Article::create(FormRequest::validation());

        $articleTags = $article->tags->keyBy('name');

        TagsSynchronizer::sync($articleTags, $article);

        $article->owner->notify(new ArticleCreate($article, __FUNCTION__));

        push_all('Создана новая статья');

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
        if(!(auth()->user()->email == config('admin.admin_email'))) {
            $this->authorize('update', $article);
        }

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
