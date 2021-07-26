<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dislike;
use Faker\Factory as Faker;

class DislikesSeeder extends Seeder
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
            
            $like = new Dislike;
            $like->user_id = $faker->numberBetween($min = 1, $max = 50);
            $like->book_id = $faker->numberBetween($min = 1, $max = 220);
            $like->save();
        } 
    }
}
