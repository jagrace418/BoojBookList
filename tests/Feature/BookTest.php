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

		$this->get('/books/create')->assertStatus(200);

		$attributes = [
			'title'  => $this->faker->title,
			'author' => $this->faker->name,
			'rating' => $this->faker->randomDigitNotNull
		];

		$this->post('/books', $attributes)->assertRedirect('/books');

		$this->assertDatabaseHas('books', $attributes);

		$this->get('/books')->assertSee($attributes['title']);
	}

	public function testBookRequiresTitle () {
		$attributes = factory('App\Book')->raw(['title' => '']);
		$this->post('/books', $attributes)->assertSessionHasErrors('title');
	}

	public function testBookRequiresAuthor () {
		$attributes = factory('App\Book')->raw(['author' => '']);
		$this->post('/books', $attributes)->assertSessionHasErrors('author');
	}

	public function testViewBook () {
		$this->withoutExceptionHandling();
		$book = factory('App\Book')->create();
		$this->get($book->path())->assertSee($book->title)->assertSee($book->author);
	}
}
