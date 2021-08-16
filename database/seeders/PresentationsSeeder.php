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
            $date = Carbon::parse($faker->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null));

            if ($date->isPast()) 
            {
                $presented = true;
            }
            else
            {
                $presented = false;
            }

            $quantity = $faker->numberBetween($min = 10, $max = 40);

            $presentation = Presentation::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 91),
                'book_id' => $faker->numberBetween($min = 1, $max = 220),
                'date' => $date,
                'audience' => $faker->company,
                'participants_quantity' => $quantity,
                'description' => $faker->realText($maxNbChars = 400),
                'presentation' => 'powerPoint.psd',
                'presented' => $presented,
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);

            foreach (range(1, $quantity) as $v) 
            {
                $id = $faker->numberBetween($min = 1, $max = 91);

                $presentation->participants()->attach($id);
            }
        }
    }
}
