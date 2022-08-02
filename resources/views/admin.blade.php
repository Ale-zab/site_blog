@section('title', 'Админ. раздел')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article>
                    <h1 class="blog-post-title">Админ. раздел</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <div class="list-group mb-4">
                    <a href="/admin/feedback" class="list-group-item list-group-item-action">
                        Сообщения
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
