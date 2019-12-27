@extends('layouts.app')
@section('content')
	<script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
	<script src="/js/sortingTable.js"></script>

	<button class="bg-blue-500 rounded-full py-2 px-4 text-white mt-5 shadow">
		<a href="/books/create">Add to List</a>
	</button>

	<table class="table-auto min-w-full">
		<thead>
		<tr>
			<th class="text-xl text-left">
				<div class="flex justify-between items-center">
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
				<div class="flex justify-between items-center">
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
				<div class="flex justify-between items-center">
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
				<td class="border-4" style="border-left: #636b6f; border-right: #636b6f">
					{{$book->ranking}}
				</td>
				<td class="border-4" style="border-left: #636b6f; border-right: #636b6f">
					<a href="{{$book->path()}}">{{$book->title}}</a>
				</td>
				<td class="border-4" style="border-left: #636b6f; border-right: #636b6f">
					{{$book->author}}
				</td>
			</tr>
		@empty
			<tr>
				<td>No Books yet in the list</td>
			</tr>
		@endforelse
		</tbody>
	</table>
@endsection
