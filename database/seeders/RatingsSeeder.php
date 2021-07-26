<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;
use Faker\Factory as Faker;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');

        foreach (range(1, 1000) as $val) { 
            $rating = new Rating;
            $rating->user_id = $faker->numberBetween($min = 1, $max = 91);
            $rating->book_id = $faker->numberBetween($min = 1, $max = 220);
            $rating->rate = $faker->numberBetween($min = 1, $max = 5);
            $rating->save();
        }
    }
}
