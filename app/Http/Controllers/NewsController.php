<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\NewList;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        if(auth()->user()->email == config('admin.admin_email')) {
            $news = NewList::simplePaginate(20);
        } else {
            $news = NewList::simplePaginate(10);
        }

        return view('news', compact('news'));
    }

    public function show(NewList $new)
    {
        return view('show_new', compact('new'));
    }
}
