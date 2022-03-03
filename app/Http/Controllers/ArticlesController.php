<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function articlePost()
    {

        $this->validate(request(), [
            'code' => 'required|regex:/^[A-Za-z0-9_-]+$/|unique:articles',
            'name' => 'required|min:5|max:100',
            'description' =>'required|max:255',
            'detail' => 'required',
        ]);

        $arr = request()->all();

        if (request('published')) {
            $arr['published'] = true;
        } else {
            $arr['published'] = false;
        };

        Article::create($arr);

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
}
