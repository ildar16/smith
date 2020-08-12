@extends('layouts.default')

@section('content')
	<div class="container">
		<ul>
			<li class="h4">Название книги: {{ $book->name }}</li>
			<li class="h4">Цена: {{ $book->price }}</li>
			<li class="h4">Автор(ы):
				<ul>
				@foreach($book->authors as $author)
					<li>{{ $author->name }};</li>
				@endforeach
				</ul>
			</li>
			<li class="h4">Дата публикации: {{ $book->date }}</li>
		</ul>

		<a href="{{ route('books.index') }}" class="btn btn-secondary text-white">Назад</a>
	</div>
@endsection