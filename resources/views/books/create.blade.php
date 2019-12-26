@extends('layouts.app')
@section('content')
	<a href="/books">Cancel</a>
	<form method="POST" action="/books">
		@csrf
		<div>
			<label for="title">
				Title
				<input type="text" class="input" name="title" placeholder="Title">
			</label>
		</div>

		<div>
			<label for="Author">
				Author
				<input type="text" class="input" name="author" placeholder="Author">
			</label>
		</div>

		<div>
			<button type="submit">Save</button>
		</div>
	</form>
@endsection