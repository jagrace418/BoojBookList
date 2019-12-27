<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller {

	public function index () {
		$books = Book::all();

		return view('books.index', compact('books'));
	}

	public function sort ($column, $order = null) {
		$books = Book::all();
		$sortCols = [
			'ranking',
			'title',
			'author',
		];
		$directions = [
			'asc',
			'desc',
		];
		$direction = 'desc';
		if (in_array($order, $directions)) {
			$direction = $order;
		}

		if (in_array($column, $sortCols)) {
			$books = Book::orderBy($column, $direction)->get();
		}

		return view('books.index', compact('books'));
	}

	public function store () {
		Book::create($this->validateRequest());

		return redirect('/books');
	}

	public function show (Book $book) {
		return view('books.show', compact('book'));
	}

	public function create () {
		return view('books.create');
	}

	public function destroy (Book $book) {
		$book->delete();

		return redirect('/books');
	}

	public function update (Book $book) {
		$book->update($this->validateRequest());

		return redirect($book->path());
	}

	public function edit (Book $book) {
		return view('books.edit', compact('book'));
	}

	protected function validateRequest () {
		return request()->validate([
			'title'       => 'required|max:255',
			'author'      => 'required|max:255',
			'description' => 'nullable',
			'ranking'     => 'nullable'
		]);
	}
}
