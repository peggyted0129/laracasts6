@extends('layout')
@section('content')
<h5 class="mb-5">NEW ARTICLE</h5>
<form class="row g-3 fw-bolder" method="POST" action="{{ route('articles.store') }}" style="max-width:600px" enctype="multipart/form-data">
  @csrf
  <div class="col-12">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
    @error('title')
      <p class="text-danger fs-7">{{ $errors->first('title') }}</p>
    @enderror
  </div>
  <div class="col-12">
    <label for="excerpt" class="form-label">Excerpt</label>
    <textarea class="form-control" @error('excerpt') is-danger @enderror name="excerpt" id="excerpt" value="{{ old('excerpt') }}"></textarea>
    @error('excerpt')
      <p class="text-danger fs-7">{{ $errors->first('excerpt') }}</p>
    @enderror
  </div>
  <div class="col-12">
    <label for="body" class="form-label">Body</label>
    <textarea class="form-control" @error('body') is-danger @enderror name="body" id="body" value="{{ old('body') }}"></textarea>
    @error('body')
      <p class="text-danger fs-7">{{ $errors->first('body') }}</p>
    @enderror
  </div>
  <div class="col-12">
    <label class="form-label" for="tags">Tags</label>
    {{-- <select class="form-select" name="tags[]" id="tags" multiple>
      <option selected disabled>Choose...</option>
      @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
      @endforeach
    </select> --}}
    <select class="form-select" name="tags" id="tags">
      <option selected disabled>Choose...</option>
      @foreach($tags as $tag)
        @if( old('tags') == $tag->id  )
          <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
        @else
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endif
      @endforeach
    </select>

    @error('tags')
      <p class="text-danger fs-7">{{ $message }}</p>
    @enderror
  </div>
  <div class="col-12 mt-5">
    <button type="submit" class="btn btn-primary">submit</button>
  </div>
</form>

@endsection
