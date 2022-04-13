<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Article $article)
    {
        $article->comment()->attach(auth()->id(), ['text_comment' => request()->get('comment')]);
        return redirect()->back();
    }
}
