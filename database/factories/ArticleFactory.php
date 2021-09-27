<?php

namespace Database\Factories;

use App\Models\Article;
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
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'content' => $this->faker->paragraphs($nb = 4, $asText = true),
            'publishable_type' => ('Article'),
            'publishable_id' => 1
        ];
    }
}
