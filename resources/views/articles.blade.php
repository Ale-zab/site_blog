@section('title', 'Статьи')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <article>
                    <h1 class="blog-post-title">Статьи</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <div class="row mb-2">
                    @if($articles)
                        @foreach($articles as $articele)
                            <div class="col-md-6 mb-4">
                                <div
                                    class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-100 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <h3 class="mb-0">{{$articele->name}}</h3>
                                        <div
                                            class="mb-1 text-muted">{{$articele->created_at->toFormattedDateString()}}</div>
                                        <p class="card-text mb-auto">{{$articele->short_description}}...</p>
                                        <a href="/articles/{{$articele->url}}" class="stretched-link">Читать дальше</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 error">
                            <div class="row g-0 border rounded overflow-hiddenmb-12 shadow-sm error__content">
                                <div class="error__text">
                                    Статьи не найдены
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            @include('common.column')
        </div>
    </main>
@endsection
