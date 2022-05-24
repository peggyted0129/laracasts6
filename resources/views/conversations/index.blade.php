@extends('layout')
@section('content')
  @foreach($conversations as $conversation)
    <h3>
      <a href="/conversations/{{ $conversation->id }}">{{ $conversation->title }}</a>
    </h3>

    @continue($loop->last)

    <hr>
  @endforeach
@endsection