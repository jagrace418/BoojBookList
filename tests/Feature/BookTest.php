<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase {

	use WithFaker, RefreshDatabase;

	public function testCreateBook () {
		$this->withoutExceptionHandling();

		$this->get('/books/create')
			->assertStatus(200);

		$attributes = [
			'title'  => $this->faker->title,
			'author' => $this->faker->name,
		];

		$this->post('/books', $attributes)
			->assertRedirect('/books');

		$this->assertDatabaseHas('books', $attributes);

		$this->get('/books')
			->assertSee($attributes['title']);
	}

	public function testRemoveBook () {
		$this->withoutExceptionHandling();
		$book = factory('App\Book')->create();

		$this->delete($book->path());
		$this->assertDatabaseMissing('books', [
				'title'  => $book->title,
				'author' => $book->author]
		);
	}

	public function testUpdateBook () {
		$this->withoutExceptionHandling();
		$book = factory('App\Book')->create();

		$this->patch($book->path(), $attributes = [
			'author' => 'Jake Grace',
			'title'  => 'My Incredible Story'])
			->assertRedirect($book->path());

		$this->get($book->path() . '/edit')->assertStatus(200);
		$this->assertDatabaseHas('books', $attributes);
	}

	public function testBookRequiresTitle () {
		$attributes = factory('App\Book')->raw(['title' => '']);
		$this->post('/books', $attributes)
			->assertSessionHasErrors('title');
	}

	public function testBookRequiresAuthor () {
		$attributes = factory('App\Book')->raw(['author' => '']);
		$this->post('/books', $attributes)
			->assertSessionHasErrors('author');
	}

	public function testViewBook () {
		$this->withoutExceptionHandling();
		$book = factory('App\Book')->create();
		$this->get($book->path())
			->assertSee($book->title)
			->assertSee($book->author);
	}
}
