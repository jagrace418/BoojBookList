@extends('layouts.app')
@section('content')
	<div class="mt-5 flex">
		<button class="bg-blue-500 rounded-full py-2 px-4 text-white mr-2 shadow">
			<a href="/books">Home</a>
		</button>
		<button class="bg-blue-500 rounded-full py-2 px-4 text-white mr-2 shadow">
			<a href="{{$book->path() . '/edit'}}">Edit</a>
		</button>
		<form method="POST" action="{{$book->path()}}">
			@method('DELETE')
			@csrf
			<button class="bg-blue-500 rounded-full py-2 px-4 text-white" type="submit">Delete</button>
		</form>
	</div>

	<div class="flex justify-around">
		<div class="flex-col text-center rounded bg-red-200 shadow w-1/3 py-10">
			<div class="text-xl">
				Title:
				<div class="text-gray-800">{{$book->title}}</div>
			</div>
			<div class="text-xl">
				Author:
				<div class="text-gray-800">{{$book->author}}</div>
			</div>
			<div class="text-xl">
				Rating:
				<div class="text-gray-800">{{$book->ranking}}</div>
			</div>
			<div>
				Description:
				@if($book->description === null)
					<div class="text-l text-gray-800">No Description yet</div>
				@else
					<div class="text-l">{{$book->description}}</div>
				@endif

			</div>
		</div>
	</div>


@endsection