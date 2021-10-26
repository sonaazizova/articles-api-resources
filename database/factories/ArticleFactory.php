<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => People::all()->random()->id,
            'title' => $this->faker->title(),
            'created_at' => now(),
            'updated_at' => now(), 
        ];
    }
}
