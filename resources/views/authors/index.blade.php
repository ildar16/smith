@extends('layouts.default')

@section('content')

	<div class="container mb-3">
		<a href="{{ route('authors.create') }}" class="btn btn-primary float-right text-white">Создать автора</a>
	</div>

	@foreach($authors as $author)
	    <div class="col-md-4">
	     <div class="card mb-4 box-shadow">
	       <img class="card-img-top" src="https://cataas.com/cat/says/hello?&color=red" alt="cute cat">
	       <div class="card-body">
	         <p class="card-text">{{ $author->name }}</p>
	         <p class="card-text">Кол-во книг: {{ $author->books_count }}</p>
	         <div class="d-flex justify-content-between align-items-center">
	           <div class="btn-group">
	             <a href="{{ route('authors.show', $author->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
	             <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
	           </div>
	           <small class="text-muted">{{ Carbon\Carbon::parse($author->created_at)->diffForHumans()}}</small>
	         </div>
	       </div>
	     </div>
	   </div>
	@endforeach

@endsection