@extends('layouts.app')
@section('content')
	<div class="flex justify-center">
		Are you sure you want to delete {{$book->title}}?
	</div>
	<div class="flex mt-2 justify-center">
		<a class="btn" href="{{$book->path()}}">No</a>
		<form class="btn" method="POST" action="{{$book->path()}}">
			@method('DELETE')
			@csrf
			<button type="submit">Delete</button>
		</form>
	</div>
@endsection