@extends('layouts.app')
@section('content')
	<div class="w-full max-w-xs content-center mx-auto
			bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
		<form method="POST" action="/books">
			@include('books.form', [
			'book' => new \App\Book(),
			'buttonText' => 'Add Book'])
		</form>
	</div>
@endsection