<?php

namespace App\Http\Controllers;

use App\Models\Article;

class AdminController extends Controller
{
    public function admin()
    {
        $articles = Article::with('tags')->latest()->get();

        return view('admin', compact('articles'));
    }
}
