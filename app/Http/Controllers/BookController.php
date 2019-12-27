<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller {

	public function index () {
		$books = Book::all();

		return view('books.index', compact('books'));
	}

	public function sort ($column, $order = null) {
		$books = Book::all();
		$sortCols = [
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
		$attributes = request()->validate([
			'title'  => 'required',
			'author' => 'required',
		]);

		Book::create($attributes);

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
		$attributes = request()->validate([
			'title'  => 'required',
			'author' => 'required',
		]);
		$book->update($attributes);

		return redirect($book->path());
	}

	public function edit (Book $book) {
		return view('books.edit', compact('book'));
	}
}
