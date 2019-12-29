<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\BookResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookAPIController extends Controller {

	/**
	 * @return JsonResponse
	 */
	public function index () {
		$books = Book::all();

		return response()->json(BookResource::collection($books), 200);
	}

	/**
	 * @param Request $request
	 *
	 * @return JsonResponse
	 */
	public function store (Request $request) {
		$book = Book::create([
			'title'   => $request->title,
			'author'  => $request->author,
			'ranking' => $request->ranking,
		]);

		return response()->json(BookResource::make($book), 201);
	}

	/**
	 * @param Book $book
	 *
	 * @return BookResource
	 */
	public function show (Book $book) {
		return new BookResource($book);
	}

	/**
	 * @param Request $request
	 * @param Book    $book
	 *
	 * @return JsonResponse
	 */
	public function update (Request $request, Book $book) {
		$book->title = $request->input('title') ?? $book->title;
		$book->author = $request->input('author') ?? $book->author;
		$book->ranking = $request->input('ranking') ?? $book->ranking;
		$book->description = $request->input('description') ?? $book->description;

		if ($book->save()) {
			return response()->json(BookResource::make($book), 200);
		}

		return response()->json(null, 400);
	}

	/**
	 * @param Book $book
	 *
	 * @return JsonResponse
	 * @throws Exception
	 */
	public function destroy (Book $book) {
		$book->delete();

		$books = Book::get()->sortBy('ranking');
		$i = 0;
		foreach ($books as $book) {
			$book->ranking = ++$i;
			$book->save();
		}

		return response()->json(null, 204);
	}
}
