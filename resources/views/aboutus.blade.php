@extends('common.layout')

@section('content')
<main class="container">
  <div class="row g-5">
    <div class="col-md-12">
      <article class="blog-post">
        <h2 class="blog-post-title">{{$index->name}}</h2>
        <p>{{$index->description}}</p>
      </article>
    </div>
  </div>
</main>
@endsection