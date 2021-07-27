<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Company;
use App\Models\TakenBook;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('ru_RU');

        foreach (range(1, 91) as $v) {
            $img = $faker->numberBetween($min = 1, $max = 16);
            // $pages = $books * $faker->numberBetween($min = 100, $max = 500);
            $password = 'user';

            $takenBooks = TakenBook::where('user_id', $v)->get();
            $pages = 0; 
            if ($takenBooks) {
                foreach ($takenBooks as $book) {
                    $pages = $pages + $book->pages;
                }
            }

            $blackV = $faker->numberBetween($min = 0, $max = 9);
            $blackL = 0;
            if ($blackV >= 3) {
                $blackL = $faker->numberBetween($min = 0, $max = 1);
            }


            User::insert([
                'avatar' => 'avatar' . $img . '.jpg',
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'last_name' => $faker->firstName . 'вич',
                'role' => 'user',
                'login' => 'login' . $v,
                'email' => $faker->unique()->email,
                'password' => Hash::make($password),
                'phone_numbers' => '(+992) ' . $faker->numberBetween($min = 900, $max = 999) . '-' . $faker->numberBetween($min = 10, $max = 99) . '-' . $faker->numberBetween($min = 10, $max = 99) . '-' . $faker->numberBetween($min = 10, $max = 99),
                'read_pages' => $pages,
                'company_id' => $faker->numberBetween($min = 1, $max = 20),
                'renewed_deadlines' => $faker->numberBetween($min = 0, $max = 9),
                'blacklist' => $blackL,
                'blacklist_value' => $blackV,
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }

    }
}
