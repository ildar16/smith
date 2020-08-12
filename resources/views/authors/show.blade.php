@extends('layouts.default')

@section('content')
	<div class="container">
		<ul>
			<li class="h4">Имя автора: {{ $author->name }}</li>
			<li class="h4">Количество книг: {{ $author->books_count }}</li>
		</ul>

		<a href="{{ route('authors.index') }}" class="btn btn-secondary text-white">Назад</a>
	</div>
@endsection