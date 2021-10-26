<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Article;
use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => Article::all()->random()->id,
            'author_id' => People::all()->random()->id,
            'body' => $this->faker->text(),
            'created_at' => now(),
            'updated_at' => now()

        ];
    }
}
