<?php

namespace Database\Seeders;

use App\Models\BookedBook;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class BookedBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');

        foreach (range(1, 50) as $v) {
            BookedBook::insert([
                'user_id' => $v,
                'book_id' => $faker->numberBetween($min = 1, $max = 90),
            ]);
        }

        foreach (range(30, 70) as $v) {
            BookedBook::insert([
                'user_id' => $v,
                'book_id' => $faker->numberBetween($min = 1, $max = 90),
            ]);
        }
    }
}
