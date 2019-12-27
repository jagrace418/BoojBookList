@extends('layouts.app')
@section('content')

	<button class="bg-blue-500 rounded-full py-2 px-4 text-white mt-5">
		<a href="/books/create">Add to List</a>
	</button>
	<table class="table-auto min-w-full">
		<thead>
		<tr>
			<th class="text-xl text-left">
				@if(Route::current()->parameter('column') === 'ranking' && Route::current()->parameter('order') === 'desc')
					<i class="fas fa-arrow-up"></i>
				@elseif(Route::current()->parameter('column') === 'ranking')
					<i class="fas fa-arrow-down"></i>
				@endif
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
			</th>

			<th class="text-xl text-left">
				@if(Route::current()->parameter('column') === 'title' && Route::current()->parameter('order') === 'desc')
					<i class="fas fa-arrow-up"></i>
				@elseif(Route::current()->parameter('column') === 'title')
					<i class="fas fa-arrow-down"></i>
				@endif
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
			</th>
			<th class="text-xl text-left">
				@if(Route::current()->parameter('column') === 'author' && Route::current()->parameter('order') === 'desc')
					<i class="fas fa-arrow-up"></i>
				@elseif(Route::current()->parameter('column') === 'author')
					<i class="fas fa-arrow-down"></i>
				@endif
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
			</th>
		</tr>
		</thead>
		<tbody>
		<?php $i = 0; ?>
		@forelse($books as $book)
			<tr>
				<td class="<?= $i % 2 == 0 ? 'bg-gray-300' : 'bg-white'?>">
					{{$book->ranking}}
				</td>
				<td class="<?= $i % 2 == 0 ? 'bg-gray-300' : 'bg-white'?>">
					<a href="{{$book->path()}}">{{$book->title}}</a>
				</td>
				<td class="<?= $i++ % 2 == 0 ? 'bg-gray-300' : 'bg-white'?>">
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
