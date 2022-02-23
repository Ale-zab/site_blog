@extends('common.layout')

@section('content')
<main class="container">
  <div class="row g-5">
    <div class="col-md-8">
      <article>
        <h1 class="blog-post-title">Создать статью</h1>
        <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический безорфографичный скатился?</p>
      </article>
      @include('common.errors')
      <form action="/" method="POST" class="blog-post">
        <div class="mb-3">
          <label for="name" class="form-label">Название</label>
          <input type="text" name="name" class="form-control" placeholder="Название" id="name"">
        </div>
        <div class="mb-3">
          <label for="url" class="form-label">Адрес статьи</label>
          <input type="text" name="url" class="form-control" placeholder="Адрес статьи" id="url"">
        </div>
        <div class="mb-3">
          <label for="short_description" class="form-label">Краткое описание</label>
          <textarea class="form-control" id="short_description" name="short_description"  placeholder="Краткое описание"></textarea>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Статья</label>
          <textarea class="form-control" id="description" name="description"  placeholder="Статья"></textarea>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="status" name="status">
          <label class="form-check-label" for="status">Вкл/ Выкл</label>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Отправить</button>
      </form>

    </div>

    @include('common.column')
  </div>
</main>
@endsection

