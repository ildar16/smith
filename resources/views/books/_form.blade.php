@extends('layouts.default')

@section('content')
  <form action="{{ Route::currentRouteName() == 'books.create' ? route('books.store') : route('books.update', $book->id) }}" method="post" class="col-6">

    <div class="form-group">
      <label for="name">Название</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $book->name ?? '' }}" placeholder="Имя">
    </div>

    <div class="form-group">
      <label for="price">Стоимость</label>
      <input type="number" class="form-control" id="price" name="price" value="{{ $book->price ?? '' }}" placeholder="Стоимость">
    </div>

	<div class="form-group">
		<label for="author">Автор</label>
		<select class="form-control" id="author" name="author">
			@if(isset($book->authors))

				@foreach($authors as $author)
		  			<option value="{{ $author->id }}" {{ $book->authors[0]->id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
		  		@endforeach

		  	@else

				@foreach($authors as $author)
		  			<option value="{{ $author->id }}">{{ $author->name }}</option>
		  		@endforeach

		  	@endif
		</select>
	</div>
    <div class="form-group">
      <label for="date">Дата публикации</label>
      <input type="date" class="form-control" id="date" name="date" value="{{ $book->date ?? '' }}">
    </div>

    @csrf

    @if(isset($book))
    	@method('PUT')
    @endif

    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary text-white">Назад</a>
  </form>
@endsection