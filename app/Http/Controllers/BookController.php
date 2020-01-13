<?php

namespace App\Http\Controllers;

use App\Book;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class BookController extends Controller {

	/**
	 * @return Factory|View
	 */
	public function index () {
		$books = Book::orderBy('ranking')->paginate(25);

		return view('books.index', compact('books'));
	}

	/**
	 * @param      $column
	 * @param null $order
	 *
	 * @return Factory|View
	 */
	public function sort ($column, $order = null) {
		$books = \DB::table('books')->paginate(25);
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
			$books = Book::orderBy($column, $direction)->paginate(25);
		}

		return view('books.index', compact('books'));
	}

	/**
	 * @return RedirectResponse|Redirector
	 */
	public function store () {
		Book::create($this->validateRequest());

		return redirect('/books');
	}

	/**
	 * @param Book $book
	 *
	 * @return Factory|View
	 */
	public function show (Book $book) {
		return view('books.show', compact('book'));
	}

	/**
	 * @return Factory|View
	 */
	public function create () {
		return view('books.create');
	}

	/**
	 * @param Book $book
	 *
	 * @return RedirectResponse|Redirector
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

		return redirect('/books');
	}

	public function confirmDelete (Book $book) {
		return view('books.delete', compact('book'));
	}

	/**
	 * @param Book $book
	 *
	 * @return RedirectResponse|Redirector
	 */
	public function update (Book $book) {
		$book->update($this->validateRequest());

		return redirect($book->path());
	}

	/**
	 * @param Book $book
	 *
	 * @return Factory|View
	 */
	public function edit (Book $book) {
		return view('books.edit', compact('book'));
	}

	/**
	 * @return mixed
	 */
	protected function validateRequest () {
		return request()->validate([
			'title'       => 'required|max:255',
			'author'      => 'required|max:255',
			'description' => 'nullable',
			'ranking'     => 'nullable'
		]);
	}
}
