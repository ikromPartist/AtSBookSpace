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
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
            ]);
        }
        
    }
}
