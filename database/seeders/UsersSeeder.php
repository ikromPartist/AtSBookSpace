<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
            if ($takenBooks->count() != 0) {
                foreach ($takenBooks as $book) {
                    $pages = $pages + $book->book->pages;
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
                'password' => bcrypt($password),
                'phone_numbers' => $faker->numberBetween($min = 000000000, $max = 999999999),
                'read_pages' => $pages,
                'company_id' => $faker->numberBetween($min = 1, $max = 20),
                'renewed_deadlines' => $faker->numberBetween($min = 0, $max = 9),
                'blacklist' => $blackL,
                'blacklist_value' => $blackV,
                'description' => $faker->realText($maxNbChars = 400),
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }

        User::insert([
            'avatar' => 'avatar1.jpg',
            'name' => 'Admin',
            'surname' => 'Adminov',
            'last_name' => 'Adminovich',
            'role' => 'admin',
            'login' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phone_numbers' => '992000200290',
            'read_pages' => 0,
            'company_id' => 1,
            'renewed_deadlines' => 0,
            'blacklist' => 0,
            'blacklist_value' => 0,
            'description' => 'I am an admin and I know it',
            'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        ]);
    }
}
