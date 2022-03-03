<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FormRequest;

class ArticlesController extends Controller
{
    public function articlePost()
    {
        Article::create(FormRequest::validation());

        return redirect('/articles/create');
    }

    public function article()
    {
        return view('article');
    }

    public function main()
    {
        $articles = Article::latest()->get();

        return view('welcome', compact('articles'));
    }

    public function articleGet(Article $code)
    {
        return view('show', compact('code'));
    }

    public function edit(Article $code)
    {
        return view('edit', compact('code'));
    }

    public function update(Article $code)
    {
        $code->update(FormRequest::validation($code));

        return redirect('/');
    }

    public function destroy(Article $code)
    {
        $code->delete();

        return redirect('/');
    }
}
