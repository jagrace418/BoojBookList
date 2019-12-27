@extends('layouts.app')
@section('content')
	<a href="/books">Home</a>
	<a href="{{$book->path() . '/edit'}}">Edit</a>
	<h3>{{$book->title}}</h3>
	<h5>{{$book->author}}</h5>
	<footer>
		<form method="POST" action="{{$book->path()}}" class="text-right">
			@method('DELETE')
			@csrf
			<button type="submit">Delete</button>
		</form>
	</footer>
@endsection