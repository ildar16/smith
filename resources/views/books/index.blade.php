@extends('layouts.default')

@section('content')

	<div class="container mb-3">
		<a href="{{ route('books.create') }}" class="btn btn-primary float-right text-white">Создать книгу</a>
	</div>

	@foreach($books as $book)
	    <div class="col-md-4">
	     <div class="card mb-4 box-shadow">
	       <img class="card-img-top" src="https://cataas.com/cat/says/hello?&color=red" alt="cute cat">
	       <div class="card-body">
	         <p class="card-text">{{ $book->name }}</p>
	         <p class="card-text">Автор(ы): 
	         	<ul>
	         	@foreach($book->authors as $author)
	         		<li><b>{{ $author->name }}</b></li>
	         	@endforeach
	         	</ul>
	         </p>
	         <div class="d-flex justify-content-between align-items-center">
	           <div class="btn-group">
	             <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
	             <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
	           </div>
	           <small class="text-muted">{{ Carbon\Carbon::parse($book->created_at)->diffForHumans()}}</small>
	         </div>
	       </div>
	     </div>
	   </div>
	@endforeach

@endsection