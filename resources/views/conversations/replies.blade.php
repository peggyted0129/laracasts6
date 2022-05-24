@forelse($conversation->replies as $reply)
  <div>
    <div class="d-flex justify-content-between">
      <p class="m-0 fw-bolder"> {{ $reply->user->name }} said.... </p>

      {{-- @if($conversation->best_reply_id === $reply->id) --}}
      @if( $reply->isBest() )
        <span class="text-success fw-bolder"> Best Reply !! </span>
      @endif
    </div>

    <p>{{ $reply->body }}</p>

    @can('update', $conversation)
      <form method="POST" action="/best-replies/{{ $reply->id }}">
        @csrf
        <button type="submit" class="btn p-0 text-muted">Best Reply ?</button>
      </form>
    @endcan
  </div>

  @continue($loop->last)

  <hr>

@empty
  <p>沒有對應的 reply...</p>
@endforelse