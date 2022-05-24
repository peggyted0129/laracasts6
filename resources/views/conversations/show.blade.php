@extends('layout')
@section('content')
  <p class="mb-5">
    <a href="/conversations">Back</a>
  </p>

  <h3 class="mb-5">{{ $conversation->title }}</h3>

  <p class="text-muted">作者 : {{ $conversation->user->name }}</p>

  <div>
    {{ $conversation->body }}
  </div>

  <hr class="my-8">

  <h5 class="mb-5"> Reply 回覆如下 </h5>
  
  @include ('conversations.replies')

@endsection