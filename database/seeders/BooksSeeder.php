<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');

        foreach (range(1, 100) as $value) {
            Book::insert([
                'image' => $faker->numberBetween($min = 1, $max = 10),
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'available' => $faker->boolean(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        
    }
}
