@extends('layout')
@section('content')
  <h2 class="mb-5"> {{ $article->title }} </h2>
  <p class="mb-5"> {!! $article->body !!} </p>
  <div class="d-flex mb-5">
    <p class="me-6">對應的文章 : </p>
    @forelse($article->tags as $tag)
      {{-- <a href="/articles?tag={{ $tag->name }}" target="_blank" class="me-3">{{ $tag->name }}</a> --}}
      <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" target="_blank" class="me-3">{{ $tag->name }}</a>
    @empty
      <p>沒有對應的文章</p>
    @endforelse
  </div>
  <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm">回到 articles 頁</a>
@endsection