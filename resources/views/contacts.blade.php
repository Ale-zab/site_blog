@extends('common.layout')

@section('content')
<main class="container">
  <div class="row g-5">
    <div class="col-md-8">
      <article>
        <h2 class="blog-post-title">{{$index->name}}</h2>
        <p>{{$index->description}}</p>
      </article>

      @include('common.errors')

      <form action="" method="POST" class="blog-post">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" placeholder="Email" id="email"">
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Ваша сообщение</label>
          <textarea class="form-control" id="message" name="message"  placeholder="Ваша сообщение"></textarea>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Отправить</button>
      </form>
    </div>

    @include('common.column')
  </div>
</main>
@endsection
