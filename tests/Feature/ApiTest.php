<?php

namespace Tests\Feature;

use App\Book;
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
	}

	public function testUpdate () {
		$attributes = [
			'title'  => 'My Life',
			'author' => 'Jake',
		];
		$book = factory('App\Book')->create();

		$this->patchJson('/api/books/' . $book->id, $attributes)
			->assertStatus(200);

		$this->patchJson('/api/books/9999999999999')->assertStatus(404);
	}

	public function testDelete () {
		$book = factory('App\Book')->create();
		$this->deleteJson('/api/books/' . $book->id)
			->assertStatus(204);

		$this->deleteJson('/api/books/9999999999999')->assertStatus(404);
	}
}
