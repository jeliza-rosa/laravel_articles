<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->name }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.1/examples/blog/blog.css" rel="stylesheet">
</head>
<body>

@include('layout.nav')

<main role="main" class="container">
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                {{ $article->name }}
                    <a href="/articles/{{ $article->code }}/edit">Изменить</a>
            </h3>

            @include('tags', ['tags' => $article->tags])

            <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

            <p style="font-size: 12px">{{ $article->description }}</p>

            <p>{{ $article->detail }}</p>

            <hr>

            <h4>Комментарии к статье</h4>

            @if($article->comment->toArray())
                <table>
                    <tr>
                        <th style="width: 300px">Дата комментария</th>
                        <th style="width: 300px">Автор комментария</th>
                        <th style="width: 300px">Текст комментария</th>
                    </tr>
                    @foreach($article->comment as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->pivot->text_comment }}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>Нет комментариев</p>
            @endif
            <hr>

            <form method="POST" action="/articles/{{ $article->code }}/comment">

                @csrf

                <div class="mb-3">
                    <label for="inputComment" class="form-label">Оставить комменатрий к статье</label>
                    <input type="text" class="form-control" id="inputComment" placeholder="Введите Ваш комментарий" name="comment" value="{{ old('comment') }}">
                </div>

                <button type="submit" class="btn btn-primary">Оставить комментарий</button>
            </form>

            <a href="/">Назад к статьям</a>

        </div>

        @include('layout.sidebar')
    </div>

</main>

@include('layout.footer')

</body>
</html>
