<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;
use Faker\Factory as Faker;

class LikesSeeder extends Seeder
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
            
            $like = new Like;
            $like->user_id = $faker->numberBetween($min = 51, $max = 91);
            $like->book_id = $faker->numberBetween($min = 1, $max = 220);
            $like->save();
        }        
    }
}
