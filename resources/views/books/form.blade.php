@csrf
<div>
	<label for="title">
		Title
		<input type="text" name="title" placeholder="Title" value="{{$book->title}}"
			   class="input shadow appearance-none border rounded w-full py-2 text-default leading-tight focus:outline-none focus:shadow-outline">
	</label>
</div>

<div>
	<label for="Author">
		Author
		<input type="text" name="author" placeholder="Author" value="{{$book->author}}"
			   class="input shadow appearance-none border rounded w-full py-2 text-default leading-tight focus:outline-none focus:shadow-outline">
	</label>
</div>

<div>
	<button type="submit" class="bg-blue-500 rounded-full py-2 px-4 text-white mt-5">Save</button>
	<button>
		<a href="/books" class="bg-blue-500 rounded-full py-2 px-4 text-white mt-5">Cancel</a>
	</button>
</div>


@if($errors->any())
	<div class="mt-3">
		@foreach($errors->all() as $error)
			<li class="text-red-500">{{$error}}</li>
		@endforeach
	</div>
@endif