@extends('layouts.app')
@section('content')
	<a href="/books/create">Add to List</a>
	<table>
		<thead>
		<tr>
			<th>Title</th>
			<th>Author</th>
		</tr>
		</thead>
		<tbody>
		@forelse($books as $book)
			<tr>
				<td>
					<a href="{{$book->path()}}">{{$book->title}}</a>
				</td>
				<td>{{$book->author}}</td>
			</tr>
		@empty
			<tr>
				<td>No Books yet in the list</td>
			</tr>
		@endforelse
		</tbody>
	</table>
@endsection
