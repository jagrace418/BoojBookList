<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller {

	public function index () {
		$books = Book::all();

		return view('books.index', compact('books'));
	}

	public function store () {
		$attributes = request()->validate([
			'title'  => 'required',
			'author' => 'required',
			'rating' => 'nullable'
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
}
