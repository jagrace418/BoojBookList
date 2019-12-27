<?php

namespace Tests\Feature;

use App\Book;
use App\Http\Resources\BookResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase {

	use WithFaker, RefreshDatabase;

	public function testGet () {
		$this->getJson('/api/books')->assertStatus(200);

		$this->getJson('/api/books/9999999999999')->assertStatus(404);
	}

	public function testCreate () {
		$attributes = [
			'title'  => $this->faker->sentence(3),
			'author' => $this->faker->name,
		];
		$this->postJson('/api/books/', $attributes)
			->assertJsonFragment($attributes)
			->assertStatus(201);

		$this->assertDatabaseHas('books', $attributes);
	}

	public function testUpdate () {
		$attributes = [
			'title'       => 'My Life',
			'author'      => 'Jake',
			'description' => 'this is some book about things and stuff and such'
		];
		$book = factory('App\Book')->create();

		$this->patchJson('/api/books/' . $book->id, $attributes)
			->assertStatus(200);

		$this->assertDatabaseHas('books', $attributes);

		$this->patchJson('/api/books/9999999999999')->assertStatus(404);
	}

	public function testDelete () {
		$book = factory('App\Book')->create();
		$this->deleteJson('/api/books/' . $book->id)
			->assertStatus(204);

		$this->assertDatabaseMissing('books', $book->toArray());

		$this->deleteJson('/api/books/9999999999999')->assertStatus(404);
	}
}
