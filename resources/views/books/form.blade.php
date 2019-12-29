@csrf
<div>
	<label for="title" class="text-xl">
		Title
	</label>
	<input type="text" name="title" placeholder="Title" value="{{$book->title}}"
		   class="input shadow appearance-none border rounded w-full py-2 text-default leading-tight focus:outline-none focus:shadow-outline">
</div>

<div>
	<label for="Author" class="text-xl">
		Author
	</label>
	<input type="text" name="author" placeholder="Author" value="{{$book->author}}"
		   class="input shadow appearance-none border rounded w-full py-2 text-default leading-tight focus:outline-none focus:shadow-outline">
</div>

<div>
	<label for="Description" class="text-xl">
		Description
	</label>
	<textarea name="description" placeholder="Describe the book" style="min-height: 200px"
			  class="input shadow appearance-none border rounded w-full py-2 text-default leading-tight focus:outline-none focus:shadow-outline"
	>{{$book->description}}
		</textarea>
</div>

<div class="mt-5">
	<button type="submit" class="btn">Save</button>
	<a class="btn" href="{{$book->path()}}">Cancel</a>
</div>


@if($errors->any())
	<div class="mt-3">
		@foreach($errors->all() as $error)
			<li class="text-red-500">{{$error}}</li>
		@endforeach
	</div>
@endif