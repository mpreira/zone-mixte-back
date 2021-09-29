<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'summary' => $this->faker->paragraph(),
            'category_id' => 2,
            'user_id' => 1,
            'sport_id' => $this->faker->numberBetween($min = 1, $max = 6),
            'video' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
