<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FormRequest;
use App\Models\NewList;
use App\Notifications\ArticleCreate;
use App\Services\TagsSynchronizer;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function create()
    {
        return view('new');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required|min:5|max:1000',
        ]);

        $new = NewList::create($attributes);

        $newTags = $new->tags->keyBy('name');

        TagsSynchronizer::sync($newTags, $new);

        flash('Новость успешно создана');

        return redirect('/news/create');
    }

    public function edit(NewList $new)
    {
        return view('edit_new', compact('new'));
    }

    public function update(NewList $new)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required|min:5|max:1000',
        ]);
        $new->update($attributes);

        $newTags = $new->tags->keyBy('name');

        TagsSynchronizer::sync($newTags, $new);

        flash('Новость успешно обновлена');

        return redirect('/news');
    }

    public function destroy(NewList $new)
    {
        $new->delete();

        flash('Новость удалена');

        return redirect('/news');
    }
}
