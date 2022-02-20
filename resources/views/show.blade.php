@extends('common.layout')

@section('content')
<main class="container">
  <div class="row g-5">
    <div class="col-md-8">
      <article class="blog-post">
        <h2 class="blog-post-title">{{$index->name}}</h2>
        <p class="blog-post-meta">{{$index->created_at->toFormattedDateString()}}</p>

        <p>{{$index->description}}</p>
      
      </article>
    </div>

    @include('common.column')
  </div>
</main>
@endsection