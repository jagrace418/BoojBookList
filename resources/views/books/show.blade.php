@extends('layouts.app')
@section('content')
	<div class="mt-5 flex">

		<a href="/books" class="btn">Home</a>

		<a class="btn" href="{{$book->path()}}/edit">Edit</a>

		<a class="btn" href="{{$book->path()}}/delete">Delete</a>
	</div>

	<div class="flex justify-around">
		<div class="flex-col text-center rounded bg-red-200 shadow w-1/3 py-10">
			<div class="text-xl flex justify-center">
				Title:
				<div class="text-gray-800 w-1/3">{{$book->title}}</div>
			</div>
			<div class="text-xl flex justify-center">
				Author:
				<div class="text-gray-800 w-1/3">{{$book->author}}</div>
			</div>
			<div class="text-xl flex justify-center">
				Rating:
				<div class="text-gray-800 w-1/3">{{$book->ranking}}</div>
			</div>
			<div class="flex ml-4 mt-4">
				<div class="text-xl mr-14">
					Description:
				</div>
				@if($book->description === null)
					<div class="text-l text-gray-800 mt-1">No Description yet</div>
				@else
					<div class="text-l mt-1">{{$book->description}}</div>
				@endif

			</div>
		</div>
	</div>


@endsection