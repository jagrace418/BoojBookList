@extends('layouts.app')
@section('content')
	<div class="w-full max-w-xs content-center mx-auto">
		<form method="POST" action="{{$book->path()}}">
			@method('PATCH')
			@include('books.form', [
			'buttonText' => 'Update Book'])
		</form>
	</div>
@endsection