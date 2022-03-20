<h1>Статьи, опубликованные за последнюю неделю</h1>

<h3>Добрый день, {{ $notifiable->name }}</h3>

<ul>
    @foreach($articles as $article)
        <li><a href="/articles/{{ $article->code }}">{{ $article->name }}</a></li>
    @endforeach
</ul>
