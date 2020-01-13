@extends('layouts.app')
@section('content')
	<script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
	<script src="/js/sortingTable.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<a class="btn" href="/books/create">Add to List</a>

	<table class="table-auto min-w-full bg-pink-100 mt-4 px-2 py-2">
		<thead>
		<tr>
			<th class="text-xl text-left">
				<div class="flex items-center">
					<a
							@if(Route::current()->parameter('order') === null)
							href="/books/sort/ranking/desc"
							@elseif(Route::current()->parameter('order') === 'asc')
							href="/books/sort/ranking/desc"
							@else
							href="/books/sort/ranking/asc"
							@endif
					>
						Ranking
					</a>
					@if(Route::current()->parameter('column') === 'ranking' && Route::current()->parameter('order') === 'desc')
						<i class="fas fa-arrow-up"></i>
					@elseif(Route::current()->parameter('column') === 'ranking')
						<i class="fas fa-arrow-down"></i>
					@endif
				</div>
			</th>

			<th class="text-xl text-left">
				<div class="flex items-center">
					<a
							@if(Route::current()->parameter('order') === null)
							href="/books/sort/title/desc"
							@elseif(Route::current()->parameter('order') === 'asc')
							href="/books/sort/title/desc"
							@else
							href="/books/sort/title/asc"
							@endif
					>
						Title
					</a>
					@if(Route::current()->parameter('column') === 'title' && Route::current()->parameter('order') === 'desc')
						<i class="fas fa-arrow-up"></i>
					@elseif(Route::current()->parameter('column') === 'title')
						<i class="fas fa-arrow-down"></i>
					@endif
				</div>
			</th>
			<th class="text-xl text-left">
				<div class="flex items-center">
					<a
							@if(Route::current()->parameter('order') === null)
							href="/books/sort/author/desc"
							@elseif(Route::current()->parameter('order') === 'asc')
							href="/books/sort/author/desc"
							@else
							href="/books/sort/author/asc"
							@endif
					>
						Author
					</a>
					@if(Route::current()->parameter('column') === 'author' && Route::current()->parameter('order') === 'desc')
						<i class="fas fa-arrow-up"></i>
					@elseif(Route::current()->parameter('column') === 'author')
						<i class="fas fa-arrow-down"></i>
					@endif
				</div>
			</th>
		</tr>
		</thead>
		<tbody id="sortableTable">
		<?php $i = 0; ?>
		@forelse($books as $book)
			<tr data-id="{{$book->id}}">
				<td class="border-2" style="border-left: #ffffff; border-right: #ffffff">
					<a style="display: block" href="{{$book->path()}}">{{$book->ranking}}</a>
				</td>
				<td class="border-2" style="border-left: #ffffff; border-right: #ffffff">
					<a style="display: block" href="{{$book->path()}}">{{$book->title}}</a>
				</td>
				<td class="border-2" style="border-left: #ffffff; border-right: #ffffff">
					<a style="display: block" href="{{$book->path()}}">{{$book->author}}</a>
				</td>
			</tr>
		@empty
			<tr>
				<td>No Books yet in the list</td>
			</tr>
		@endforelse
		</tbody>
	</table>
	<div class="pt-3">
		{{$books->links()}}
	</div>
@endsection
