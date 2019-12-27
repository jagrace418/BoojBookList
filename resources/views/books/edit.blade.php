@extends('layouts.app')
@section('content')
	<a href="/books">Cancel</a>
	<form method="POST" action="{{$book->path()}}">
		@method('PATCH')
		@csrf
		<div>
			<label for="title">
				Title
				<input type="text" class="input" name="title" placeholder="Title" value="{{$book->title}}">
			</label>
		</div>

		<div>
			<label for="Author">
				Author
				<input type="text" class="input" name="author" placeholder="Author" value="{{$book->author}}">
			</label>
		</div>

		<div>
			<button type="submit">Save</button>
		</div>
	</form>
@endsection