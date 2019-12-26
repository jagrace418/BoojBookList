@extends('layouts.app')
@section('content')
	<a href="/books">Home</a>
	<h3>{{$book->title}}</h3>
	<h5>{{$book->author}}</h5>
@endsection