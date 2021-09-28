<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker;

class CategorySeeder extends Seeder
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
        Category::insert([
            [
                'name' => "Article",
                'description' => $this->faker->paragraph(),
            ],
            [
                'name' => "Video",
                'description' => $this->faker->paragraph(),
            ]]
        );
    }
}
