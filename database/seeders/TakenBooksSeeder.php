<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TakenBook;
use App\Models\Book;
use Faker\Factory as Faker;

class TakenBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');

        
        foreach (range(1, 2000) as $value) {
            $i = $faker->numberBetween($min = 1, $max = 220);
            $book = Book::find($i);
            TakenBook::insert([
                'user_id' => $faker->numberBetween($min = 1, $max = 91),
                'title' => $book->title,
                'author' => $book->author,
                'pages' => $book->pages,
                'code' => $book->code,
                'description' => $book->description,
                'taken_date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'deadline' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'returned_date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
    }
}
