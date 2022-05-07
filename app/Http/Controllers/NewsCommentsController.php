<?php

namespace App\Http\Controllers;

use App\Models\NewList;
use Illuminate\Http\Request;

class NewsCommentsController extends Controller
{
    public function store(NewList $new)
    {
        $new->comment()->attach(auth()->id(), ['text_comment' => request()->get('comment')]);
        return redirect()->back();
    }
}
