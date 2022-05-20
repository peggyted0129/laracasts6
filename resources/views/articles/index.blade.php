@extends('layout')

@section('content')

  <a href="{{ route('articles.create') }}" class="btn btn-primary mb-5">新增</a>

  @foreach($articles as $article)
    <div class="card mb-3">
      <div class="card-header">
        <h5 class="d-flex justify-content-lg-between">
          {{-- <a href="{{ $article->path() }}">{{ $article->title }}</a> --}}
          <a href="{{ route('articles.show', ['article' => $article->id]) }}">{{ $article->title }}</a>
          <form action="{{ route('articles.destroy', [$article->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('確定刪除?');">刪除</button>
          </form>
        </h5>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>{!! $article->excerpt !!}</p>
          <footer class="blockquote-footer mt-2 fs-7">
            {{ $article->body }}
          </footer>
        </blockquote>
      </div>
    </div>
  @endforeach
@endsection