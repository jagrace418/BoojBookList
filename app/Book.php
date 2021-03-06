<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Book
 * @property int                             $id
 * @property string                          $title
 * @property string                          $author
 * @property int                             $ranking
 * @property string                          $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereRanking($value)
 */
class Book extends Model {

	protected $guarded = [];

	public function path () {
		return "/books/{$this->id}";
	}

	public function __construct (array $attributes = []) {
		parent::__construct($attributes);
		if ($this->ranking === null) {
			$this->ranking = Book::count() + 1;
		}
	}
}
