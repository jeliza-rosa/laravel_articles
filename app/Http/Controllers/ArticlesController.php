<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FormRequest;

class ArticlesController extends Controller
{
    public function store()
    {
        Article::create(FormRequest::validation());

        return redirect('/articles/create');
    }

    public function create()
    {
        return view('article');
    }

    public function index()
    {
        $articles = Article::latest()->get();

        return view('welcome', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('edit', compact('article'));
    }

    public function update(Article $article)
    {
        $article->update(FormRequest::validation(collect($article)->get('code')));

        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }
}
