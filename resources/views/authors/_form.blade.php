@extends('layouts.default')

@section('content')

  <form action="{{ Route::currentRouteName() == 'authors.create' ? route('authors.store') : route('authors.update', $author->id) }}" method="post" class="col-6">

    <div class="form-group">
      <label for="name">Имя книги</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $author->name ?? '' }}" placeholder="Имя">
    </div>

    @csrf

    @if(isset($author))
    	@method('PUT')
    @endif

    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary text-white">Назад</a>
  </form>

@endsection