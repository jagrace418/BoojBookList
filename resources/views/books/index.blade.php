@extends('layouts.app')
@section('content')
	<a href="/books/create">Add to List</a>
	<ul>
		@forelse($books as $book)
			<li>
				<a href="{{$book->path()}}">{{$book->title}}</a>
			</li>
		@empty
			<li>No Books yet in the list</li>
		@endforelse
	</ul>
@endsection
