<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sports;
use Faker;

class SportSeeder extends Seeder
{
    public function __construct(){

        $this->faker = Faker\Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $sports = Sports::insert([[
           'name' => "Football",
           'description' => $this->faker->paragraph(),
           'image' => $this->faker->imageUrl($width = 640, $height = 480),
           'color' => '#a20c38',
       ],
           [
               'name' => "Rugby",
               'description' => $this->faker->paragraph(),
               'image' => $this->faker->imageUrl($width = 640, $height = 480, 'rugby'),
               'color' => "#fe9f33",
           ],
           [
               'name' => "Basketball",
               'description' => $this->faker->paragraph(),
               'image' => $this->faker->imageUrl($width = 640, $height = 480, 'basketball'),
               'color' => '#a20c38',
           ],
           [
               'name' => 'Tennis',
               'description' => $this->faker->paragraph(),
               'image' => $this->faker->imageUrl($width = 640, $height = 480, 'tennis'),
               'color' => "#fe9f33",
           ],
           [
               'name' => 'Handball',
               'description' => $this->faker->paragraph(),
               'image' => $this->faker->imageUrl($width = 640, $height = 480, 'handball'),
               'color' => '#a20c38',
           ],
           [
               'name' => 'Judo',
               'description' => $this->faker->paragraph(),
               'image' => $this->faker->imageUrl($width = 640, $height = 480, 'judo'),
               'color' => "#fe9f33",
           ]]);
    }
}
