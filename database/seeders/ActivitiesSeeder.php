<?php

namespace Database\Seeders;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');

        foreach (range(1, 100) as $v) 
        {
            $date = Carbon::parse($faker->dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null));
            $days = $faker->numberBetween($min = 1, $max = 4);
            $quantity = $faker->numberBetween($min = 10, $max = 40);

            $activities = Activity::create([
                'moderator' => $faker->firstName . ' ' . $faker->lastName,
                'start' => $date,
                'end' => $date->addDays($days),
                'audience' => $faker->company,
                'description' => $faker->realText($maxNbChars = 400),
                'participants_quantity' => $quantity,
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);

            foreach (range(1, $quantity) as $v) {
                $id = $faker->numberBetween($min = 1, $max = 91);

                $activities->participants()->attach($id);
            }
        }
    }
}
