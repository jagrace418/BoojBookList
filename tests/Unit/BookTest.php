<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Book;

class BookTest extends TestCase {

	use RefreshDatabase;

	public function testHasPath () {
		$book = factory(Book::class)->create();
		self::assertEquals('/books/' . $book->id, $book->path());
	}
}
