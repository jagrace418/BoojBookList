@extends('layouts.app')
@section('content')
	<div class="mt-5 flex">
		<button class="bg-blue-500 rounded-full py-2 px-4 text-white mr-2">
			<a href="/books">Home</a>
		</button>
		<button class="bg-blue-500 rounded-full py-2 px-4 text-white mr-2">
			<a href="{{$book->path() . '/edit'}}">Edit</a>
		</button>
		<form method="POST" action="{{$book->path()}}">
			@method('DELETE')
			@csrf
			<button class="bg-blue-500 rounded-full py-2 px-4 text-white" type="submit">Delete</button>
		</form>
	</div>

	<div class="flex justify-around">
		<div class="flex-col text-center rounded bg-gray-300 shadow w-1/3 py-10">
			<div>
				Title:
				<div class="text-xl">{{$book->title}}</div>
			</div>
			<div>
				Author:
				<div class="text-xl">{{$book->author}}</div>
			</div>
			<div>
				Rating:
				<div class="text-xl">{{$book->ranking}}</div>
			</div>
		</div>
	</div>


@endsection