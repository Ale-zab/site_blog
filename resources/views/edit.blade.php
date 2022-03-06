@section('title', 'Редактировать статью: ' . $article->name)
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <article>
                    <h1 class="blog-post-title">Редактировать статью</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                @include('common.errors')

                <form action="/articles/{{ $article->url }}" method="POST" class="blog-post">
                    @method('PATCH')
                    @include('form')
                </form>
                <form action="/articles/{{ $article->url }}" method="POST" class="blog-post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>

            @include('common.column')
        </div>
    </main>
@endsection

