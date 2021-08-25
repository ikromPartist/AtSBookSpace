<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presentation;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PresentationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');

        foreach (range(1, 100) as $v) {

            $accepted = $faker->numberBetween($min = 0, $max = 1);
            $denied = 0;
            if ($accepted == 0) {
                $denied = 1;
            }
            $quantity = $faker->numberBetween($min = 10, $max = 40);

            $presentation = Presentation::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 91),
                'book_id' => $faker->numberBetween($min = 1, $max = 220),
                'date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),
                'audience' => $faker->company,
                'participants_quantity' => $quantity,
                'description' => $faker->realText($maxNbChars = 400),
                'presentation' => 'powerPoint.psd',
                'accepted' => $accepted,
                'denied' => $denied,
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);

            $participants = $quantity - ($faker->numberBetween($min = 0, $max = 9));

            foreach (range(1, $participants) as $v) 
            {
                $id = $faker->numberBetween($min = 1, $max = 91);

                $presentation->participants()->attach($id);
            }
        }
    }
}
