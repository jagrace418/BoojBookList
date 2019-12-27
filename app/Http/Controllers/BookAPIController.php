<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookAPIController extends Controller {

	public function index () {
		$books = Book::all();

		return response()->json(BookResource::collection($books), 200);
	}

	public function store (Request $request) {
		$book = Book::create([
			'title'   => $request->title,
			'author'  => $request->author,
			'ranking' => $request->ranking,
		]);

		return response()->json(BookResource::make($book), 201);
	}

	public function show (Book $book) {
		return new BookResource($book);
	}

	public function update (Request $request, Book $book) {
		$book->title = $request->input('title') ?? $book->title;
		$book->author = $request->input('author') ?? $book->author;
		$book->ranking = $request->input('ranking') ?? $book->ranking;

		if ($book->save()) {
			return response()->json(BookResource::make($book), 200);
		}

		return response()->json(null, 400);
	}

	public function destroy (Book $book) {
		$book->delete();

		return response()->json(null, 204);
	}
}
